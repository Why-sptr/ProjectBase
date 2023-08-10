<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function hadleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->getId())->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect()->intended('cekongkir');
        } else {
            $newuser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt('1234242'),
                'profile_picture' => $user->getAvatar()
            ]);

            Auth::login($newuser);
            return redirect()->intended('cekongkir');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect to wherever you want after logout
        return redirect('/'); // Change this to your desired URL
    }
}
