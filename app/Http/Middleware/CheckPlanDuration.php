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
    return $next($request);

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
