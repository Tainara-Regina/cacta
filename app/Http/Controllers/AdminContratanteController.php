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
use App\Candidaturas;
use App\PlanosContratante;
use App\CactaCandidatos;
use App\CursosCandidatos;
use App\ExperienciasProfissionais;
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

      $vagas_total = CadastrarVaga::where('id_usuario',Auth::user()->id)->count();

      $total_vaga_plano = PlanosContratante::select('quantidade_vagas')->where('id',Auth::user()->id_plano)->first();

      $total_destaque_plano = PlanosContratante::select('vagas_em_destaque')->where('id',Auth::user()->id_plano)->first();

      $candidatos_total = DB::table('candidaturas')
      ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
      ->where('cadastrar_vaga.id_usuario',Auth::user()->id)
      ->count();

      $vagas_em_destaque = DB::table('candidaturas')
      ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
      ->where('cadastrar_vaga.id_usuario',Auth::user()->id)
      ->where('cadastrar_vaga.vaga_em_destaque','on')
      ->count();

      $candidatos_das_vagas = DB::table('candidaturas')
      ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
      ->join('cacta_candidatos', 'cacta_candidatos.id', '=', 'candidaturas.candidato_id')
      ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
      ->select('cacta_candidatos.nome','cacta_candidatos.email','candidaturas.canditatura_em','titulo_vaga.titulo','candidaturas.vaga_id','cacta_candidatos.id As candidato_id')
      ->where('cadastrar_vaga.id_usuario',Auth::user()->id)
      ->limit(3)
      ->get();

      return view('adminContratante.home-admin',compact('vagas_total','total_vaga_plano','candidatos_total','vagas_em_destaque','total_destaque_plano','candidatos_das_vagas'));
    }

    public function candidatosVaga(){
//fazer um join para trazer o nome das vagas no model

      $vagas = DB::table('cadastrar_vaga')
      ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
      ->select('cadastrar_vaga.*', 'titulo_vaga.titulo')
      ->where('cadastrar_vaga.id_usuario',Auth::user()->id)
      ->get();
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






//verifica se o titulo foi realmente trocado
$encontrou = CadastrarVaga::where('id',$request->id_vaga)
->where('titulo','!=',$request->titulo)->count();
if($encontrou > 0){
  //Ao trocar o titulo da vaga, esta query exclui todos candidatos cadastradas na vaga que não pertencem a este segmento
  $vagas_diferente_do_novo_id = Candidaturas::where('vaga_id', $request->id_vaga)
  ->delete();
}



$validator = $request->validate([
  'titulo' => 'required',
  'quantidade_vaga' => 'required|numeric',
  'descricao' => 'required',
  'requisitos' => 'required',
 // 'desejavel' => 'required',
 // 'beneficios' => 'required',
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
  //'desejavel.required' => 'Preencha os requisitos desejaveis',
 // 'beneficios.required' => 'Preencha os beneficios.',
  'contratacao.required' => 'Preencha o tipo de contratação.',
]);

cadastrarVaga::where('id', $request->id_vaga)->update(request()->except(['_token','id_vaga']));
return redirect()->back()->with('message', 'Vaga atualizada com sucesso!');
}



public function verVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 $total = Candidaturas::where('vaga_id',$id)->count();
 return view('adminContratante.ver-vaga',compact('vagas','total'));
}



public function cadastrarVaga(Request $request){
 if(!isset($request->vaga_em_destaque) || $request->vaga_em_destaque == null){
  $request['vaga_em_destaque'] = "off";
}else{
 $request['vaga_em_destaque'] = "on";
};




//bloqueia a criação de vagas indevidas 
$quantidade_vagas_permitido = $this->verificaPlano(Auth::user()->id_plano)->quantidade_vagas;
$quantidade_de_vagas_cadastradas = CadastrarVaga::where('id_usuario',Auth::user()->id)->count();

if ($quantidade_de_vagas_cadastradas >=  $quantidade_vagas_permitido) {
  return back();
}


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
  //'desejavel' => 'required',
 // 'beneficios' => 'required',
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
 // 'desejavel.required' => 'Preencha os requisitos desejaveis',
  //'beneficios.required' => 'Preencha os beneficios.',
  'contratacao.required' => 'Preencha o tipo de contratação.',
]);



