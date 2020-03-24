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
use Illuminate\Support\Facades\Hash;
use DB;


class CadastrarLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function formularioContratanteParte1(Request $request){
      // dd($request->all());
     $validator = $request->validate([
       'nome_contratante' => 'required',
       'nome_empresa' => 'required',
       'email' => 'required|unique:cacta_users',
       'telefone' => 'required',
       'password' => 'required',
       'password_confirmation' =>'required|same:password',
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

     $key = md5(rand(10000000, 99999999));

     $dados = new CactaUsers;
     $dados->nome_contratante = $request->nome_contratante;
     $dados->nome_empresa = $request->nome_empresa;
     $dados->email = $request->email;
     $dados->telefone = $request->telefone;
     $dados->password = Hash::make($request->password);
     $dados->key_verificacao = $key;

     $dados->save();



     $nome = explode(' ',$request->nome_contratante);
     $nome = $nome[0];
     

     $this->enviarConfirmacao($dados);

     return view('site.confirmeEmailContratante',compact('nome'));	
   }




   public function enviarConfirmacao($dados){

    $user = new \stdClass();
    $user->name = $dados->nome_contratante;
    $user->email =  $dados->email;
    $user->id = $dados->id;
    $user->key =  $dados->key_verificacao;

 //   $retorno = new \App\Mail\confirmacaoCadastroContratante($user);

    \Illuminate\Support\Facades\Mail::send(new \App\Mail\confirmacaoCadastroContratante($user));  
  }




  public function validarCadastro($id,$key){
    $usuario = CactaUsers::select('nome_contratante','id')
    ->where('id',$id)
    ->where('completou_cadastro',false)
    ->where('key_verificacao',$key)
    ->first();


    if ($usuario) {
     $nome = explode(' ',$usuario->nome_contratante);
     $nome = $nome[0];
     $segmentos = Segmento::select('id','segmento')->get();


     $user = CactaUsers::find($id);
     $user->verificado = 1;
     $user->save();

     return view('site.formularioContratante-2',compact('segmentos','nome','usuario','usuario'));

   }else{
    echo 'Desculpe, mas esta verificação é invalida ou foi expirada.';
  }

}




public function formularioContratanteParte2(Request $request){

 $validator = $request->validate([
   'logo' => 'required|image',
   'segmento' => 'required',
   'cep' => 'required',
   'sobre' => 'required',
   'plano' => 'required',

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
   'logo.required' => 'Insira o logo da sua em presa.',
   'segmento.required'  => 'Selecione o segmento da sua empresa.',  
   'sobre.required' => 'Escreva sobre sua empresa.',
   'cep.required' => 'insira o CEP',
    'plano.required' => 'Escolha o plano que deseja'
 ]);



 if($request->file('logo')->isValid())
 {
  $nome_imagem = $request->file('logo')->store('contratante/logo');
}


$dados = CactaUsers::find($request->id);
$dados->id_segmento = $request->segmento;
$dados->logo =  $nome_imagem;
$dados->cep = $request->cep;
$dados->sobre = $request->sobre;
$dados->facebook = $request->facebook;
$dados->instagram = $request->instagram;
$dados->verificado = 1;
$dados->id_plano = $request->plano;
$dados->twitter = $request->twitter;
$dados->site = $request->site;


$dados->nome_cartao = $request->nome_cartao;
$dados->numero_cartao = $request->numero_cartao;
$dados->expira_cartao = $request->expira_cartao;
$dados->codigo_seguranca_cartao = $request->codigo_seguranca_cartao;
$dados->completou_cadastro = 1;
$dados->save();

dd('cadastrou');
}

}


