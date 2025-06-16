<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
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
// ROUTE PARAMETERS WITH CONSTRAINTS
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

// -----------------------------------------
// ROUTE NAMES
// -----------------------------------------

Route::get('/rota-nomeada', function () {
  return 'Rota nomeada';
})->name('rota_nomeada');

Route::get('/rota_referenciada', function () {
  return redirect()->route('rota_nomeada');
});

Route::prefix('admin')->group(function () {
  Route::get('/home', [MainController::class, 'index']);
  Route::get('/about', [MainController::class, 'about']);
  Route::get('/management', [MainController::class, 'monstrarValor']);
});

Route::get('/admin/only', function () {
  return 'Apenas administradores';
})->middleware([OnlyAdmin::class]); // Middleware personalizado

Route::middleware([OnlyAdmin::class])->group(function () {
  Route::get('/admin/only2', function () {
    return 'Rota de administração 1';
  });
  Route::get('/admin/only3', function () {
    return 'Rota de administração 2';
  });
});

//Route::get('/user/new', [UserController::class, 'new']);
//Route::get('/user/edit', [UserController::class, 'edit']);
//Route::get('/user/delete', [UserController::class, 'delete']);

Route::controller(UserController::class)->group(function () {
  Route::get('/user/new', 'new');
  Route::get('/user/edit', 'edit');
  Route::get('/user/delete', 'delete');
});

Route::fallback(function () {
  return 'Rota não encontrada';
});