$mytime = \Carbon\Carbon::now();
$quantidade_dias_vaga_plano = $this->verificaPlano(Auth::user()->id_plano)->tempo_disponivel_vaga;


$vaga = new cadastrarVaga;
$vaga->id_usuario = Auth::user()->id;
if(isset($request->a_combinar) || $request->faixa_salarial_de == null ||  $request->faixa_salarial_ate == null ){
  //num faz nada não,segue o baile.
  //$vaga->faixa_salarial = "a combinar";
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



public function verCandidatos($id){

 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 $vaga_nome = DB::table('cadastrar_vaga')
 ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
 ->select('titulo_vaga.titulo','titulo_vaga.id','cadastrar_vaga.id As id_vaga')
 ->where('cadastrar_vaga.id',$id)
 ->first();

 $candidatos = DB::table('candidaturas')
 ->join('cacta_candidatos', 'candidaturas.candidato_id', '=', 'cacta_candidatos.id')
 ->select('cacta_candidatos.nome','cacta_candidatos.sobrenome','cacta_candidatos.id','candidaturas.canditatura_em')
 ->where('candidaturas.vaga_id',$id)
 ->get();

 $total = Candidaturas::where('vaga_id',$id)->count();

 return view('adminContratante.ver-candidatos',compact('candidatos','vaga_nome','total'));
}







public function detalhesCandidato($id_candidato,$id_vaga){

  Candidaturas::where('candidato_id', $id_candidato)
  ->where('vaga_id', $id_vaga)
  ->where('visualizado_pela_empresa', 0)
  ->update(['visualizado_pela_empresa' => 1]);




  $candidatura = Candidaturas::where('candidato_id',$id_candidato)
  ->where('vaga_id',$id_vaga)->count();

  if ($candidatura > 0) {



    $candidato = CactaCandidatos::select('nome','sobrenome','email','telefone','data_nascimento','sonhos_objetivos','sexo','whatsapp','escolariedade',
      'sua_historia','livros','hobbies','cursos_gostaria','cep','logradouro','bairro','localidade','uf','numero','complemento','endereco','facebook','instagram','twitter','site')->where('id',$id_candidato)->first();

    $experiencias = ExperienciasProfissionais::where('candidato_id',$id_candidato)->get();

    $cursos = CursosCandidatos::where('candidato_id',$id_candidato)->get();

//dd($experiencias);
    return view('adminContratante.detalhes-candidato',compact('candidato','experiencias','cursos'));

  }else{
   return back();
 }
}











public function meusDados(){
  $cadastro = CactaUsers::where('id',\Auth::user()->id)->first();
  $segmentos = Segmento::select('id','segmento')->get();
  $planos = PlanosContratante::all();

  return view('adminContratante.meus-dados',compact('segmentos','planos','cadastro'));
}





public function meusDadosPessoais(){
  $cadastro = CactaUsers::where('id',\Auth::user()->id)->first();

  $segmentos = Segmento::select('id','segmento')->get();
  $planos = PlanosContratante::all();

  return view('adminContratante.meus-dados-pessoais',compact('segmentos','planos','cadastro'));
}






public function cadastrarMeusDados(Request $request){


 $validator = $request->validate([
  'logo_atualizar' => 'image',
  'id_segmento' => 'required',
  'cep' => 'required',
  'numero' => 'required',
  'sobre' => 'required',
  'endereco' => 'required',


],
[
 'logo_atualizar.image' => 'O logo precisa ser uma imagem.',
 'numero.required' => 'Insira o número.',
 'cep.required' => 'Verifique se inseriu o CEP.',
 'endereco.required' => 'Insira um CEP válido.',
 'id_segmento.required'  => 'Selecione o segmento da sua empresa.',  
 'sobre.required' => 'Escreva sobre sua empresa.',  
]);



 if(isset($request->logo_atualizar)) {


   if($request->file('logo_atualizar')->isValid())
   {
    $upload =  Storage::put('public/logo_usuario', $request->file('logo_atualizar'));
    $teste = explode('/',$upload);
    array_shift($teste);
    $nome_imagem = implode('/',$teste);
    $request->merge(['logo' => $nome_imagem]);


 //excluir logo antigo
    //dd(\Auth::user()->logo);
// Storage::delete("{\Auth::user()->logo}");
    Storage::disk('public')->delete(\Auth::user()->logo);
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





public function cadastrarMeusDadosPessoais(Request $request){

 $validator = $request->validate([
   'nome_contratante' => 'required',
   'nome_empresa' => 'required',
   'telefone' => 'required',
   'password_confirmation' =>'same:password_atualizar',
   'id_plano' => 'required',
 ],
 [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
 ]);


 if(isset($request->password_atualizar)){
   $senha = Hash::make($request->password_atualizar);
   $request->merge(['password' => $senha]);
 }

 
 CactaUsers::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));
 return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}



//Verifica o qual o plano do cliente e retorna qual a quantidade de vagas permitida pelo plano dele
public function verificaPlano($id_plano){
  $quantidade = PlanosContratante::select('plano','quantidade_vagas','vagas_em_destaque','tempo_disponivel_vaga')->where('id',$id_plano)->first();
  return $quantidade;
}






public function atualizarCartao(){
 return view('adminContratante.meu-cartao');
}


public function gravarAtualizarCartao(Request $request){
  $validator = $request->validate([
   'nome_cartao' => 'required',
   'numero_cartao' => 'required',
   'expira_cartao' => 'required',
   'codigo_seguranca_cartao' => 'required',
 ],
 [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
 ]);

  CactaUsers::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));





$dados_plano = PlanosContratante::where('id',auth()->user()->id_plano)->first();
$dados = CactaUsers::find(auth()->user()->id);


$pagarme = new \PagarMe\Client('ak_test_aEZCKKiNyBscZ2DZ3qjy69LB6A46qs');

$updatedSubscription = $pagarme->subscriptions()->update([
  'id' => $dados->id_assinatura,
  'plan_id' => $dados_plano->id_pagarme,
  'payment_method' => 'credit_card',
  'card_number' => $request->numero_cartao,
  'card_holder_name' => $request->nome_cartao,
  'card_expiration_date' => str_replace("/","",$request->expira_cartao),  
  'card_cvv' => $request->codigo_seguranca_cartao,
]);

dd($updatedSubscription);



  return redirect('admin-contratante/meus-dados-pessoais')->with('message', 'Dados atualizados com sucesso!');

}




