<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\Segmento;
use App\CactaUsers;
use App\CactaCandidatos;
use App\Posts;
use App\PasswordResets;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class RedefinirSenhaController extends Controller
{
	public function candidato()
	{
		return view('site.redefinicao-senha-candidato');
	}


	public function contratante()
	{
		return view('site.redefinicao-senha-contratante');
	}

	public function contratanteEnviarRedefinicao(Request $request){
		$validator = $request->validate([
			'email' => 'required|email',
		],
		[
			'email.email' => 'Insira um e-mail valido.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
		]);

		$input['email'] = $request->email;
       // Must not already exist in the `email` column of `users` table
		$rules = array('email' => 'unique:cacta_users,email');
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {

			$token = md5(rand(10000000, 99999999));
			$redefinicao = new PasswordResets;

			$redefinicao->email = $request->email;
			$redefinicao->token = $token;
			$redefinicao->save();

			$dados = new \stdClass();
			$dados->email = $request->email;
			$dados->token =  $token;
			$dados->tipo_cadastro = 'contratante';

			$this->enviarRedefinicao($dados);

			return view('site.confirmacao-enviada');

		}else{

			return redirect()->back()->with('nao-cadastrado', 'E-mail não cadastrado.'); 
		}
	}

//==================================================================
//==================================================================



	public function candidatoEnviarRedefinicao(Request $request){
		$validator = $request->validate([
			'email' => 'required|email',
		],
		[
			'email.email' => 'Insira um e-mail valido.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
		]);

		$input['email'] = $request->email;
       // Must not already exist in the `email` column of `users` table
		$rules = array('email' => 'unique:cacta_candidatos,email');
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {

			$token = md5(rand(10000000, 99999999));
			$redefinicao = new PasswordResets;

			$redefinicao->email = $request->email;
			$redefinicao->token = $token;
			$redefinicao->save();

			$dados = new \stdClass();
			$dados->email = $request->email;
			$dados->token =  $token;
			$dados->tipo_cadastro = 'candidato';

			$this->enviarRedefinicao($dados);

			return view('site.confirmacao-enviada');

		}else{

			return redirect()->back()->with('nao-cadastrado', 'E-mail não cadastrado.'); 
		}
	}

	public function enviarRedefinicao($dados){

		$user = new \stdClass();
		$user->email =  $dados->email;
		$user->key =  $dados->token;
		$user->tipo_cadastro =  $dados->tipo_cadastro;

		\Illuminate\Support\Facades\Mail::send(new \App\Mail\redefinirSenha($user));  
	}


	public function redefinir($token,$tipo_cadastro){
		
		$email = PasswordResets::where('token',$token)->first();

		if(!$email){
			return redirect()->back()->with('nao-cadastrado', 'Erro ao realizar a confirmação.'); 
		}

		switch ($tipo_cadastro) {
			case 'candidato':
			$tipo = 'candidato';
			$user = CactaCandidatos::select('id')->where('email',$email->email)->first();
			$delete = PasswordResets::where('email',$email->email)->delete();
			return view('site.redefinicao',compact('user','tipo'));
			break;

			case 'contratante':
			$tipo = 'contratante';
			$user = CactaUsers::select('id')->where('email',$email->email)->first();
			$delete = PasswordResets::where('email',$email->email)->delete();
			return view('site.redefinicao',compact('user','tipo'));
			break;

			default:
			return redirect()->back()->with('nao-cadastrado', 'Erro ao realizar a confirmação.');
			break;
		}
	}


	public function redefinirUpdate(Request $request){


		if(isset($request->password)){
			$senha = Hash::make($request->password);
			$request->merge(['password' => $senha]);
		}

		switch ($request->tipo) {
			case 'candidato':
			CactaCandidatos::where('id',$request->id)->update(request()->except(['_token','tipo','id','password_confirmation']));
			return redirect()->route('senha-alterada-sucesso');
			break;

			case 'contratante':
			CactaUsers::where('id',$request->id)->update(request()->except(['_token','tipo','id','password_confirmation']));
			return redirect()->route('senha-alterada-sucesso');
			break;

			default:
			return redirect()->back()->with('nao-cadastrado', 'Erro ao realizar a confirmação.');
			break;
		}
	}


	public function sucesso()
	{
		return view('site.senha-alterada-sucesso');	
	}
	
}


