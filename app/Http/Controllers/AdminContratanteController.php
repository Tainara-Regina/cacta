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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
//fazer um join para trazer o nome das vagas no model


      $vagas = DB::table('cadastrar_vaga')
      ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
      ->select('cadastrar_vaga.*', 'titulo_vaga.titulo')
      ->where('cadastrar_vaga.id_usuario',Auth::user()->id)
      ->get();


 //$segmento =  CadastrarVaga::where('id_usuario',Auth::user()->id)->first();
  //$vagas = $segmento->nomeVagas()->get();

//dd($vagas);
     // $vagas = CadastrarVaga::all();
      return view('adminContratante.vagas',compact('vagas'));
    }



    public function divulgarVaga(){

      $quantidade_maxima_vagas_permitidas = $this->verificaPlano(Auth::user()->id_plano)->quantidade_vagas;
      $quantidade_de_vagas_cadastradas = CadastrarVaga::where('id_usuario',Auth::user()->id)->count();


      $quantidade_maxima_destaque_permitido = $this->verificaPlano(Auth::user()->id_plano)->vagas_em_destaque;

      $quantidade_destaque_cadastrado = CadastrarVaga::where('id_usuario',Auth::user()->id)
      ->where('vaga_em_destaque','on')
      ->count();


      if($quantidade_destaque_cadastrado >= $quantidade_maxima_destaque_permitido){
       $utrapassou_limite_destaque = true;
     }else{
      $utrapassou_limite_destaque = false;
    }


    if($quantidade_de_vagas_cadastradas >= $quantidade_maxima_vagas_permitidas){

      $planos = PlanosContratante::where('quantidade_vagas', '>=' , $quantidade_maxima_vagas_permitidas)->
      where('id', '!=' , Auth::user()->id_plano)
      ->get();

      $plano_atual = PlanosContratante::where('id', Auth::user()->id_plano)->first();

      return view('adminContratante.limite-vaga-atingido',compact('planos','plano_atual','quantidade_maxima_vagas_permitidas','quantidade_de_vagas_cadastradas','quantidade_maxima_destaque_permitido','quantidade_destaque_cadastrado','utrapassou_limite_destaque')); 

    }


    $segmento = Segmento::where('id',Auth::user()->id_segmento)->first();
    $titulos_vaga = $segmento->segmento()->get();
    return view('adminContratante.divulgar-vaga',compact('titulos_vaga','quantidade_maxima_vagas_permitidas','quantidade_de_vagas_cadastradas','quantidade_maxima_destaque_permitido','quantidade_destaque_cadastrado','utrapassou_limite_destaque'));
  }





  public function editarVaga($id){

//verifica se o usuario tem direito a vagas em destaque, se não tiver, passa a variavel utrapassou_limite_destaque true para que o campo fique desabilitado 


    $quantidade_maxima_destaque_permitido = $this->verificaPlano(Auth::user()->id_plano)->vagas_em_destaque;

    $quantidade_destaque_cadastrado = CadastrarVaga::where('id_usuario',Auth::user()->id)
    ->where('vaga_em_destaque','on')
    ->count();

    if($quantidade_destaque_cadastrado >= $quantidade_maxima_destaque_permitido){
     $utrapassou_limite_destaque = true;
   }else{
    $utrapassou_limite_destaque = false;
  }





  $segmento = Segmento::where('id',Auth::user()->id_segmento)->first();
  $titulos_vaga = $segmento->segmento()->get();
  $vagas = cadastrarVaga::find($id);
  $autorizacao = $this->authorize('permissao_vagas',$vagas);
  $id_vaga = $id;
  return view('adminContratante.editar-vaga',compact('vagas','titulos_vaga','id_vaga','utrapassou_limite_destaque'));
}




public function updateVaga(Request $request){
 if(!isset($request->vaga_em_destaque) || $request->vaga_em_destaque == null){
  $request['vaga_em_destaque'] = "off";
}else{
 $request['vaga_em_destaque'] = "on";
};

// caso o usuario tente modifirar o valor do campo destaque disable para enable, esta pagina de advertencia é acionada
$quantidade_maxima_destaque_permitido = $this->verificaPlano(Auth::user()->id_plano)->vagas_em_destaque;

$quantidade_destaque_cadastrado = CadastrarVaga::where('id_usuario',Auth::user()->id)
->where('vaga_em_destaque','on')
->count();

if($quantidade_destaque_cadastrado >= $quantidade_maxima_destaque_permitido){
 if($request->vaga_em_destaque == "on"){
  return view('erro.nao-burle-o-sistema');
}
}


$validator = $request->validate([
  'titulo' => 'required',
  'quantidade_vaga' => 'required|numeric',
  'descricao' => 'required',
  'requisitos' => 'required',
  'desejavel' => 'required',
  'beneficios' => 'required',
  'contratacao' => 'required',
  'titulo' => 'required',
  'vaga_em_destaque' => 'required'
],
[
  'titulo.required' => 'Escolha o titulo da vaga.',
  'quantidade_vaga.required'  => 'Escolha a quantidade de vaga disponível.',
  'quantidade_vaga.numeric'  => 'Este campo só aceita números.',
  'descricao.required' => 'Preencha a descrição da vaga.',
  'requisitos.required' => 'Preencha os requisitos.',
  'desejavel.required' => 'Preencha os requisitos desejaveis',
  'beneficios.required' => 'Preencha os beneficios.',
  'contratacao.required' => 'Preencha o tipo de contratação.',
]);

cadastrarVaga::where('id', $request->id_vaga)->update(request()->except(['_token','id_vaga']));
return redirect()->back()->with('message', 'Vaga atualizada com sucesso!');
}








