<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cadastrar-produto', [ProdutoController::class, 'v_cadastrar']);
Route::post('/cadastrar-produto', [ProdutoController::class, 'cadastrar']);
Route::get('/ver-produto', [ProdutoController::class, 'ver']);
Route::get('/deletar-produto/{id}', [ProdutoController::class, 'deletar']);
Route::get('/editar-produto/{id}', [ProdutoController::class, 'v_editar']);
Route::post('/editar-produto/{id}', [ProdutoController::class, 'editar']);
Route::get('/pesquisar-produto', [ProdutoController::class, 'pesquisar_produto'])->name('pesquisa');
