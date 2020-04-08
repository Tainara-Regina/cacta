<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\Segmento;
use DB;
use Auth;

class InicioController extends Controller
{
	public function inicio(){

		$ultimas_vagas = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.id',
			'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade','cacta_users.uf')
		->get();




		$contratar     = ContratarHome::select()->first();
		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();
		$procurar_vaga = ProcurarVagaHome::select()->first();
		return view('site.inicio',compact('contratar','fundo_vaga','procurar_vaga','ultimas_vagas'));
	}



	public function formularioContratante(){
		$segmentos = Segmento::select('id','segmento')->get();
		return view('site.formularioContratante-1',compact('segmentos'));
	}

	public function formularioContratanteAdd(Request $request){

	}


}
