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


//Route::get('/', 'BlogController@home')->name('site.inicio');

Route::get('/', 'InicioController@iniciso')->name('site.inicio');
Route::get('/blog', 'BlogController@home')->name('blog-home');
Route::get('/blog/{id}', 'BlogController@post')->name('post');
Route::get('/busca', 'BlogController@busca')->name('busca');
Route::get('/categoria/{categoria}', 'BlogController@categoria')->name('categoria');

Route::group(['prefix' => 'cacta-sucesso-painel'], function () {
	Voyager::routes();
});


//==================================================
//====== Redirecionamento Pro blog ==========
//==================================================
//Route::middleware(['redirect'])->group(function () {





//Rotas do admin contratante
Route::middleware(['checkplan.duration'])->group(function () {

	Route::prefix('admin-contratante')->group(function () {
		Route::get('/', 'AdminContratanteController@home')->name('site.admin-contratante');

		Route::get('candidatos-vaga', 'AdminContratanteController@candidatosVaga')->name('site.candidatos-vaga');

		Route::get('banco-candidato', 'AdminContratanteController@bancoCandidato')->name('site.banco-candidato');


		Route::get('renovar-vaga/{id}', 'AdminContratanteController@renovarVaga')->name('site.renovar-vaga');
		Route::get('desativar-vaga/{id}', 'AdminContratanteController@desativarVaga')->name('site.desativar-vaga');
		Route::get('ativar-vaga/{id}', 'AdminContratanteController@ativarVaga')->name('site.ativar-vaga');



		Route::get('banco-candidato-detalhes/{id_candidato}', 'AdminContratanteController@bancoCandidatoDetalhe')->name('site.banco-candidato-detalhes');

		Route::get('preferencias', 'AdminContratanteController@preferencias')->name('site.preferencias');

		Route::get('divulgar-vaga', 'AdminContratanteController@divulgarVaga')->name('site.divulgar-vaga');


		Route::get('ver-candidatos/detalhes-candidato/{id_candidato}/{id_vaga}', 'AdminContratanteController@detalhesCandidato')->name('site.detalhes-candidato');


		Route::post('cadastrar-vaga', 'AdminContratanteController@cadastrarVaga')->name('site.cadastrar-vaga');



		Route::get('editar-vaga/{id}', 'AdminContratanteController@editarVaga')->name('site.editar-vaga');



		Route::get('deleta-vaga/{id}', 'AdminContratanteController@deletaVaga')->name('site.deleta-vaga');


		Route::get('ver-vaga/{id}', 'AdminContratanteController@verVaga')->name('site.ver-vaga');








		Route::get('ver-candidatos/{id}', 'AdminContratanteController@verCandidatos')->name('site.ver-candidatos');



		Route::post('update-vaga', 'AdminContratanteController@updateVaga')->name('site.update-vaga');


		Route::get('meus-dados', 'AdminContratanteController@meusDados')->name('site.meus-dados');


		Route::get('meus-dados-pessoais', 'AdminContratanteController@meusDadosPessoais')->name('site.meus-dados-pessoais');


		Route::post('meus-dados', 'AdminContratanteController@cadastrarMeusDados')->name('site.cadastrar-meus-dados');


		Route::post('meus-dados-pessoais', 'AdminContratanteController@cadastrarMeusDadosPessoais')->name('site.cadastrar-meus-dados-pessoais');

		Route::get('dados-cartao', 'AdminContratanteController@atualizarCartao')->name('site.dados-cartao');

		Route::post('gravar-atualizar-cartao', 'AdminContratanteController@gravarAtualizarCartao')->name('site.gravar-atualizar-cartao');

		Route::get('excluir-conta', 'AdminContratanteController@excluirConta')->name('site.excluir-conta'); 
	});
});






Route::post('cadastrar-plano-expirou', 'AdminContratanteController@cadastrarPlanoExpirou')->name('site.cadastrar-plano-expirou');





Route::get('dados-cartao', 'AdminCandidatoController@atualizarCartao')->name('dados-cartao');

Route::post('gravar-atualizar-cartao-candidato', 'AdminCandidatoController@gravarAtualizarCartao')->name('gravar-atualizar-cartao');


Route::get('/redefinir-senha-candidato','RedefinirSenhaController@candidato')->name('redefinir-senha-candidato');
Route::get('/redefinir-senha-contratante','RedefinirSenhaController@contratante')->name('redefinir-senha-contrantante');




Route::post('/enviar-redefinir-senha-candidato','RedefinirSenhaController@candidatoEnviarRedefinicao')->name('enviar-redefinir-senha-candidato');

Route::post('/enviar-redefinir-senha-contratante','RedefinirSenhaController@contratanteEnviarRedefinicao')->name('enviar-redefinir-senha-contratante');




