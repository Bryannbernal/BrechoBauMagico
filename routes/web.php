<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaInicialController;
use App\Http\Controllers\RoupaController;
use App\Http\Controllers\LoginController;

// Funcao para procurar por nome:
// Route::get('/listar', [PaginaInicialController::class, 'buscar']);

//FUNÇÕES DE REDIRECIONAMENTO

Route::get('/', [PaginaInicialController::class, 'index']);
Route::get('/home', [PaginaInicialController::class, 'index']);
Route::get('/contato', [PaginaInicialController::class, 'contato']);
Route::get('/catalogo', [PaginaInicialController::class, 'catalogo']);
Route::get('/usuario/login', [LoginController::class, 'index'])->name('login');
//Route::get('/usuario/cadastrar', [LoginController::class, 'cadastrar']);

Route::middleware(['auth'])->group(function () {
    Route::get('/roupas', [RoupaController::class, 'index']);
    Route::get('/roupa/novo', [RoupaController::class, 'create']);
    Route::get('/roupa/editar/{id}', [RoupaController::class, 'edit']);
    Route::post('/roupa/salvar', [RoupaController::class, 'store']);
    Route::delete('/roupa/excluir', [RoupaController::class, 'destroy']);
    Route::put('roupa/alterar', [RoupaController::class, 'update']);
});

Route::post('/login', [LoginController::class, 'autenticar']);
Route::get('/sair', [LoginController::class, 'sair']);
//Route::post('/cadastro', [LoginController::class, 'cadastrar']);

//ROTA TEMPORARIA

Route::get('/teste-cloudinary', function () {
    return [
        app_path('Services/CloudinaryService.php'),
        file_exists(app_path('Services/CloudinaryService.php')),
    ];
});
