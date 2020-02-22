<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use DB;


class VagaController extends Controller
{
	public function vaga(){
		
		$contratar     = ContratarHome::select()->first();
		$fundo_vaga    = DB::table('fundo_vaga_home')
		->inRandomOrder()
		->where('disponivel', 1)
		->first();
		$procurar_vaga = ProcurarVagaHome::select()->first();
		//dd($contratar->all());
		return view('site.vaga',compact('contratar','fundo_vaga','procurar_vaga'));

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
