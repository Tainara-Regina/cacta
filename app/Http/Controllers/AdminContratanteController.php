<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\DadosContratante;
use DB;


class AdminContratanteController extends Controller
{
	public function home(){
		return view('adminContratante.home-admin');
	}


	public function candidatosVaga(){
		return view('adminContratante.candidatos-vaga');
	}

	public function divulgarVaga(){
		return view('adminContratante.divulgar-vaga');
	}


	public function cadastrarVaga(Request $request){
		$validator = $request->validate([
			'titulo' => 'required',
			'quantidade_vaga' => 'required|numeric',
			'descricao' => 'required',
			'requisitos' => 'required',
			'desejavel' => 'required',
			'beneficios' => 'required',
			'contratacao' => 'required',
			'titulo' => 'required',
		],
		[
			'titulo.required' => 'Escolha o titulo da vaga.',
			'quantidade_vaga.required'  => 'Escolha a quantidade de vaga disponível.',
			'quantidade_vaga.numeric'  => 'Este campo só aceita números.',
			'descricao.required' => 'Preencha a descrição davaga.',
			'requisitos.required' => 'Preencha os requisitos.',
			'desejavel.required' => 'Preencha os requisitos desejaveis',
			'beneficios.required' => 'Preencha os beneficios.',
			'contratacao.required' => 'Preencha o tipo de contratação.',
		]);
		
		$vaga = new cadastrarVaga;
		$vaga->id_usuario = 000;
		if(isset($request->a_combinar) || $request->faixa_salarial_de == null ||  $request->faixa_salarial_ate == null ){
			$vaga->faixa_salarial = "a combinar";
		}else{
			$vaga->faixa_salarial = $request->faixa_salarial_de." até ".$request->faixa_salarial_ate;
		}
		$vaga->quantidade_vaga = $request->quantidade_vaga;
		$vaga->descricao = $request->descricao;
		$vaga->requisitos = $request->requisitos;
		$vaga->desejavel = $request->desejavel;
		$vaga->beneficios = $request->beneficios;
		$vaga->contratacao = $request->contratacao;
		$vaga->titulo = $request->titulo;
		$vaga->vaga_em_destaque = false;
		$vaga->save();

		return redirect()->back()->with('message', 'Vaga cadastrada com sucesso!');	
	}

	public function meusDados(){
		return view('adminContratante.meus-dados');
	}


	public function cadastrarMeusDados(Request $request){

		
		$validator = $request->validate([
			'nome' => 'required',
			'logo' => 'required|image',
			'segmento' => 'required',
			'cep' => 'required',
			'sobre' => 'required',
			'facebook' => 'required',
			'instagram' => 'required',
			'twitter' => 'required',
			'site' => 'required',
		],
		[
			'logo.required' => 'Insira o logo da sua em presa.',
			'segmento.required'  => 'Selecione o segmento da sua empresa.',	
			'descricao.required' => 'Preencha a descrição da vaga.',
			'sobre.required' => 'Escreva sobre sua empresa.',
		]);
		

		if($request->file('logo')->isValid()){
		$nome_imagem =$request->file('logo')->store('contratante/logo');
		}

		$dados = new dadosContratante;
		$dados->id_usuario = 000;
		$dados->nome = $request->nome;
		$dados->logo = $nome_imagem;
		$dados->segmento = $request->segmento;
		$dados->cep = $request->cep;
		$dados->sobre = $request->sobre;
		$dados->facebook = $request->facebook;
		$dados->instagram = $request->instagram;
		$dados->twitter = $request->twitter;
		$dados->site = $request->site;
		$dados->save();

		return redirect()->back()->with('message', 'Dados cadastrada com sucesso!');	
	}

}
