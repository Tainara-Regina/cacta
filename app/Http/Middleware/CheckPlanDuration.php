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







//=================================   Bate nesta parte    ===========================================

    if(auth()->user()->data_cancelamento != null  || auth()->user()->data_cancelamento != '' ){

      $dia_criacao = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->created_at)->day;

      $dia_cancelamento = null;

      if(auth()->user()->data_cancelamento != null && auth()->user()->data_cancelamento != ''
       && auth()->user()->data_cancelamento != '0000-00-00 00:00:00' ){

        $dia_cancelamento = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_cancelamento)->day;

    }


    $diff_cadastro_depois = null;
    if($dia_cancelamento != null){
      if($dia_criacao > $dia_cancelamento){
        // faço a diferença entre estes dois dias
        $diff_cadastro_depois = $dia_criacao - $dia_cancelamento;
      }
    }





// verifica se ha diferença de dias do cadastro até o cancelamento 
    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', auth()->user()->data_cancelamento)->day($dia_criacao)->addMonths(1);
    $from = \Carbon\Carbon::now();
    $diff_in_days = $to->diffInDays($from);

    $usuario_assinatura = auth()->user()->status_assinatura;
    if ($usuario_assinatura == "canceled" || auth()->user()->cadastro_ativo == 0 ) {



      if($diff_cadastro_depois != null){
        if($diff_cadastro_depois <= 0){
         if(auth()->user()->sobrenome){
       // dd( auth()->user());
          return  redirect()->route('site.plano-expirou');
        }else{
          return  redirect()->route('plano-expirou');
        }
      }
    }




    if($diff_in_days <= 0){  

      if(auth()->user()->sobrenome){
       // dd( auth()->user());
        return  redirect()->route('site.plano-expirou');
      }else{
        return  redirect()->route('plano-expirou');
      }

    }    
  }
}


//se o cadastro foi cancelado, passa para todas  as views quantos dias faltam para não ter mais acesso ao plano
if($diff_cadastro_depois != null){
  view()->share('faltam', $diff_cadastro_depois);
}else{
view()->share('faltam', $diff_in_days);
}

return $next($request);

//===========================================================================





$id_plano = auth()->user()->id_plano;
$plano = PlanosContratante::where('id',$id_plano)->first();

//dd(auth()->user()->id_plano);

$plano_duracao = $plano->duracao;

$data_de_cadastro_usuario =  auth()->user()->created_at;

//se planos diferente de full, acrescentar a quantidade de dias a partir da data de criação do cadastro do 
// usuario e ver se é igual a data atual ou se ultrapassa. Se sim, redirecionar para trocar de plano

   // dd($plano);

if ($plano->duracao != 'full') {

  $data_fim_plano = Carbon::parse($data_de_cadastro_usuario)->addDays($plano_duracao);
  $data_agora = Carbon::now();


  if($data_agora > $data_fim_plano)
  {
          //  redirect para a pagina de escolher os planos
          // dd('sfhho');
    return  redirect()->route('plano-expirou');
  }



}


   // return $next($request);
}
}
