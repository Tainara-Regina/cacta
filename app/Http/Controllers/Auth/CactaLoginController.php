<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\CactaUsers;

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

    	
    	if (Auth::guard('cacta')->attempt(['email'=> $request->email_login,'password'=> $request->password_login,'completou_cadastro'=> 1], $request->remember)) {
          $request->session()->put('menu_contratante', true);


       //cadastra o horario
          $mytime = \Carbon\Carbon::now();
          CactaUsers::where('email',$request->email_login)->update(['ultimo_acesso' => $mytime]);


    		// se sucesso redirecionar para o lugar certo
          return redirect()->intended(route('site.admin-contratante'));
      }
    	// se falhar, redirect back
      //se completou_cadastro == 0



//se compleotou cadastro igual a 0 redireciona para 
     if (Auth::guard('cacta')->attempt(['email'=> $request->email_login,'password'=> $request->password_login,'completou_cadastro'=> 0], $request->remember)) {
         return redirect()->back()->withImput($request->only('email','remember'))->with('message_contratante', 'Complete seu cadastro. Verifique sua caixa de email o e-mail de complete seu cadastro.');

     }

   

      return redirect()->back()->withImput($request->only('email','remember'))->with('message_contratante', 'Verifique se digitou seus dados corretamente');
  }

}
