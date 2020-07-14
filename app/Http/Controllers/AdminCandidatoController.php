<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContratarHome;
use App\FundoVagaHome;
use App\ProcurarVagaHome;
use App\CadastrarVaga;
use App\CactaUsers;
use App\CactaCandidatos;
use App\Segmento;
use App\ExperienciasProfissionais;
use App\CursosCandidatos;
use App\TituloVaga;
use App\PlanosContratante;
use App\Candidaturas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon;
use DB;
use Validator;


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


     $segmento_enterece = \Auth::user()->id_segmento_enterece;


     $ultimas_vagas = DB::table('cadastrar_vaga')
     ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
     ->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
     ->select('cadastrar_vaga.id',
      'titulo_vaga.titulo','cacta_users.nome_empresa','cacta_users.logo','cacta_users.localidade','cacta_users.uf','titulo_vaga.slug')
     ->where('cacta_users.id_segmento',$segmento_enterece)
     ->where('cadastrar_vaga.disponivel',1)
     ->limit(5)
     ->get();

     $experiencias = ExperienciasProfissionais::where('candidato_id',\Auth::user()->id)->count();

     $cursos = CursosCandidatos::where('candidato_id',\Auth::user()->id)->count();

     $total_candidaturas = Candidaturas::where('candidato_id',\Auth::user()->id)->count();
     $total_visualizado = Candidaturas::where('candidato_id',\Auth::user()->id)
     ->where('visualizado_pela_empresa',1)
     ->count();

     return view('adminCandidato.home-admin',compact('ultimas_vagas','total_candidaturas','total_visualizado','experiencias','cursos'));
   }



   public function candidatarVaga($id){
    $vagas_candidatura = Candidaturas::where('vaga_id',$id)
    ->where('candidato_id',Auth::user()->id)
    ->count();

    if ($vagas_candidatura > 0) {
      return  redirect()->back();
      exit();
    }else{
     $candidatura = new Candidaturas;
     $candidatura->vaga_id = $id;
     $candidatura->canditatura_em = Carbon\Carbon::now();
     $candidatura->candidato_id  = Auth::user()->id;
     $candidatura->save();
   }

   return redirect()->back()->with('message', 'Vaga cadastrada com sucesso!');
 }





 public function minhasVagas(){
//faz um join para trazer o nome das vagas no model

  $vagas = DB::table('candidaturas')
  ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
  ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
  ->join('cacta_users', 'cacta_users.id', '=', 'cadastrar_vaga.id_usuario')
  ->select('cadastrar_vaga.*','cacta_users.nome_empresa','titulo_vaga.titulo','candidaturas.canditatura_em','candidaturas.id','candidaturas.visualizado_pela_empresa')
  ->where('candidaturas.candidato_id',Auth::user()->id)
  ->get();

    //dd($vagas);

  return view('adminCandidato.vagas-que-me-candidatei',compact('vagas'));
}






public function verVaga($id){
 $vagas_candidatura = Candidaturas::find($id);
    // dd($id);
 $autorizacao = $this->authorize('permissao_candidato_vagas',$vagas_candidatura);

 $vagas = DB::table('candidaturas')
 ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
 ->join('cacta_users', 'cadastrar_vaga.id_usuario', '=', 'cacta_users.id')
 ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
 ->select('cadastrar_vaga.*','titulo_vaga.titulo','candidaturas.canditatura_em', 'cacta_users.nome_empresa')
 ->where('candidaturas.candidato_id',Auth::user()->id)
 ->where('candidaturas.id',$id)
 ->first();
//dd( $vagas);

 return view('adminCandidato.ver-vaga',compact('vagas'));

}





public function deletaVaga($id){
  $vagas_candidatura = Candidaturas::find($id);
  $autorizacao = $this->authorize('permissao_candidato_vagas',$vagas_candidatura);

  $vagas_candidatura->delete();
  return redirect()->back()->with('message', 'Candidatura desfeita.');
}




public function meusDadosPessoais(){
  $cadastro = CactaCandidatos::where('id',\Auth::user()->id)->first();

  $segmentos = Segmento::select('id','segmento')->get();
  $planos = PlanosContratante::all();

  return view('adminCandidato.meus-dados-pessoais',compact('segmentos','planos','cadastro'));
}








