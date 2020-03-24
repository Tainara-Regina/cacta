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
use Illuminate\Support\Facades\Auth;
use DB;


class AdminContratanteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth:cacta');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */




    public function home(){
    	return view('adminContratante.home-admin');
    }


    public function candidatosVaga(){
    	return view('adminContratante.candidatos-vaga');
    }

    public function divulgarVaga(){
       $segmento = Segmento::where('id',Auth::user()->id_segmento)->first();
       $titulos_vaga = $segmento->rola()->get();
       return view('adminContratante.divulgar-vaga',compact('titulos_vaga'));
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
       $vaga->id_usuario = Auth::user()->id;
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
     $segmentos = Segmento::select('id','segmento')->get();
     return view('adminContratante.meus-dados',compact('segmentos'));
 }


 public function cadastrarMeusDados(Request $request){
   $validator = $request->validate([
      // 'nome' => 'required',
      // 'logo' => 'required|image',
      // 'segmento' => 'required',
      // 'cep' => 'required',
      // 'sobre' => 'required',
      'senha' =>'required|confirmed',
      // 'facebook' => 'required',
      // 'instagram' => 'required',
      // 'twitter' => 'required',
      // 'site' => 'required',
  ],
  [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',	
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
  ]);


  //  if($request->file('logo')->isValid()){
  //     $nome_imagem =$request->file('logo')->store('contratante/logo');
  // }







  $dados = CactaUsers::find(\Auth::user()->id);
  // $dados->nome_contratante = $request->nome_contratante;
  // $dados->nome_empresa = $request->nome_empresa;
  // $dados->email_empresa = $email_empresa;
  // $dados->telefone = $telefone;
  // $dados->senha = $request->$password;
  


 $dados->create($request->all());


  // $dados->segmento = $request->id_segmento;
  // $dados->cep = $request->cep;
  // $dados->sobre = $request->sobre;
  // $dados->facebook = $request->facebook;
  // $dados->instagram = $request->instagram;
  // $dados->twitter = $request->twitter;
  // $dados->site = $request->site;
  // $dados->save();
dd($dados);
  return redirect()->back()->with('message', 'Dados cadastrada com sucesso!');	
}

}


