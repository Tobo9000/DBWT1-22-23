<?php

namespace App\Http\Requests\Auth;

use App\Models\Benutzer;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();
        $user = null;
        $result = false;
        try {
            DB::beginTransaction();
            $result = Auth::attempt($this->only('email', 'password'), $this->filled('remember'));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        if (! $result) {
            // Fehler bei Anmeldung
            RateLimiter::hit($this->throttleKey());

            // check if user with email exists
            $user = Benutzer::where('email', $this->email)->first();
            if ($user) {
                // user exists, but password is wrong
                $user->anmeldungFehler();
            }
            Log::warning('Login failed for ' . $this->email);
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
                'password' => __('auth.failed'),
            ]);
        } else {
            // Anmeldung erfolgreich

            // check if user with email exists
            $user = Benutzer::where('email', $this->email)->first();
            if ($user instanceof Benutzer) {
                // user exists, reset login error counter

                //$user->anmeldungErfolg();
                // A5: Prozedur statt Funktion
                DB::statement('CALL sp_incrementAnzahlAnmeldungen(?)', [$user->id]);

                Log::info('Login successful for ' . $this->email);
            }
            RateLimiter::clear($this->throttleKey());
        }
    }

    /**
     * Ensure that the login request is not rate limited.
     *
     * @return void
     *
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    protected function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
}