public function deletaVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 $vagas->delete();
 dd('deletou');
}






public function verVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);
 
 return view('adminContratante.ver-vaga',compact('vagas'));


}







public function cadastrarVaga(Request $request){
 if(!isset($request->vaga_em_destaque) || $request->vaga_em_destaque == null){
  $request['vaga_em_destaque'] = "off";
}else{
 $request['vaga_em_destaque'] = "on";
};


// caso o usuario tente modifirar o valor do campo destaque disable para enable, esta pagina de advertencia é acionada
$quantidade_maxima_destaque_permitido = $this->verificaPlano(Auth::user()->id_plano)->vagas_em_destaque;

$quantidade_destaque_cadastrado = CadastrarVaga::where('id_usuario',Auth::user()->id)
->where('vaga_em_destaque','on')
->count();

if($quantidade_destaque_cadastrado >= $quantidade_maxima_destaque_permitido){
 if($request->vaga_em_destaque == "on"){
  return view('erro.nao-burle-o-sistema');
}
}




$validator = $request->validate([
  'titulo' => 'required',
  'quantidade_vaga' => 'required|numeric',
  'descricao' => 'required',
  'requisitos' => 'required',
  'desejavel' => 'required',
  'beneficios' => 'required',
  'contratacao' => 'required',
  'titulo' => 'required',
  'vaga_em_destaque' => 'required'
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





$mytime = \Carbon\Carbon::now();
$quantidade_dias_vaga_plano = $this->verificaPlano(Auth::user()->id_plano)->tempo_disponivel_vaga;


$vaga = new cadastrarVaga;
$vaga->id_usuario = Auth::user()->id;
if(isset($request->a_combinar) || $request->faixa_salarial_de == null ||  $request->faixa_salarial_ate == null ){
  $vaga->faixa_salarial = "a combinar";
}else{
 $vaga->faixa_salarial_de = $request->faixa_salarial_de;
 $vaga->faixa_salarial_ate = $request->faixa_salarial_ate;
}

$vaga->data_de_criacao = $mytime->toDateTimeString();
$vaga->data_de_expiracao = $mytime->addDays($quantidade_dias_vaga_plano);

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
  $cadastro = CactaUsers::where('id',\Auth::user()->id)->first();
//dd($cadastro);
  $segmentos = Segmento::select('id','segmento')->get();
  $planos = PlanosContratante::all();

  return view('adminContratante.meus-dados',compact('segmentos','planos','cadastro'));
}




public function cadastrarMeusDados(Request $request){

 $validator = $request->validate([
  // 'logo_atualizar' => 'required|image',
   'id_segmento' => 'required',
   'cep' => 'required',
   'numero' => 'required',
   'complemento' => 'required',
   'sobre' => 'required',
   'endereco' => 'required',
   'id_plano' => 'required',

   'nome_cartao' => 'required',
   'numero_cartao' => 'required',
   'expira_cartao' => 'required',
   'codigo_seguranca_cartao' => 'required',
  // 'facebook' => 'required',
  // 'instagram' => 'required',
  // 'twitter' => 'required',
  // 'site' => 'required',
 ],
 [
   'endereco.required' => 'Insira um CEP válido.',
   //'logo_atualizar.required' => 'Insira o logo da sua em presa.',
   'id_segmento.required'  => 'Selecione o segmento da sua empresa.',  
   'sobre.required' => 'Escreva sobre sua empresa.',
   'cep.required' => 'insira o CEP.',
   'id_plano.required' => 'Escolha o plano que deseja.'
 ]);



 if(isset($request->logo_atualizar)) {


 if($request->file('logo_atualizar')->isValid())
 {
  $upload =  Storage::put('public/logo_usuario', $request->file('logo_atualizar'));
  $teste = explode('/',$upload);
  array_shift($teste);
  $nome_imagem = implode('/',$teste);
  $request->merge(['logo' => $nome_imagem]);

}

}

//Ao trocar o segmento, esta query exclui todos as vagas cadastradas que não pertencem a este segmento
$vagas_diferente_do_novo_id = DB::table('cadastrar_vaga')
->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
->select('*')
->where('cadastrar_vaga.id_usuario',\Auth::user()->id)
->where('titulo_vaga.id_segmento','!=',$request->id_segmento)
->delete();



CactaUsers::where('id',\Auth::user()->id)->update(request()->except(['_token','logo_atualizar']));
return redirect()->back()->with('message', 'Dados atualizados com sucesso!');	
}








//Verifica o qual o plano do cliente e retorna qual a quantidade de vagas permitida pelo plano dele
public function verificaPlano($id_plano){
  $quantidade = PlanosContratante::select('plano','quantidade_vagas','vagas_em_destaque','tempo_disponivel_vaga')->where('id',$id_plano)->first();
  return $quantidade;
}


}