//Preferencias
public function preferencias(){
  $preferencias = CactaUsers::where('id',\Auth::user()->id)->first();
  return view('adminContratante.preferencias',compact($preferencias));
}

//Cadastrar Preferencias
public function cadastrarPreferencias(Request $request){
  CactaUsers::where('id',\Auth::user()->id)->update(request()->except(['_token']));

  return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}



//Desativa a conta
public function excluirConta(){
 $pagarme = new \PagarMe\Client('ak_test_aEZCKKiNyBscZ2DZ3qjy69LB6A46qs');
 $subscription = $pagarme->subscriptions()->get([
  'id' => auth()->user()->id_assinatura
]);

 if($subscription->status != "canceled"){

  $canceledSubscription = $pagarme->subscriptions()->cancel([
    'id' => auth()->user()->id_assinatura
  ]);
}


$mytime = \Carbon\Carbon::now();
CactaUsers::where('id',\Auth::user()->id)->update(['cadastro_ativo' =>false,'data_cancelamento' => $mytime]);

//dd($mytime);
return \Redirect::to('/cacta-logout');
}







public function planoExpirou(){
 // $id_plano = auth()->user()->id_plano;
 // $plano = PlanosContratante::where('id',$id_plano)->first();
 // $plano_duracao = $plano->duracao;

 // $data_de_cadastro_usuario =  auth()->user()->created_at;


 // $data_fim_plano = \Carbon\Carbon::parse($data_de_cadastro_usuario)->addDays($plano_duracao);
 // $data_agora = \Carbon\Carbon::now();


 // if($data_agora < $data_fim_plano || $plano->duracao == 'full' )
 // {
 //   return  redirect()->route('site.admin-contratante');
 // }


 // $cadastro = CactaCandidatos::where('id',\Auth::user()->id)->first();
 // $segmentos = Segmento::select('id','segmento')->get();
 // $planos = PlanosContratante::where('id','!=',\Auth::user()->id_plano)->get();

  $data_cancelamento = auth()->user()->data_cancelamento;
  return view('adminContratante.plano-expirou',compact('data_cancelamento'));
}



