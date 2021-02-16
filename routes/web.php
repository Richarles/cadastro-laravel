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

Route::get('/cadastro', 'Usuario@cadastrar')->name('home');
Route::post('/salvar', 'Usuario@salvar')->name('salvar');
Route::get('/editar/{id}','Usuario@editar')->name('editar');
Route::POST('/alterar/{id}','Usuario@alterar')->name('alterar');
Route::delete('/excluir/{id}','Usuario@excluir')->name('excluir');
Route::any('/lista', 'Usuario@lista')->name('listar');
//Route::any('/busca', 'Usuario@busca')->name('buscar');

    //return view('usuario');

