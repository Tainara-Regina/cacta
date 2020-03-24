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
		$vaga = CadastrarVaga::limit(4)->get();
		return $vaga;
	}

}