public function meuPerfil(){
  $cadastro = CactaCandidatos::where('id',\Auth::user()->id)->first();

  $segmentos = Segmento::select('id','segmento')->get();
  $planos = PlanosContratante::all();
  $experiencias = ExperienciasProfissionais::all();
  $planos = PlanosContratante::all();
  $cursos_candidatos = CursosCandidatos::all();

  return view('adminCandidato.meu-perfil',compact('segmentos','planos','cadastro','experiencias','cursos_candidatos'));
}




public function cadastrarMeuPerfil(Request $request){
//dd($request->all());
  if ($request->experiencia == true) {
    $validator = Validator::make($request->all(), [
      'nome_empresa.*'  => 'required',
      'cargo.*'  => 'required',
      'inicio.*'  => 'required|date',
      'conclusao.*'  => 'required|date',
      'descricao.*'  => 'required',
    ],
    [
     'nome_empresa.*'  => 'Insira o nome da empresa.',
     'cargo.*'  => 'Insira o cargo.',
     'inicio.*'  => 'Insira a data de inicio.',
     'conclusao.*'  => 'Insira a data de conclusão.',
     'descricao.*'  => 'Insira a descrição sobre a vaga.'
   ]);

    if ($validator->fails()) {
      return redirect()->back()->with('experiencia-fail', 'Preencha todos os campos da experiência profissional.');
    }

    if($request->nome_empresa != null){
      for ($x = 0; $x < count($request->nome_empresa); $x++) { 
        $experiencia = new ExperienciasProfissionais;
        $experiencia->candidato_id = \Auth::user()->id;
        $experiencia->nome_empresa = $request->nome_empresa[$x];
        $experiencia->inicio = $request->inicio[$x];
        $experiencia->cargo = $request->cargo[$x];
        $experiencia->conclusao = $request->conclusao[$x];
        $experiencia->descricao = $request->descricao[$x];
        $experiencia->save();
      }
    }
  }


// ======================================================================================

  if ($request->cursos == true) {
    $validator = Validator::make($request->all(), [
      'nome_curso.*'  => 'required',
      'nome_instituicao.*'  => 'required',
      'grau.*'  => 'required',
      'inicio.*'  => 'required|date',
      'conclusao.*'  => 'required|date',
      'observacao.*'  => 'required',
    ],
    [
     'nome_instituicao.*'  => 'Insira o nome da instituição.',
     'nome_curso.*'  => 'Insira o curso.',
     'grau.*'  => 'Insira o cargo.',
     'inicio.*'  => 'Insira a data de inicio.',
     'conclusao.*'  => 'Insira a data de conclusão.',
     'descricao.*'  => 'Insira a descrição sobre a vaga.'
   ]);

    if ($validator->fails()) {
      return redirect()->back()->with('cursos-fail', 'Preencha todos os campos do curso.');
    }

    if($request->nome_curso != null){
      for ($x = 0; $x < count($request->nome_curso); $x++) { 
        $curso = new CursosCandidatos;
        $curso->candidato_id = \Auth::user()->id;
        $curso->nome_curso = $request->nome_curso[$x];
        $curso->nome_instituicao = $request->nome_instituicao[$x];
        $curso->inicio = $request->inicio[$x];
        $curso->grau = $request->grau[$x];
        $curso->conclusao = $request->conclusao[$x];
        $curso->observacao = $request->observacao[$x];
        $curso->save();
      }
    }
  }

// ======================================================================================







  $validator = $request->validate([
    'escolariedade' => 'required',
    'id_segmento_enterece' => 'required',
//   'nome' => 'required',
  // 'sobrenome' => 'required',
 //  'telefone' => 'required',
  // 'password_confirmation' =>'same:password_atualizar',
  // 'id_plano' => 'required',
 //  'nome_cartao' => 'required',
  // 'numero_cartao' => 'required',
  // 'expira_cartao' => 'required',
  // 'codigo_seguranca_cartao' => 'required',
  ],
  [
    'escolariedade.required' => 'Informe sua escolariedade.',
    'id_segmento_enterece.required'  => 'Escolha o segmento.',
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
  ]);


  CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token','nome_empresa','cargo','inicio','conclusao','descricao','experiencia','cursos','nome_curso','nome_instituicao','grau','observacao']));
  return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}




public function deletarExperiencia($id){
  $experiencia = ExperienciasProfissionais::where('id',$id)->first();
 // dd($experiencia);
  $autorizacao = $this->authorize('permissao_experiencia',$experiencia);
  $experiencia->delete();
  return redirect()->back()->with('message', 'Experiencia excluida.');
}







