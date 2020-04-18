<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\CactaCandidatos;
use App\Segmento;
use App\TituloVaga;
use App\PlanosContratante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;


class CadastrarCandidatoLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function formularioCandidatoParte1(Request $request){
     // dd($request->all());
     $validator = $request->validate([
       'nome' => 'required',
       'sobrenome' => 'required',
       'email' => 'required|unique:cacta_candidatos',
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

     $dados = new CactaCandidatos;
     $dados->nome = $request->nome;
     $dados->sobrenome = $request->sobrenome;
     $dados->email = $request->email;
     $dados->uf = $request->uf;
     $dados->localidade = $request->localidade;
     $dados->telefone = $request->telefone;
      $dados->data_nascimento = $request->data_nascimento;
        $dados->sexo = $request->sexo;
     $dados->password = Hash::make($request->password);
     $dados->key_verificacao = $key;

     $dados->save();

     $nome = $dados->nome;
     

     $this->enviarConfirmacao($dados);

     return view('site.confirmeEmailCandidato',compact('nome'));	
   }










   public function enviarConfirmacao($dados){

    $user = new \stdClass();
    $user->name = $dados->nome_contratante;
    $user->email =  $dados->email;
    $user->id = $dados->id;
    $user->key =  $dados->key_verificacao;

 //   $retorno = new \App\Mail\confirmacaoCadastroContratante($user);

    \Illuminate\Support\Facades\Mail::send(new \App\Mail\confirmacaoCadastroCandidato($user));  
  }




  public function validarCadastro($id,$key){
    $usuario = CactaCandidatos::select('nome','id')
    ->where('id',$id)
    ->where('completou_cadastro',false)
    ->where('key_verificacao',$key)
    ->first();


    if ($usuario) {
     $nome = $usuario->nome;
     $segmentos = Segmento::select('id','segmento')->get();


     $user = CactaCandidatos::find($id);
     $user->verificado = 1;
     $user->save();


     $planos = PlanosContratante::all();

     return view('site.formularioCandidato-2',compact('segmentos','nome','usuario','usuario','planos'));

   }else{
    echo 'Desculpe, mas esta verificação é invalida ou foi expirada.';
  }

}




public function formularioCandidatoParte2(Request $request){

 // $validator = $request->validate([
 //   'logo' => 'required|image',
 //   'segmento' => 'required',
 //   'cep' => 'required',
 //   'numero' => 'required',
 //   'complemento' => 'required',
 //   'sobre' => 'required',
 //   'endereco' => 'required',
 //   'plano' => 'required',

 //   'nome_cartao' => 'required',
 //   'numero_cartao' => 'required',
 //   'expira_cartao' => 'required',
 //   'codigo_seguranca_cartao' => 'required',
 //  // 'facebook' => 'required',
 //  // 'instagram' => 'required',
 //  // 'twitter' => 'required',
 //  // 'site' => 'required',
 // ],
 // [
 //   'endereco.required' => 'Insira um CEP válido.',
 //   'logo.required' => 'Insira o logo da sua em presa.',
 //   'segmento.required'  => 'Selecione o segmento da sua empresa.',  
 //   'sobre.required' => 'Escreva sobre sua empresa.',
 //   'cep.required' => 'insira o CEP.',
 //   'plano.required' => 'Escolha o plano que deseja.'
 // ]);




// $dados = CactaCandidatos::find($request->id);
// $dados->id_segmento = $request->segmento;
// $dados->logo =  $nome_imagem;


// $dados->cep = $request->cep;
// $dados->numero = $request->numero;
// $dados->complemento = $request->complemento;
// $dados->logradouro = $request->logradouro;
// $dados->bairro = $request->bairro;
// $dados->localidade = $request->localidade;
// $dados->uf = $request->uf;
// $dados->uf = $request->endereco;

// $dados->sobre = $request->sobre;
// $dados->facebook = $request->facebook;
// $dados->instagram = $request->instagram;
// $dados->verificado = 1;
// $dados->id_plano = $request->plano;
// $dados->twitter = $request->twitter;
// $dados->site = $request->site;


// $dados->nome_cartao = $request->nome_cartao;
// $dados->numero_cartao = $request->numero_cartao;
// $dados->expira_cartao = $request->expira_cartao;
// $dados->codigo_seguranca_cartao = $request->codigo_seguranca_cartao;
// $dados->completou_cadastro = 1;
// $dados->save();

$request->merge(['id_plano' => 1]);
$request->merge(['completou_cadastro' => 1]);
$request->merge(['cadastro_ativo' => 1]);

if ($request->disponivel_banco_candidatos == 'on') {
 $request['disponivel_banco_candidatos'] = 1;
} else{
  $request['disponivel_banco_candidatos'] = 0;
}


CactaCandidatos::where('id',$request->id)->update(request()->except(['_token','password_atualizar']));

dd('é nóiz manoo');
}

}


