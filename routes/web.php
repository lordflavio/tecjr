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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portifolio', 'ControllerOut@portifolio')->name('portifolio');
Route::get('/noticias', 'ControllerOut@noticias')->name('noticias');
Route::get('/contato', 'ControllerOut@contato')->name('contato');
Route::get('/cursos-e-eventos', 'ControllerOut@cursosEventos')->name('cursoEvento');
Route::get('/curso', 'ControllerOut@curso')->name('curso');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['role:administrator'],['auth']], function() {
    Route::resource('/system/home','System\HomeController');
    Route::resource('/system/curso','System\CursosController');
    Route::get('/system/cursoex/{id}','System\CursosController@delete')->name('cursoex.delete');
    Route::resource('/system/evento','System\EventoController');
    Route::get('/system/eventoex/{id}','System\EventoController@delete')->name('eventoex.delete');
    Route::match(['get','post'],'/system/eventoat/{id}','System\EventoController@ativa')->name('eventoat.ativa');
    Route::resource('/system/evento-atividade','System\AtividadeController');
    Route::get('/system/evento-atividade/{id}/{id2}','System\AtividadeController@delete')->name('evento-atividade.delete');
    Route::resource('/system/admin','System\AdminController');
    Route::match(['get','post'],'/system/admin-perfil/{id}','System\AdminController@update')->name('perfil.update');
//    Route::resource('/system/home','System\HomeController');
});






