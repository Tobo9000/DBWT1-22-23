<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Receive the request and update the user's profile.
     *
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('passwort')) {
            auth()->user()->update([
                'passwort' => Hash::make($request->input('passwort'))
            ]);
        }

        return redirect()->route('profile')->with('message', 'Profil erfolgreich aktualisiert.');
    }
}
