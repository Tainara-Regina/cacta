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

      $vagas_candidatura = Candidaturas::where('vaga_id',$id)
      ->where('candidato_id',Auth::user()->id)
      ->count();

      if ($vagas_candidatura > 0) {
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
    ->select('cadastrar_vaga.*','cacta_users.nome_empresa','titulo_vaga.titulo','candidaturas.canditatura_em','candidaturas.id')
    ->where('candidaturas.candidato_id',Auth::user()->id)
    ->get();

    // dd($vagas);

    return view('adminCandidato.vagas-que-me-candidatei',compact('vagas'));
  }






  public function verVaga($id){
   $vagas_candidatura = Candidaturas::find($id);
    // dd($id);
   $autorizacao = $this->authorize('permissao_candidato_vagas',$vagas_candidatura);

   $vagas = DB::table('candidaturas')
   ->join('cadastrar_vaga', 'cadastrar_vaga.id', '=', 'candidaturas.vaga_id')
   ->join('titulo_vaga', 'cadastrar_vaga.titulo', '=', 'titulo_vaga.id')
   ->select('cadastrar_vaga.*','titulo_vaga.titulo','candidaturas.canditatura_em')
   ->where('candidaturas.candidato_id',Auth::user()->id)
   ->where('candidaturas.id',$id)
   ->first();


   return view('adminContratante.ver-vaga',compact('vagas'));

 }





 public function deletaVaga($id){
  $vagas_candidatura = Candidaturas::find($id);
  $autorizacao = $this->authorize('permissao_candidato_vagas',$vagas_candidatura);

  $vagas_candidatura->delete();
  dd('deletou candidatura');
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

  return view('adminCandidato.meu-perfil',compact('segmentos','planos','cadastro'));
}




public function cadastrarMeuPerfil(Request $request){

 $validator = $request->validate([
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
      // 'logo.required' => 'Insira o logo da sua em presa.',
      // 'segmento.required'  => 'Selecione o segmento da sua empresa.',  
      // 'descricao.required' => 'Preencha a descrição da vaga.',
      // 'sobre.required' => 'Escreva sobre sua empresa.',
 ]);


 if(isset($request->password_atualizar)){
   $senha = Hash::make($request->password_atualizar);
   $request->merge(['password' => $senha]);
 }

 
 CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));
 return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}





public function cadastrarMeusDadosPessoais(Request $request){

 $validator = $request->validate([
   'nome' => 'required',
   'sobrenome' => 'required',
 //  'telefone' => 'required',
  // 'password_confirmation' =>'same:password_atualizar',
  // 'id_plano' => 'required',
 //  'nome_cartao' => 'required',
  // 'numero_cartao' => 'required',
  // 'expira_cartao' => 'required',
  // 'codigo_seguranca_cartao' => 'required',
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

 
 CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token','password_atualizar','password_confirmation']));
 return redirect()->back()->with('message', 'Dados atualizados com sucesso!'); 
}



//Preferencias
public function preferencias(){
  $preferencias = CactaCandidatos::select('disponivel_banco_candidatos')->where('id',\Auth::user()->id)->first();
 // dd($preferencias);
  return view('adminCandidato.preferencias',compact('preferencias'));
}

//Cadastrar Preferencias
public function cadastrarPreferencias(Request $request){
if ($request->disponivel_banco_candidatos == 'on') {
 $request['disponivel_banco_candidatos'] = 1;
} else{
  $request['disponivel_banco_candidatos'] = 0;
}


  CactaCandidatos::where('id',\Auth::user()->id)->update(request()->except(['_token']));

  return redirect()->back()->with('message', 'Dados atualizados com sucesso!');
}


//Excluir conta permanentemente
public function excluirConta(){
 CactaCandidatos::where('id',\Auth::user()->id)->update(['cadastro_ativo' =>false]);
 return \Redirect::to('/cacta-logout');
}


}