public function ativarCadastro(){
//criar nova assinatura 
 $pagarme = new \PagarMe\Client('ak_test_aEZCKKiNyBscZ2DZ3qjy69LB6A46qs');
// $canceledSubscription = $pagarme->subscriptions()->cancel([
//   'id' => 499478
// ]);
// exit();


$dados_plano = PlanosContratante::where('id',auth()->user()->id_plano)->first();
$dados = CactaUsers::find(auth()->user()->id);




if($dados_plano->id_pagarme == 486590){
   $idp = 488025;
}else{
  $idp = $dados_plano->id_pagarme;
}

$subscription = $pagarme->subscriptions()->create([
  'plan_id' => $idp,
  'payment_method' => 'credit_card',
  'card_number' => $dados->numero_cartao,
  'card_holder_name' => $dados->nome_cartao,
  'card_expiration_date' => str_replace("/","",$dados->expira_cartao),  
  'card_cvv' => $dados->codigo_seguranca_cartao,
  'postback_url' => 'http://cactavagas.com/api/pagarme',
  'customer' => [
    'email' => $dados->email,
    'name' => $dados->nome_contratante,
    'address' => [
      'street' => $dados->logradouro,
      'street_number' => $dados->numero,
      'complementary' => $dados->complemento,
      'neighborhood' => $dados->bairro,
      'zipcode' => $dados->cep
    ],
  ],
]);

$dados->cadastro_ativo = 1;
$dados->id_assinatura = $subscription->id;
$dados->save();


return redirect('/admin-contratante')->with('message', 'Cadastro reativado com sucesso!');

}






public function cadastrarPlanoExpirou(Request $request){
//dd( $request);
 $validator = $request->validate([
   'id_plano' => 'required',
 ],
 [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
 ]);


 
 CactaUsers::where('id',\Auth::user()->id)->update(request()->except(['_token']));
 return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}

public function bancoCandidato(){
  $autorizacao = $this->authorize('banco_de_candidatos');
  $total = CactaCandidatos::where('id_segmento_enterece',\Auth::user()->id_segmento)->count();
  $candidatos = CactaCandidatos::where('id_segmento_enterece',\Auth::user()->id_segmento)->paginate(3);

  return view('adminContratante.banco-candidato',compact('total','candidatos'));
}





public function bancoCandidatoDetalhe($id_candidato){
 $autorizacao = $this->authorize('banco_de_candidatos');
 $candidato = CactaCandidatos::select('nome','sobrenome','email','telefone','data_nascimento','sonhos_objetivos','sexo','whatsapp','escolariedade',
  'sua_historia','livros','hobbies','cursos_gostaria','cep','logradouro','bairro','localidade','uf','numero','complemento','endereco','facebook','instagram','twitter','site')
 ->where('id',$id_candidato)
 ->where('id_segmento_enterece',\Auth::user()->id_segmento)
 ->first();

 return view('adminContratante.banco-candidato-detalhes',compact('candidato'));
}


public function deletaVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);
 $vagas->delete();
 return redirect()->back()->with('message', 'Vaga excluida com sucesso.');
}



public function renovarVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 $mytime = \Carbon\Carbon::now();
 $quantidade_dias_vaga_plano = $this->verificaPlano(Auth::user()->id_plano)->tempo_disponivel_vaga;

// var_dump($mytime);
// var_dump($mytime->addDays($quantidade_dias_vaga_plano));
// dd();

 cadastrarVaga::where('id',$id)
 ->update(['disponivel' => 1,
   'data_de_criacao' =>  \Carbon\Carbon::now(),
   'data_de_expiracao' => $mytime->addDays($quantidade_dias_vaga_plano)
 ]);
 return redirect()->back()->with('message', 'Vaga renovada');
}


public function desativarVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 cadastrarVaga::where('id',$id)
 ->update(['disponivel' => 0,
]);
 return redirect()->back()->with('message', 'Vaga renovada');
}




public function ativarVaga($id){
 $vagas = cadastrarVaga::find($id);
 $autorizacao = $this->authorize('permissao_vagas',$vagas);

 cadastrarVaga::where('id',$id)
 ->update(['disponivel' => 1,
]);
 return redirect()->back()->with('message', 'Vaga renovada');
}

}


