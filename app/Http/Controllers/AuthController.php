<?php

namespace App\Http\Controllers;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index(){
        return view('auth.index');
    }

    function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callback(){
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;

        $cek = User::where('email', $email)->count();
        if($cek > 0){
            $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'google_id' => $id
            ]
          );

          Auth::login($user);
          return redirect()->to('dashboard');
        }else{
            return redirect()->to('auth')->with('error', 'Gagal Masuk');
        }
    }
}
