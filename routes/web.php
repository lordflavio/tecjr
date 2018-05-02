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

Route::get('/', 'ControllerOut@welcome')->name('welcome');

Route::get('/pdf', 'System\CertificationController@test')->name('pdf');

//Route::get('/email', function (){
//    return view('teste');
//});

Route::get('/portifolio', 'ControllerOut@portifolio')->name('portifolio');
//Route::get('/noticias', 'ControllerOut@noticias')->name('noticias');
Route::get('/contato', 'ControllerOut@contato')->name('contato');
Route::get('/cursos-e-eventos', 'ControllerOut@cursosEventos')->name('cursoEvento');
Route::get('/curso/{curso}', 'ControllerOut@curso')->name('curso');
Route::get('/eventos/{evento}', 'ControllerOut@evento')->name('evento');
Route::post('/contato-up', 'ControllerOut@envio')->name('up.envio');


Route::group(['middleware' => ['auth']], function() {
  Route::get('/perfil-user', 'ParticipanteController@index')->name('perfil-user'); 
  Route::match(['get','post'],'/perfil-user-update/{id}','ParticipanteController@updates')->name('perfil-user.update');
    Route::post('atualizar-senha', 'ParticipanteController@passwordUpdate')->name('password.update');
    Route::get('/perfil-user/cursos', 'ParticipanteController@curso')->name('perfil-user-cursos');
    Route::get('/perfil-user/eventos', 'ParticipanteController@evento')->name('perfil-user-eventos');

    Route::get('/perfil-user/eventos-atividades/{busca}', 'ParticipanteController@eventoAtividades')->name('perfil-user-evento-atividades');
    Route::get('/perfil-user/eventos-minhas-atividades/{id}', 'ParticipanteController@eventoParticipanteAtividades')->name('perfil-user-evento-minhas-atividades');

    Route::get('/perfil-user/eventos-minhas-atividades/{id}/{id2}', 'ParticipanteController@ativitadeIns')->name('perfil-user-evento-atividade-ins');
    Route::get('/perfil-user/eventos-minhas-atividades-remover/{id}', 'ParticipanteController@eventoRemoverAtiidade')->name('perfil-user-evento-atividade-remove');


    Route::match(['get','post'],'/curso-tipo-pagamento/{busca}', 'ParticipanteController@tipoCurso')->name('curso-tipo-pg');
    Route::match(['get','post'],'/curso-pagamento/{tipo}/{busca}', 'ParticipanteController@pagamentoCurso')->name('curso-pagamento');

    Route::match(['get','post'],'/evento-tipo-pagamento/{busca}', 'ParticipanteController@tipoEvento')->name('evento-tipo-pg');
    Route::match(['get','post'],'/evento-pagamento/{tipo}/{busca}', 'ParticipanteController@pagamentoEvento')->name('evento-pagamento');

    Route::get('/perfil-user/certificado-curso/{busca}', 'System\CertificationController@certificadoCurso')->name('perfil-user-certificado-curso');
    Route::get('/perfil-user/certificado-atividade/{busca}/{id}', 'System\CertificationController@certificadoAtividade')->name('perfil-user-certificado-atividade');

    Route::post('/perfil-user/mudar-imagem/', 'ParticipanteController@mudarImagem')->name('perfil-user-mudar-imagem');


    $this->post('pagseguro-getcode', 'PagSeguroController@getCode')->name('pagseguro.code.transparent');
    $this->post('pagseguro-payment-billet', 'PagSeguroController@billet')->name('pagseguro.billet');
    $this->post('pagseguro-payment-card', 'PagSeguroController@paymentCard')->name('pagseguro.card');
  

});

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();



Route::group(['middleware' => ['role:administrator'],['auth']], function() {

//-------------------------------------------- HOME CONTROLLER --------------------------------------------------------------

    Route::resource('/system/home','System\HomeController');
    Route::post('/system/patrocinio','System\HomeController@patrocinio')->name('home.patrocinio');
    Route::post('/system/baner','System\HomeController@baner')->name('home.baner');
    Route::post('/system/h-delete/{id}','System\HomeController@deletePatrocinio')->name('home.delete');
    Route::post('/system/noticias','System\HomeController@noticias')->name('home.noticias');
    Route::post('/system/noticias-d/{id}','System\HomeController@deleteNoticia')->name('home.noticias.delete');
    Route::post('/system/folder/','System\HomeController@folder')->name('home.folder');

    Route::get('/system/atividade-lista/{id}','System\CertificationController@lista')->name('home.lista');

    Route::get('/system/transacoes/','System\HomeController@trasacoes')->name('home.transacoes');

    Route::post('/system/transacoes-periodo/','System\HomeController@trasacoesperiodo')->name('home.transacoes-periodo');

    Route::post('/system/transacoes/','System\HomeController@trasacoes2')->name('home.transacoes2');



//-------------------------------------------- CURSO CONTROLLER --------------------------------------------------------------

    Route::resource('/system/curso','System\CursosController');
    Route::get('/system/cursoex/{id}','System\CursosController@delete')->name('cursoex.delete');
    Route::match(['get','post'],'/system/curso-add-participante/{id}','System\CursosController@addParticipante')->name('curso-add');

    Route::match(['get','post'],'/system/add-part/{id}/{idP}','System\CursosController@adicionar')->name('curso-adicionar');

    Route::match(['get','post'],'/system/curso-ctd/{id}','System\CursosController@addConteudo')->name('cursoctd.conteudo');
    Route::match(['get','post'],'/system/curso-ex/{id}','System\CursosController@update')->name('cursoex.update');
    Route::get('/system/conteudo/{id}/{id2}','System\CursosController@deleteConteudo')->name('conteudo.delete');
    Route::get('/system/curso-ative/{id}','System\CursosController@ative')->name('curso.ative');
    Route::get('/system/curso-desative/{id}','System\CursosController@desative')->name('curso.desative');

    Route::post('/system/curso-certificar/{id}/{id2}','System\CursosController@certificar')->name('curso.certificar');
    Route::get('/system/curso-excluir-participante/{id}/{id2}','System\CursosController@remove')->name('excluir');

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

    Route::post('/system/evento-certificar/{id}/{id2}','System\EventoController@certificar')->name('evento.certificar');
    Route::get('/system/evento-participantes-atividades/{id}/{id2}','System\EventoController@partAtividade')->name('evento.part-atividades');
    Route::get('/system/evento-participantes-atividades-remove/{id}/{id2}','System\EventoController@remove')->name('evento.remove');

    Route::match(['get','post'],'/system/evento-add-participante/{id}','System\EventoController@addParticipante')->name('evento-add');
    Route::match(['get','post'],'/system/evento-add-part/{id}/{idP}','System\EventoController@adicionar')->name('evento-adicionar');



//-------------------------------------------- ADMIN CONTROLLER -------------------------------------------------------------

    Route::resource('/system/admin','System\AdminController');
    Route::match(['get','post'],'/system/admin-perfil/{id}','System\AdminController@update')->name('perfil.update');
    Route::post('atualizar-senha-admin', 'System\AdminController@passwordUpdate')->name('password.update-admin');


//    Route::resource('/system/home','System\HomeController');
});

