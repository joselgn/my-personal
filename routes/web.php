<?php
/****************************************************/
/********** TELAS DO SISTEMA ************************/

//Inicial - home
Route::get('/','IndexController@index');

//Login - Autenticaçao
Route::get('/meu-login/{erro?}','IndexController@login')->where('erro', '[0,1]');

//Novo cadastro - Registro de Usuario
Route::get('/novo-cadastro/{erro?}','IndexController@novoCadastro')->where('erro', '[0,1]');


/****************************************************/
/********* FUNÇOES DO SISTEMA ***********************/

//Register New - Registro de novo Usuario
Route::post('/novo-cadastro','IndexController@novo');

//Auth Own - Autentica login de usuario
Route::post('/login','LoginownController@entrar');



/****************************************************/
/********* ACESSO SOMENTE COM AUTENTICAÇAO ***********************/

//Panel Administrator
Route::group(['middleware' => 'auth'], function(){
    $this->get('/painel','PainelController@index');
});//AUTH routes
