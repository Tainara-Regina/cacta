<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\CactaUser;

class CactaLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('guest:cacta');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function login(Request $request){
       //Validar o formulario

    	$validator = $request->validate([
    		'email_login' => 'required',
    		'password_login' => 'required|min:4',
    	]);
 
    	
    	if (Auth::guard('cacta')->attempt(['email'=> $request->email_login,'password'=> $request->password_login,'completou_cadastro'=> 1,'cadastro_ativo'=> true], $request->remember)) {
          $request->session()->put('menu_contratante', true);
            
    		// se sucesso redirecionar para o lugar certo
    		return redirect()->intended(route('site.admin-contratante'));
    	}
    	// se falhar, redirect back
    	return redirect()->back()->withImput($request->only('email','remember'))->with('message', 'Verifique se digitou os dados corretamente');
    }

}
