<?php
/****************************************************/
/********** TELAS DO SISTEMA ************************/

//Inicial - home
Route::get('/','IndexController@index');

//Login - Autenticaçao
Route::get('/login/{erro?}','IndexController@login')->where('erro', '[0-2]')->name('login');

//Novo cadastro - Registro de Usuario
Route::get('/novo-cadastro/{erro?}','IndexController@novoCadastro')->where('erro', '[0,1]');


/****************************************************/
/********* FUNÇOES DO SISTEMA ***********************/

//Register New - Registro de novo Usuario
Route::post('/novo-cadastro','IndexController@novo');

//Auth Own - Autentica login de usuario
Route::post('/login','LoginController@entrar');

//Auth Logout
Route::post('/logout','LoginController@logout');
//Auth Logout
Route::get('/painel','admin\PainelController@index');

/****************************************************/
/********* ACESSO SOMENTE COM AUTENTICAÇAO ***********************/
//Tudo que compor a rota com o prefixo eh autenticado
Route::group(['prefix' => 'painel'], function() {
    Auth::routes();//Autentica as rotas que contem esse perfixo
    //Route::auth();
});

//Panel Administrator
Route::group(['middleware' => 'auth'], function(){
    $this->get('/painel','admin\PainelController@index');
});//AUTH routes
