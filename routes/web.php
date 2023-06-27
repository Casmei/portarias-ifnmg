<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\PortariaController;
use App\Http\Controllers\ServidorController;


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

//TODO: Listar todas as portarias de um determinado servidor
//TODO: Exibir informações básicas de determinada portaria

/*
|--------------------------------------------------------------------------
| SERVIDORES
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//TODO: Exibir dados do servidor em formato de dashboard
//TODO: Fazer download de um relátorio do servidor
//TODO: Listagem de todas as portarias que o servidor faz parte (públicas ou privadas)
//TODO: Visualização completa dos dados de uma portaria
//TODO: Fazer download do pdf de uma portaria

/*
|--------------------------------------------------------------------------
| GESTORES
|--------------------------------------------------------------------------
*/
Route::get('/portarias', [PortariaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('portarias');

//TODO: Adicionar portaria por meio de um formuário

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('servidores')->group(function () {
        Route::get('/', [ServidorController::class, 'index'])->name('servidores');
        Route::get('/buscar',[ServidorController::class,'searchName'])->name('servidores.search');

        Route::get('/adicionar', [ServidorController::class, 'create'])->name('servidores.create');
        Route::post('/adicionar', [ServidorController::class, 'store'])->name('servidores.store');

        Route::get('/upload', [ServidorController::class, 'renderUpload'])->name('servidores.upload');
        Route::post('/upload', [ServidorController::class, 'uploadServer'])->name('servidores.upload');

        Route::get('/{id}/editar', [ServidorController::class, 'edit'])->name('servidores.edit');
        Route::put('/{id}', [ServidorController::class, 'update'])->name('servidores.update');

        Route::delete('/{id}', [ServidorController::class, 'destroy'])->name('servidores.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| ADMINISTRADORES
|--------------------------------------------------------------------------
*/
Route::get('/gestores', [GestorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('gestores');

//TODO: Listar todos os gestores cadastrados no sistema
//TODO: Salvar novos gestores por meio de um formulário


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
