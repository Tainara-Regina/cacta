<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use DB;


class AdminContratanteController extends Controller
{
	public function home(){
		return view('adminContratante.home-admin');
	}

}
