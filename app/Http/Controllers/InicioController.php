<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use DB;

class InicioController extends Controller
{
	public function inicio(){
		$contratar     = ContratarHome::select()->first();
		$fundo_vaga    = DB::table('fundo_vaga_home')
                ->inRandomOrder()
                ->first();
		$procurar_vaga = ProcurarVagaHome::select()->first();
		//dd($contratar->all());
		return view('site.inicio',compact('contratar','fundo_vaga','procurar_vaga'));
	}
}
