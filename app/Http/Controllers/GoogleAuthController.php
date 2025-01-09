<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callBack(){
    
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),                   
                    'google_id' => $googleUser->id,
                ]
            );
            
            if ($user->wasRecentlyCreated || !$user->google_id) {
                $user->google_id = $googleUser->id;
                $user->save();
            }
    
            Auth::login($user);
            return redirect()->intended('home');

        } catch (\Throwable $th) {
           dd('error!'. $th->getMessage());
        }
    }
}
