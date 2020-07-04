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
use Slack;


class CadastrarCandidatoLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function formularioCandidatoParte1(Request $request){
     $validator = $request->validate([
      'g-recaptcha-response' => 'required',
      'sexo' => 'required',
      'data_nascimento' => 'required',
      'nome' => 'required',
      'sobrenome' => 'required',
      'email' => 'required|unique:cacta_candidatos',
      'telefone' => 'required',
      'password' => 'required',
      'password_confirmation' =>'required|same:password',
      'uf' => 'required',      
    ],
    [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',	
      // 'descricao.required' => 'Preencha a descrição da vaga.',

     'g-recaptcha-response.required' => 'Selecione o recapcha',
     'telefone.required' => 'Insira o telefone.',
     'password.required' => 'Defina uma senha.',
     'email.required' => 'Insira seu e-mail.',
     'email.unique' => 'Utilize outro e-mail.',
     'sobrenome.required' => 'Insira seu sobrenome.',
     'data_nascimento.required' => 'Insira sua data de nascimento.',
     'nome.required' => 'Insira seu primeiro nome.',
     'sexo.required' => 'Escolha o gênero.',
     'data_nascimento.required' => 'Preencha a data de nascimento.',
    'password_confirmation.same' => 'A confirmação de senha precisa ser igual a senha.',
       'password_confirmation.required' => 'Confirme a senha.',
     'uf.required' => 'Escolha seu estado.',
   ]);

//=================== reCapcha ==================================

     $secret="6Ld2DwEVAAAAAPruSPTxHcI1dS8C1sh7Ui0XKqXZ";
     $response= $_POST["g-recaptcha-response"];

     $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".urlencode($secret)."&response=".urlencode($response));


     $captcha_success=json_decode($verify);
     if ($captcha_success->success==false) {
  //This user was not verified by recaptcha.
      return view('erro.nao-burle-o-sistema');
      exit();
    }

    else if ($captcha_success->success==true) {
     //sucesso
    };
//=================== reCapcha ==================================

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
//dd($request->all());
  $validator = $request->validate([
  // 'logo' => 'required|image',
   'id_segmento_enterece' => 'required',
   'cep' => 'required',
   'numero' => 'required',
   //'sobre' => 'required',
   'endereco' => 'required',
   // 'plano' => 'required',
   // 'nome_cartao' => 'required',
   // 'numero_cartao' => 'required',
   // 'expira_cartao' => 'required',
  // 'codigo_seguranca_cartao' => 'required',
 //  'logo.image' => 'O logo precisa ser uma imagem.',
   'escolariedade' => 'required',
  // 'facebook' => 'required',
  // 'instagram' => 'required',
  // 'twitter' => 'required',
  // 'site' => 'required',
    'g-recaptcha-response' => 'required',
 ],
 [

  'id_segmento_enterece.required'  => 'Escolha o segmento.',
  'numero.required' => 'Insira o número.',
  'cep.required' => 'Verifique se inseriu o CEP.',
  'endereco.required' => 'Insira um CEP válido.',
  //'logo.required' => 'Insira o logo da sua em presa.',
 // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
 // 'sobre.required' => 'Escreva sobre sua empresa.',
  'cep.required' => 'insira o CEP.',
  //'plano.required' => 'Escolha o plano que deseja.',
  'escolariedade.required' => 'Informe sua escolariedade.',
   'g-recaptcha-response.required' => 'Selecione o recapcha',
]);


//=================== reCapcha ==================================

     $secret="6Ld2DwEVAAAAAPruSPTxHcI1dS8C1sh7Ui0XKqXZ";
     $response= $_POST["g-recaptcha-response"];

     $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".urlencode($secret)."&response=".urlencode($response));


     $captcha_success=json_decode($verify);
     if ($captcha_success->success==false) {
  //This user was not verified by recaptcha.
      return view('erro.nao-burle-o-sistema');
      exit();
    }

    else if ($captcha_success->success==true) {
     //sucesso
    };
//=================== reCapcha ==================================

  $request->merge(['id_plano' => 1]);
  $request->merge(['completou_cadastro' => 1]);
  $request->merge(['cadastro_ativo' => 1]);

  if ($request->disponivel_banco_candidatos == 'on') {
   $request['disponivel_banco_candidatos'] = 1;
 } else{
  $request['disponivel_banco_candidatos'] = 0;
}


CactaCandidatos::where('id',$request->id)->update(request()->except(['_token','password_atualizar','g-recaptcha-response']));

Slack::to('#cacta-vagas')->send('Um usuario acabou de se cadastrar como Candidato.');

return view('site.cadastro-realizado');
}

}


