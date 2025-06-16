<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Assinatura base de uma rota
// Route::verb('uri', callback); - O callbaback é a ação que vai ser executada quando a rota for acessada

// Rota com função anônima
Route::get('/rota', function () {
  return '<h1>Olá Laravel!</h1>';
});

Route::get('/index', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

Route::view('/view', 'home', ['myName' => 'Alessandro']);

// -----------------------------------------
// ROUTE PARAMETERS
// -----------------------------------------

Route::get('/valor/{value}', [MainController::class, 'mostrarValor']);
Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'mostrarPosts']);

// -----------------------------------------
// ROUTE PARAMETERS WITH CONSTRINTS
// -----------------------------------------

Route::get('/exp1/{value}', function ($value) {
  echo "O valor é: $value";
})->where('value', '[0-9]+'); // Aceita apenas números

Route::get('/exp2/{value}', function ($value) {
  echo "O valor é: $value";
})->where('value', '[a-zA-Z]+'); // Aceita apenas letras

Route::get('/exp3/{value1}/{value2}', function ($value) {
  echo "O valor é: $value";
})->where([
  'value1' => '[0-9]+',
  'value2' => '[a-zA-Z0-9]+'
]);
