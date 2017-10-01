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

Route::get('/', 'ControllerOut@welcome');

Route::get('/portifolio', 'ControllerOut@portifolio')->name('portifolio');
Route::get('/noticias', 'ControllerOut@noticias')->name('noticias');
Route::get('/contato', 'ControllerOut@contato')->name('contato');
Route::get('/cursos-e-eventos', 'ControllerOut@cursosEventos')->name('cursoEvento');
Route::get('/curso/{curso}', 'ControllerOut@curso')->name('curso');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['role:administrator'],['auth']], function() {

//-------------------------------------------- HOME CONTROLLER --------------------------------------------------------------

    Route::resource('/system/home','System\HomeController');
    Route::post('/system/patrocinio','System\HomeController@patrocinio')->name('home.patrocinio');
    Route::post('/system/baner','System\HomeController@baner')->name('home.baner');
    Route::post('/system/h-delete/{id}','System\HomeController@deletePatrocinio')->name('home.delete');
    Route::post('/system/noticias','System\HomeController@noticias')->name('home.noticias');
    Route::post('/system/noticias-d/{id}','System\HomeController@deleteNoticia')->name('home.noticias.delete');

//-------------------------------------------- CURSO CONTROLLER --------------------------------------------------------------

    Route::resource('/system/curso','System\CursosController');
    Route::get('/system/cursoex/{id}','System\CursosController@delete')->name('cursoex.delete');
    Route::match(['get','post'],'/system/curso-ctd/{id}','System\CursosController@addConteudo')->name('cursoctd.conteudo');
    Route::match(['get','post'],'/system/curso-ex/{id}','System\CursosController@update')->name('cursoex.update');
    Route::get('/system/conteudo/{id}/{id2}','System\CursosController@deleteConteudo')->name('conteudo.delete');
    Route::get('/system/curso-ative/{id}','System\CursosController@ative')->name('curso.ative');
    Route::get('/system/curso-desative/{id}','System\CursosController@desative')->name('curso.desative');

//-------------------------------------------- EVENTO CONTROLLER --------------------------------------------------------------

    Route::resource('/system/evento','System\EventoController');
    Route::get('/system/eventoex/{id}','System\EventoController@delete')->name('eventoex.delete');
    Route::match(['get','post'],'/system/eventoat/{id}','System\EventoController@ativa')->name('eventoat.ativa');
    Route::resource('/system/evento-atividade','System\AtividadeController');
    Route::get('/system/evento-atividade/{id}/{id2}','System\AtividadeController@delete')->name('evento-atividade.delete');

//-------------------------------------------- ADMIN CONTROLLER -------------------------------------------------------------

    Route::resource('/system/admin','System\AdminController');
    Route::match(['get','post'],'/system/admin-perfil/{id}','System\AdminController@update')->name('perfil.update');

//    Route::resource('/system/home','System\HomeController');
});






