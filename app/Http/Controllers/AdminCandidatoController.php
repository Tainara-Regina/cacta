<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\CactaUsers;
use App\Segmento;
use App\TituloVaga;
use App\PlanosContratante;
use App\Candidaturas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon;
use DB;


class AdminCandidatoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth:candidatos');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home(){
    	return view('adminCandidato.home-admin');
    }


    public function candidatarVaga($id){

      $candidatura = new Candidaturas;
      $candidatura->vaga_id = $id;
      $candidatura->canditatura_em = Carbon\Carbon::now();
      $candidatura->candidato_id  = Auth::user()->id;
      $candidatura->save();


      return redirect()->back()->with('message', 'Vaga cadastrada com sucesso!');
    }


  }


