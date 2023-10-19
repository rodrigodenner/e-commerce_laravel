<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function auth(Request $request)
  {
    $credenciais = $request->validate([
      'email'=>['required','email'],
      'password'=>['required']
    ],[
        'email.required'=>'Campo email obrigatorio',
        'password.required'=>'Campo senha obrigatorio'
      ]);

    if(Auth::attempt($credenciais,$request->remember)){
      $request->session()->regenerate();
      
      return redirect()->intended('/admin/dashboard');
    }
    return redirect()->back()->with('error','Usuário ou senha inválida');
    
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(route('site.index'));
  }

  public function create()
  {
    return view('login.create');
  }
}
