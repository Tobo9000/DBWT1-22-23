<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Benutzer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:benutzer'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'privacy_policy' => ['accepted', 'required_without_all'],
        ]);

        $user = null;

        try {
            DB::beginTransaction();

            // mit SHA1
            /*$SALT = "emensa-";
            $user = Benutzer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => sha1($SALT . $request->password),
            ]);*/

            // mit Laravel Hash
            $user = Benutzer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        if ($user) {
            // TODO: remove when email verification is implemented
            $user->markEmailAsVerified();

            // Nutzer wird bei Registrierung automatisch angemeldet (daher auch inkrement von anzahlanmeldungen)
            // ohne Prozedur:
            // $user->anmeldungErfolg();

            // mit Prozedur (A5):
            DB::statement('CALL sp_incrementAnzahlAnmeldungen(?)', [$user->id]);

            Auth::login($user);
            Log::info('User registered: ' . $user->email);

            event(new Registered($user));

            return redirect(RouteServiceProvider::HOME)
                ->with('success', 'Ihr Account wurde erfolgreich erstellt.');
        } else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    /**
     * Handle an incoming delete account request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function delete(Request $request)
    {
        // TODO: ggf. erst nach Passwort fragen
        /*$request->validate([
            'password' => ['required', 'string', 'min:6'],
        ]);*/

        $user = Benutzer::find(Auth::user()->getAuthIdentifier());
        if ($user) {
            Auth::logout();
            if($user->delete())
                return redirect(RouteServiceProvider::HOME)
                    ->with('success', 'Ihr Account wurde erfolgreich gelöscht.');
            Log::info('User deleted: ' . $user->email);
        }
        return redirect()->back()
            ->with('error', 'Fehler beim Löschen des Accounts. Bitte erneut versuchen.');
    }
}
