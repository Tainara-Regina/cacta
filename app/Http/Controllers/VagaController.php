<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\Candidaturas;
use Illuminate\Support\Facades\Auth;
use DB;


class VagaController extends Controller
{
	public function vaga($id){
		$vaga = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
	//	->join('titulo_vaga', 'cadastrar_vaga.id_segmento', '=', 'cacta_users.plano')

//->join('segmento', 'titulo_vaga.id_segmento', '=', 'segmento.id')


		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade','cacta_users.nome_empresa',
			'cacta_users.logradouro','cacta_users.numero','cadastrar_vaga.descricao'
			,'cacta_users.bairro','cacta_users.uf','cacta_users.sobre','cadastrar_vaga.requisitos','cadastrar_vaga.desejavel','cadastrar_vaga.beneficios','cadastrar_vaga.contratacao','cadastrar_vaga.quantidade_vaga')
		->where('cadastrar_vaga.id',$id)
		->first();

		
		$contratar     = ContratarHome::select()->first();
		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();
		$procurar_vaga = ProcurarVagaHome::select()->first();
		//dd($contratar->all());


		$id_candidato = false;

		if(Auth::guard('candidatos')->check()){
			$id_candidato = Auth::guard('candidatos')->id();
		}


		if(Candidaturas::where('candidato_id',Auth::guard('candidatos')
			->id())
			->where('vaga_id',$id)
			->count() > 0){
			$candidatou_se = 'sim';
		//dd('rola');
	}else{
		$candidatou_se = 'não';
	}

$total_cadidaturas = Candidaturas::all()->count();

//dd($total_cadidaturas);

	return view('site.vaga',compact('contratar','fundo_vaga','procurar_vaga','vaga','id_candidato','candidatou_se','total_cadidaturas'));

}




public function listaVaga(){

	$contratar     = ContratarHome::select()->first();
	$fundo_vaga    = DB::table('fundo_vaga_home')
	->inRandomOrder()
	->first();
	$procurar_vaga = ProcurarVagaHome::select()->first();
		//dd($contratar->all());
	return view('site.lista-vagas',compact('contratar','fundo_vaga','procurar_vaga'));

}

}
