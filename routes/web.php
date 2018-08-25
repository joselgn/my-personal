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

//Auth Own - Autentica login de usuario
Route::post('/login','LoginownController@entrar');

//Register New - Registro de Usuario
Route::post('/novo-cadastro','LoginController@novo');
