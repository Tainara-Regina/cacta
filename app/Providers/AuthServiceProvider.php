<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\CadastrarVaga;
use App\CactaUsers;
use App\Candidaturas;
use App\CactaCandidatos;
use App\PlanosContratante;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('permissao_vagas',function(CactaUsers $user, CadastrarVaga $vagas){

         return  $user->id == $vagas->id_usuario;

     });

        Gate::define('permissao_candidato_vagas',function(CactaCandidatos $user, Candidaturas $vagas_candidatura){

         return  $user->id == $vagas_candidatura->candidato_id;

     });


        Gate::define('permissao_contratante_visualizar_vagas',function(Candidaturas $candidatura, CactaCandidatos $candidatos){

         return  $candidatura->candidato_id == $candidatos->id;

     });


//============================================
//==========   Permissoes de planos    ======= 
//============================================
        $permissions = PlanosContratante::with('roles')->get();


        foreach($permissions as $permission)
        {
           Gate::define('banco_de_candidatos',function(CactaUsers $user) use ($permission){
             //dd($permission);
                // return $user->id == $post->user_id;

               if($permission->id == $user->id_plano){
               // dd($permission);
                if ($permission->banco_de_candidatos == 1) {
                   return true;
               }else{
                   return false;
               }
           }
       });


           Gate::define('materiais_exclusivos',function(CactaUsers $user) use ($permission){
             //dd($permission);
                // return $user->id == $post->user_id;

             if($permission->id == $user->id_plano){
               // dd($permission);
                if ($permission->materiais_exclusivos == 1) {
                 return true;
             }else{
                 return false;
             }
         }
     });
//=========================================================
//==========      Fim Permissoes de planos      ===========
//=========================================================






       }
   }
}

