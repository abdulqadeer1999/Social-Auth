<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        return view('index');
        
    }
  
      public function redirectToProvider() {
  
          return Socialite::driver('facebook')->redirect();
      }
  
  
      public function handleProviderCallback() {
  
          $user =Socialite::driver('facebook')->stateless()->user();
  
         $authUser = User::where('email',$user->email)->first();
  
         if($authUser) {
  
          Auth::login($authUser);
  
          return redirect ('home');
         }
  
         else {
  
          $newUser = new User();
          $newUser->name=$user->name;
          $newUser->email =$user->email;
          $newUser->userid =$user->id;
          $newUser->password =uniqid(); // we don't need password so generate unique id
  
          $newUser->save();
  
          // Login
  
          Auth::login($newUser);
          return redirect ('home');
         }
  
          // dd($user);
          // return $user->token;
      }


      // github auth 


      public function redirectToProviderGithub() {
  
        return Socialite::driver('github')->redirect();
    }


    public function handleProviderCallbackGithub() {

        $user =Socialite::driver('github')->stateless()->user();

       $authUser = User::where('email',$user->email)->first();

       if($authUser) {

        Auth::login($authUser);

        return redirect ('home');
       }

       else {

        $newUser = new User();
        $newUser->username=$user->username;
        $newUser->email =$user->email;
        $newUser->userid =$user->id;
        $newUser->password =uniqid(); // we don't need password so generate unique id

        $newUser->save();

        // Login

        Auth::login($newUser);
        return redirect ('home');
       }

        // dd($user); // checking user
        // return $user->token;
    }
}
