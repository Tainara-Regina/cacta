<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::get('/', 'InicioController@inicio')->name('site.inicio');
Route::get('/vaga', 'VagaController@vaga')->name('site.vaga');
Route::get('/lista-vagas', 'VagaController@listaVaga')->name('site.lista-vaga');
Route::get('/admin-contratante', 'AdminContratanteController@home')->name('site.admin-contratante');


Route::get('/admin-contratante/candidatos-vaga', 'AdminContratanteController@candidatosVaga')->name('site.candidatos-vaga');

Route::get('/admin-contratante/divulgar-vaga', 'AdminContratanteController@divulgarVaga')->name('site.divulgar-vaga');


Route::post('/admin-contratante/cadastrar-vaga', 'AdminContratanteController@cadastrarVaga')->name('site.cadastrar-vaga');


Route::get('/admin-contratante/meus-dados', 'AdminContratanteController@meusDados')->name('site.meus-dados');


Route::post('/admin-contratante/meus-dados', 'AdminContratanteController@cadastrarMeusDados')->name('site.cadastrar-meus-dados');

Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/cacta-login', 'Auth\CactaLoginController@login')->name('cactalogin');

Route::get('/cacta-logout', 'Auth\CactaLogoutController@logout')->name('cactalogout');

Route::post('/vagas-inicio', 'AdminContratanteControllerAjax@vagasInicio')->name('vagasInicio');

Route::get('/cadastro-contratante', 'InicioController@formularioContratante')->name('formularioContratante');


Route::post('/confirme-email-cadastrante','CadastrarLoginController@formularioContratanteParte1')->name('site.formularioContratanteParte1');





Route::get('enviar-email',function(){

$user = new stdClass();
$user->name = 'Tainara Regina';
$user->email = 'tainararegina20@gmail.com';
$user->key = 'teste chave';

return new \App\Mail\confirmacaoCadastroContratante($user);

//  \Illuminate\Support\Facades\Mail::send(new \App\Mail\confirmacaoCadastroContratante($user));	
});



Route::get('/confirmacao-contratante/{id}/{key}','CadastrarLoginController@validarCadastro')->name('site.confirmacaoContratante');


Route::post('/completando-cadastro','CadastrarLoginController@formularioContratanteParte2')->name('site.formularioContratanteParte2');