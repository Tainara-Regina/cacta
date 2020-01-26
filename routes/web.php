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
Route::post('/admin-contratante', 'AdminContratanteController@home')->name('site.admin-contratante');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
