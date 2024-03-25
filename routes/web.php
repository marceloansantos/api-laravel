<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*

Route::get('/hello', function () {
    return 'Seja Bem Vindo';
});


Route::post('/hello-post', 'HelloWorldController');

*/

Route::get('/bands', 'BandController@getAll'); // Corrigido para chamar o método getAll
Route::get('/bands/{id}', 'BandController@getBand'); // Corrigido para chamar o método getBand
Route::get('/bands/gender/{gender}', 'BandController@getBandsByGender'); // Corrigido para chamar o método getBandsByGender
Route::post('/bands/store', 'BandController@store'); 


