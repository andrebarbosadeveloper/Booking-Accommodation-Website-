<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ReservaController;

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



require __DIR__.'/auth.php';

Route::get('/', [ProjectController::class, 'homepage']);

Route::get('/filtropesquisa', [CasaController::class, 'indexcasas']);
Route::post('/procura_reserva', [CasaController::class, 'procura_reserva']);
Route::post('/faz_reserva', [ReservaController::class, 'store']);

Route::get('/listacasas', [CasaController::class, 'index'])->name('listacasas');

Route::get('/casas/{id}', [CasaController::class, 'show'])->name("casas")->middleware(['auth']);
   
Route::get('/casaedit/{id}', [ProjectController::class, 'casaedit'])->middleware(['auth'])->name("casaedit");
Route::get('/apaga_comentario/{id}', [ComentariosController::class, 'apagaComentario'])->middleware(['auth']);
Route::get('/aprova_comentario/{id}',[ComentariosController::class, 'aprovaComentario'])->middleware(['auth']);
Route::get('/casanova', [ProjectController::class, 'casanova'])->middleware(['auth']);
Route::get('/apaga_casa/{id}', [CasaController::class, 'apagaCasa'])->middleware(['auth']);
Route::post('/casaedit', [CasaController::class, 'store'])->middleware(['auth']);
Route::post('/guardarcomentario', [ComentariosController::class, 'store'])->middleware(['auth']);

Route::get('/admin', [ProjectController::class, 'admin'])->middleware(['auth']);
Route::get('/editadmin', [ProjectController::class, 'editadmin'])->middleware(['auth']);

Route::get('/pagamento', [ProjectController::class, 'pagamento'])->name("pagamento");