public function deletarCurso($id){
  $curso = CursosCandidatos::where('id',$id)->first();
 //dd($curso);
  $autorizacao = $this->authorize('permissao_curso',$curso);
  $curso->delete();
  return redirect()->back()->with('message', 'Curso excluido.');
}





public function cadastrarMeusDadosPessoais(Request $request){

  $validator = $request->validate([
   'nome' => 'required',
   'sobrenome' => 'required',
  // 'logo' => 'required|image',
   'cep' => 'required',
   'numero' => 'required',
   //'sobre' => 'required',
   'endereco' => 'required',
   'telefone'  => 'required',
   'data_nascimento' => 'required',
   // 'plano' => 'required',
   // 'nome_cartao' => 'required',
   // 'numero_cartao' => 'required',
   // 'expira_cartao' => 'required',
  // 'codigo_seguranca_cartao' => 'required',
 //  'logo.image' => 'O logo precisa ser uma imagem.',
 // 'escolariedade' => 'required',
  // 'facebook' => 'required',
  // 'instagram' => 'required',
  // 'twitter' => 'required',
  // 'site' => 'required',
 ],
 [
  'nome.required' => 'O nome é obrigatório.',
  'sobrenome.required' => 'O sobrenome é obrigatório.',
  'telefone.required' => 'O número de telefone não pode ser vazio.',
  'cep.required' => 'Verifique se inseriu o CEP.',
  'endereco.required' => 'Insira um CEP válido.',
  //'logo.required' => 'Insira o logo da sua em presa.',
 // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
 // 'sobre.required' => 'Escreva sobre sua empresa.',
  'cep.required' => 'insira o CEP.',
  'data_nascimento.required' => 'A data de nascimento não pode ser vazia.',
  //'plano.required' => 'Escolha o plano que deseja.',
 //  'escolariedade.required' => 'Informe sua escolariedade.',
]);


  if(isset($request->password_atualizar)){
   $senha = Hash::make($request->password_atualizar);
   $request->merge(['password' => $senha]);
 }
 
 CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));
 return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}



//Preferencias
public function preferencias(){
  $preferencias = CactaCandidatos::select('disponivel_banco_candidatos')->where('id',\Auth::user()->id)->first();


  $preferencias = CactaCandidatos::where('id',\Auth::user()->id)->first();
  $cadastro = CactaCandidatos::where('id',\Auth::user()->id)->first();
  $segmentos = Segmento::select('id','segmento')->get();

  return view('adminCandidato.preferencias',compact('preferencias','cadastro','segmentos'));
}

//Cadastrar Preferencias
public function cadastrarPreferencias(Request $request){
  if ($request->disponivel_banco_candidatos == 'on') {
   $request['disponivel_banco_candidatos'] = 1;
 } else{
  $request['disponivel_banco_candidatos'] = 0;
}

//dd($request->all());

CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token']));

return redirect()->back()->with('message', 'Dados atualizados com sucesso!');
}


//Excluir conta permanentemente
public function excluirConta(){
// CactaCandidatos::where('id',\Auth::user()->id)->update(['cadastro_ativo' =>false]);
 //CactaCandidatos::where('id',\Auth::user()->id)->delete();

  $mytime = \Carbon\Carbon::now();
  CactaCandidatos::where('id',\Auth::user()->id)->update(['cadastro_ativo' =>false,'data_cancelamento' => $mytime]);


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
  return view('adminCandidato.plano-expirou',compact('data_cancelamento'));
}






public function ativarCadastro(){
  CactaCandidatos::where('id',\Auth::user()->id)->update(['cadastro_ativo' =>true]);

  return redirect('/admin-candidato')->with('message', 'Cadastro reativado com sucesso!');

}











public function atualizarCartao(){
 return view('adminCandidato.meu-cartao');
}


public function gravarAtualizarCartao(Request $request){
  //dd('bateu');
  $validator = $request->validate([
   'nome_cartao' => 'required',
   'numero_cartao' => 'required|unique:cacta_candidatos',
   'expira_cartao' => 'required',
   'codigo_seguranca_cartao' => 'required',
 ],
 [
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
 ]);
  CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));
  return redirect('meus-dados-pessoais')->with('message', 'Dados atualizados com sucesso!');

}




}


