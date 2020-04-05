<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\DadosContratante;
use DB;


class AdminContratanteControllerAjax extends Controller
{
	public function vagasInicio(Request $request){
		
//dd($request->all());

		$vaga = DB::table('cadastrar_vaga')
		->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
		->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
		->select('cadastrar_vaga.contratacao',
			'cadastrar_vaga.vaga_em_destaque','cadastrar_vaga.id','cadastrar_vaga.data_de_criacao',
			'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade')
		->where('titulo_vaga.titulo','LIKE', '%'.$request->buscar.'%')
		->orderBy('cadastrar_vaga.vaga_em_destaque', 'desc')
		->get();

		return $vaga;
	}

}