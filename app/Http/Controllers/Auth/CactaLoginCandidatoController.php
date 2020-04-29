<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\CactaUser;

class CactaLoginCandidatoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('guest:candidatos');
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

    	
    	if (Auth::guard('candidatos')->attempt(['email'=> $request->email_login,'password'=> $request->password_login,'cadastro_ativo'=> true,'completou_cadastro'=> 1], $request->remember)) {
          $request->session()->put('menu_candidato', true);



      //se existir o input vaga, vai redirecionar para fazer a candidatura na vaga
          if(isset($request->vaga) && $request->vaga != "null"){
             return redirect()->route('candidatar-se', ['id' => $request->vaga]);
         }


     // se sucesso redirecionar para o lugar certo 
         return redirect()->intended(route('site.admin-candidato'));
     }
    	// se falhar, redirect back
     return redirect()->back()->withImput($request->only('email','remember'))->with('message', 'Verifique se digitou os dados corretamente');
 }

}