Route::get('/vaga/{id}/{slug}', 'VagaController@vaga')->name('site.vaga');

Route::get('/preferencias', 'AdminCandidatoController@preferencias')->name('preferencias');
Route::post('/cadastrar-preferencias', 'AdminCandidatoController@cadastrarPreferencias')->name('cadastrar-preferencias');
Route::get('/admin-candidato/excluir-conta', 'AdminCandidatoController@excluirConta')->name('excluir-conta'); 



Route::get('/plano-expirou', 'AdminContratanteController@planoExpirou')->name('plano-expirou');



Route::post('/admin-candidato/cadastrar-preferencias', 'AdminContratanteController@cadastrarPreferencias')->name('site.cadastrar-preferencias');






Route::get('/meus-perfil', 'AdminCandidatoController@meuPerfil')->name('meu-perfil');



Route::post('/cadastrar-meus-perfil', 'AdminCandidatoController@cadastrarMeuPerfil')->name('cadastrar-meu-perfil');



Route::get('/meus-dados-pessoais', 'AdminCandidatoController@meusDadosPessoais')->name('meus-dados-pessoais');



Route::post('/admin-candidato/meus-dados-pessoais', 'AdminCandidatoController@cadastrarMeusDadosPessoais')->name('cadastrar-meus-dados-pessoais');




Route::get('/deletar-experiencia/{id}', 'AdminCandidatoController@deletarExperiencia')->name('deletar.experiencia');


Route::get('/deletar-curso/{id}', 'AdminCandidatoController@deletarCurso')->name('deletar.curso');






Route::get('/minhas-vagas/', 'AdminCandidatoController@minhasVagas')->name('minhas-vagas');


Route::get('/ver-vaga/{id}', 'AdminCandidatoController@verVaga')->name('ver-vaga');


Route::get('/deleta-candidatura/{id}', 'AdminCandidatoController@deletaVaga')->name('deleta-candidatura');

Route::get('/candidatar-se/{id}', 'AdminCandidatoController@candidatarVaga')->name('candidatar-se');



Route::get('/lista-vagas', 'VagaController@listaVaga')->name('site.lista-vaga');


Route::get('/admin-candidato', 'AdminCandidatoController@home')->name('site.admin-candidato');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/cacta-login', 'Auth\CactaLoginController@login')->name('cactalogin');


// login candidato
Route::post('/cacta-login-candidato', 'Auth\CactaLoginCandidatoController@login')->name('cactalogin-candidato');



Route::get('/cacta-logout', 'Auth\CactaLogoutController@logout')->name('cactalogout');

Route::post('/vagas-inicio', 'AdminContratanteControllerAjax@vagasInicio')->name('vagasInicio');



Route::post('/vagas-ajax', 'AdminContratanteControllerAjax@vagas')->name('vagas-ajax');


Route::get('/cadastro-contratante', 'InicioController@formularioContratante')->name('formularioContratante');
Route::get('/cadastro-candidato', 'InicioController@formularioCandidato')->name('formularioCandidato');

Route::post('/confirme-email-cadastrante','CadastrarLoginController@formularioContratanteParte1')->name('site.formularioContratanteParte1');

Route::post('/confirme-email-candidato','CadastrarCandidatoLoginController@formularioCandidatoParte1')->name('site.formularioCandidatoParte1');

Route::get('enviar-email',function(){

	$user = new stdClass();
	$user->name = 'Tainara Regina';
	$user->email = 'tainararegina20@gmail.com';
	$user->key = 'teste chave';

	return new \App\Mail\confirmacaoCadastroContratante($user);

//  \Illuminate\Support\Facades\Mail::send(new \App\Mail\confirmacaoCadastroContratante($user));	
});


Route::get('/redefinir-senha/{key}/{tipo_cadastro}','RedefinirSenhaController@redefinir')->name('site.redefinir-senha');

Route::get('/senha-alterada-sucesso/','RedefinirSenhaController@sucesso')->name('senha-alterada-sucesso');

Route::post('/redefinir-update','RedefinirSenhaController@redefinirUpdate')->name('site.redefinir-update');


Route::get('/confirmacao-contratante/{id}/{key}','CadastrarLoginController@validarCadastro')->name('site.confirmacaoContratante');


Route::get('/confirmacao-candidato/{id}/{key}','CadastrarCandidatoLoginController@validarCadastro')->name('site.confirmacaoCandidato');


Route::post('/completando-cadastro','CadastrarLoginController@formularioContratanteParte2')->name('site.formularioContratanteParte2');


Route::post('/completando-cadastro-candidato','CadastrarCandidatoLoginController@formularioCandidatoParte2')->name('site.formularioCandidatoParte2');






Route::fallback(function() {
   // return 'Hm, why did you land here somehow?';
});

//==================================================
//====== Fim do redirecionamento Pro blog ==========
//==================================================
//});