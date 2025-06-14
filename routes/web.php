<?php

use Illuminate\Support\Facades\Route;

// Assinatura base de uma rota
// Route::verb('uri', callback); - O callbaback é a ação que vai ser executada quando a rota for acessada

// Rota com função anônima
Route::get('/rota', function () {
  return '<h1>Olá Laravel!</h1>';
});
