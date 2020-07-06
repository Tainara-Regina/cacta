<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\CadastrarVaga;
use App\CactaUsers;
use App\Candidaturas;
use App\CactaCandidatos;
use App\PlanosContratante;
use App\ExperienciasProfissionais;
use App\CursosCandidatos;

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




      Gate::define('permissao_experiencia',function(CactaCandidatos $user,ExperienciasProfissionais $experiencia){
       return  $user->id == $experiencia->candidato_id;
     });


      Gate::define('permissao_curso',function(CactaCandidatos $user,CursosCandidatos $curso){
        return  $user->id == $curso->candidato_id;
      });


      Gate::define('permissao_contratante_visualizar_vagas',function(Candidaturas $candidatura, CactaCandidatos $candidatos){

       return  $candidatura->candidato_id == $candidatos->id;

     });


//============================================
//==========   Permissoes de planos    ======= 
//============================================
      $permissions = PlanosContratante::with('roles')->get();
   Gate::define('banco_de_candidatos',function(CactaUsers $user) use ($permissions){
                // return $user->id == $post->user_id;
       foreach ($permissions as $permission) {

         if($permission->id == $user->id_plano){
               // dd($permission);
          if ($permission->banco_de_candidatos == 1) {
          //  echo 'sim';
           return true;
         }else{
          // echo 'não';
           return false;
         }
       }
     }

   });




     Gate::define('materiais_exclusivos',function(CactaUsers $user) use ($permissions){

      foreach ($permissions as $permission) {

       if($permission->id == $user->id_plano){
               // dd($permission);
        if ($permission->materiais_exclusivos == 1) {
          //  echo 'sim';
         return true;
       }else{
          // echo 'não';
         return false;
       }
     }
   }
 });


//=========================================================
//==========      Fim Permissoes de planos      ===========
//=========================================================

























//============================================
//==========   Permissoes de planos    ======= 
//============================================
     $permissions = PlanosContratante::with('roles_contratante')->get();


     Gate::define('banco_de_candidatos',function(CactaUsers $user) use ($permissions){
                // return $user->id == $post->user_id;
       foreach ($permissions as $permission) {

         if($permission->id == $user->id_plano){
               // dd($permission);
          if ($permission->banco_de_candidatos == 1) {
          //  echo 'sim';
           return true;
         }else{
          // echo 'não';
           return false;
         }
       }
     }

   });




     Gate::define('materiais_exclusivos',function(CactaUsers $user) use ($permissions){

      foreach ($permissions as $permission) {

       if($permission->id == $user->id_plano){
               // dd($permission);
        if ($permission->materiais_exclusivos == 1) {
          //  echo 'sim';
         return true;
       }else{
          // echo 'não';
         return false;
       }
     }
   }
 });


//=========================================================
//==========      Fim Permissoes de planos      ===========
//=========================================================














   }
 }

