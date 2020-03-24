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
		$contratar     = ContratarHome::select()->first();
		$fundo_vaga    = DB::table('fundo_vaga_home')
                ->inRandomOrder()
                ->where('disponivel', 1)
                ->first();
		$procurar_vaga = ProcurarVagaHome::select()->first();
		//dd($contratar->all());
		return view('site.inicio',compact('contratar','fundo_vaga','procurar_vaga'));
	}



 public function formularioContratante(){
 	 $segmentos = Segmento::select('id','segmento')->get();
      return view('site.formularioContratante-1',compact('segmentos'));
    }

    public function formularioContratanteAdd(Request $request){

    }


}
