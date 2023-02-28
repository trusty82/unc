<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $providers = [ "google", "github", "facebook" ];

    public function loginRegister ()
    {
        return view("socialite.login-register");
    }

    public function redirectToProvider (Request $request)
    {
            return Socialite::driver("github")->redirect(); // On redirige vers le provider
    }

    public function handleProviderCallback (Request $request) {

        $userInfos = Socialite::driver('github')->stateless()->user();
        dd($userInfos);

            // Les informations provenant du provider
            $data = Socialite::driver('github')->user();

            dd($data);
            # Social login - register
            $email = $data->getEmail(); // L'adresse email
            $name = $data->getName(); // le nom

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("email", $email)->first();

            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->name = $name;
                $user->save();

                # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {

                // Enregistrement de l'utilisateur
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("emilie") // On attribue un mot de passe
                ]);
            }

            # 4. On connecte l'utilisateur
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /home
            if (auth()->check()) return redirect(route('home'));


    }
}
