<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\CadastrarVaga;
use App\CactaUsers;
use App\Candidaturas;
use App\CactaCandidatos;

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




    }
}

