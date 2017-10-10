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

Route::get('/', 'ControllerOut@welcome')->name('welcome');;

Route::get('/portifolio', 'ControllerOut@portifolio')->name('portifolio');
//Route::get('/noticias', 'ControllerOut@noticias')->name('noticias');
Route::get('/contato', 'ControllerOut@contato')->name('contato');
Route::get('/cursos-e-eventos', 'ControllerOut@cursosEventos')->name('cursoEvento');
Route::get('/curso/{curso}', 'ControllerOut@curso')->name('curso');
Route::get('/eventos/{evento}', 'ControllerOut@evento')->name('evento');
Route::match(['get','post'],'/contato-up', 'ControllerOut@envio')->name('up.envio');



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
    Route::post('/system/folder/','System\HomeController@folder')->name('home.folder');

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

    Route::resource('/system/evento-atividade','System\AtividadeController');
    Route::get('/system/evento-atividade/{id}/{id2}','System\AtividadeController@delete')->name('evento-atividade.delete');

    Route::match(['get','post'],'/system/evento-atividade-update/{id}','System\AtividadeController@update')->name('evento-atividade.update');


    Route::match(['get','post'],'/system/evento-update/{id}','System\EventoController@update')->name('evento.update');
    Route::match(['get','post'],'/system/evento-programacao/{id}','System\EventoController@programacao')->name('evento.programacao');
    Route::match(['get','post'],'/system/evento-banner/{id}','System\EventoController@banner')->name('evento.banner');

    Route::match(['get','post'],'/system/evento-submissao/{id}','System\EventoController@submissao')->name('evento.submissao');
    Route::match(['get','post'],'/system/evento-patrocinio/{id}','System\EventoController@patrocinio')->name('evento.patrocinio');
    Route::match(['get','post'],'/system/evento-palestrante/{id}','System\EventoController@palestrante')->name('evento.palestrante');

    Route::match(['get','post'],'/system/evento-palestrante-update/{id}/{id2}','System\EventoController@palestranteUpdate')->name('evento.palestrante.update');

    Route::match(['get','post'],'/system/evento-patrocinio-delete/{id}/{id2}','System\EventoController@patrocinioDelete')->name('evento.patrocinio-delete');

    Route::get('/system/evento-palestrante-delete/{id}/{id2}','System\EventoController@palestranteDelete')->name('evento.patrocinio-delete');

//-------------------------------------------- ADMIN CONTROLLER -------------------------------------------------------------

    Route::resource('/system/admin','System\AdminController');
    Route::match(['get','post'],'/system/admin-perfil/{id}','System\AdminController@update')->name('perfil.update');

//    Route::resource('/system/home','System\HomeController');
});






