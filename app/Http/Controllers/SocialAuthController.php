<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider) {

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
            $createUser = User::where('email', '=', $user->email)->get()->first();
            if($createUser != null) {
                auth()->login($createUser, true);

                //TODO redirigir segun perfil

                return redirect('/home');
            } else {
                return redirect('/login');
            }

        }catch (\GuzzleHttp\Exception\ClientException $e) {
            return redirect('/login');
        }
    }
}
