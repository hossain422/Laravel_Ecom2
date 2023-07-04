<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        $githubUser = Socialite::driver($provider)->user();

        $check = User::where('provider_id', $githubUser->id)->first();
        if($check){
            Auth::login($check);
            return redirect('dashboard')->with('success', 'Sign In Successfully!');
        }
        else{
            // $user = User::updateOrCreate([
            //     'provider_id' => $githubUser->id,
            //     'provider' => $provider,
            // ], [
            //     'name' => $githubUser->name,
            //     'email' => $githubUser->email,
            //     'provider_token' => $githubUser->token,
            // ]);
            $user = new User();
            $user->provider_id = $githubUser->id;
            $user->provider = $provider;
            $user->name = $githubUser->name;
            $user->email = $githubUser->email;
            $user->provider_token = $githubUser->token;
            $user->save();
        
            Auth::login($user);
        
            return redirect('/dashboard');
        }
    
        
    }
}
