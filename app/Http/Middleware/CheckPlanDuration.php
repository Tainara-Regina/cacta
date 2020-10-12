<?php

namespace App\Http\Middleware;

use Closure;
use App\CactaUsers;
use App\PlanosContratante;
use Carbon\Carbon;


class CheckPlanDuration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
   // se não estiver logado redireciona para o inicio
     if ( !auth()->check() ){
      return redirect()->route('inicio');
    }




// - falta tratar se o status_assinatura for pending_payment
// - falta tratar se o status_assinatura for canceled







//========= O usuario utiliza a plataforma durante o tempo que ele tem direito ============
//se o cadastro_ativo for igual a 0 data_de_cancelamento não for igual a 0000-00-00 00:00:00 ou null
// ele da um return que proibe o acesso --> OK



// se o cadastro_ativo for igual a 0 e se estiver no mes de cancelamento e ano de cancelamento, e o dia de cancelamento for maior que o dia de cadastro(ou dia de reativação se não for null) 
// ele da um return que proibe o acesso --> OK


// se o cadastro_ativo for igual a 0 e se estiver no mes de cancelamento e ano de cancelamento, e o dia de cancelamento for menor que o dia de cadastro(ou dia de reativação se não for null) 
// ele da um return que não proibe o acesso e retorna a diferença de dias 


//se não retorna normal

    $dia_atual = \Carbon\Carbon::now()->day;
    $mes_atual = \Carbon\Carbon::now()->month;
    $ano_atual = \Carbon\Carbon::now()->year;


    if(auth()->user()->data_reativacao != '0000-00-00 00:00:00' && auth()->user()->data_reativacao != null ){
      $dia_cadastro =\Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_reativacao)->day;
      $mes_cadastro = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_reativacao)->month;
      $ano_cadastro =\Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_reativacao)->year;

    }else{
      $dia_cadastro  = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->created_at)->day;
      $mes_cadastro = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->created_at)->month;
      $ano_cadastro =\Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->created_at)->year;

    }
    $dia_cancelamento =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_cancelamento)->day;
    $mes_cancelamento =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_cancelamento)->month;
    $ano_cancelamento =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_cancelamento)->year;

    if (auth()->user()->data_cancelamento == '0000-00-00 00:00:00' || auth()->user()->data_cancelamento == null  && auth()->user()->cadastro_ativo == 0 ) {
    //ou criar uma tela de cadastro cancelado.
      return  redirect()->route('plano-expirou');
    }


    if(auth()->user()->cadastro_ativo == 0 && $mes_cancelamento == $mes_atual && $ano_cancelamento == $ano_atual && $dia_cancelamento > $dia_cadastro){
      return  redirect()->route('plano-expirou');
    }

    if(auth()->user()->cadastro_ativo == 0 && $mes_cancelamento == $mes_atual && $ano_cancelamento == $ano_atual && $dia_cancelamento < $dia_cadastro){


     $diff_in_days = $dia_cadastro - $dia_cancelamento;


     view()->share('faltam',$diff_in_days);
     return $next($request);
   } 
   if(auth()->user()->data_cancelamento != '0000-00-00 00:00:00' && auth()->user()->data_cancelamento != null && auth()->user()->cadastro_ativo == 0){
     return  redirect()->route('plano-expirou');
   }

   return $next($request);

//===========================================================================


   $id_plano = auth()->user()->id_plano;
   $plano = PlanosContratante::where('id',$id_plano)->first();

   $plano_duracao = $plano->duracao;

   $data_de_cadastro_usuario =  auth()->user()->created_at;

//se planos diferente de full, acrescentar a quantidade de dias a partir da data de criação do cadastro do 
// usuario e ver se é igual a data atual ou se ultrapassa. Se sim, redirecionar para trocar de plano

   if ($plano->duracao != 'full') {

    $data_fim_plano = Carbon::parse($data_de_cadastro_usuario)->addDays($plano_duracao);
    $data_agora = Carbon::now();

    if($data_agora > $data_fim_plano)
    {
          //  redirect para a pagina de escolher os planos
      return  redirect()->route('plano-expirou');
    }
  }
   // return $next($request);
}
}
