<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Request;
use App\User;

class LoginController extends Controller
{
    public function loginView() {
        if(Auth::check())
            return redirect('/');    
        return view("login");            
    }

    public function logar() 
    {    
      $request = Request::all();
      if((Auth::attempt(['name' => $request ['name'], 'password' => $request ['password']])) ){  
        //Auth::loginUsingId(1);
        return redirect('/login');
      }else
        return redirect('/login')->with('error', 'Login ou Senha inválidos.');
    } 
            
}
