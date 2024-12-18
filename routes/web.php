<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\OrdinanceController;
use App\Http\Controllers\ServidorController;
use App\Http\Controllers\MemberOrdinanceController;


use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
Route::get('/', [MemberOrdinanceController::class, 'index'])->name('welcome');
Route::post('/buscar', [MemberOrdinanceController::class, 'searchName'])->name('welcome.search');
Route::get('/{id}/listar-portarias-servidor', [MemberOrdinanceController::class, 'listOrdinance'])->name('servidor.listOrdinance');

//TODO: Listar todas as portarias de um determinado servidor
//TODO: Exibir informações básicas de determinada portaria
/*
|--------------------------------------------------------------------------
| PORTARIAS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('portarias')->group(function () {
        Route::get('/', [OrdinanceController::class, 'index'])->name('ordinance');
        Route::get('/buscar',[OrdinanceController::class,'searchName'])->name('portarias.search');
        Route::get('/{id}/detalhes', [OrdinanceController::class, 'details'])->name('ordinance.details');

        Route::get('/adicionar', [OrdinanceController::class, 'create'])->name('ordinance.create');
        Route::post('/adicionar', [OrdinanceController::class, 'store'])->name('ordinance.store');

        Route::get('/{id}/editar', [OrdinanceController::class, 'edit'])->name('ordinance.edit');
        Route::put('/{id}', [OrdinanceController::class, 'update'])->name('ordinance.update');

        Route::get('/{id}/download', [OrdinanceController::class, 'download'])->name('ordinance.download');

    });
});

/*
|--------------------------------------------------------------------------
| SERVIDORES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('servidores')->group(function () {
        Route::get('/', [ServidorController::class, 'index'])->name('servidores');
        Route::post('/buscar',[ServidorController::class,'searchName'])->name('servidores.search');

        Route::get('/adicionar', [ServidorController::class, 'create'])->name('servidores.create');
        Route::post('/adicionar', [ServidorController::class, 'store'])->name('servidores.store');

        Route::any('/upload', [ServidorController::class, 'renderUpload'])->name('servidores.upload');
        Route::get('/{id}/detalhes', [ServidorController::class, 'details'])->name('servidores.details');


        Route::get('/{id}/editar', [ServidorController::class, 'edit'])->name('servidores.edit');
        Route::put('/{id}', [ServidorController::class, 'update'])->name('servidores.update');

        Route::get('/{id}/excluir', [ServidorController::class, 'delete'])->name('servidores.delete');
        Route::delete('/{id}', [ServidorController::class, 'destroy'])->name('servidores.destroy');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('gestores')->group(function () {
        Route::get('/', [GestorController::class, 'index'])->name('gestores');
        Route::get('/buscar',[GestorController::class,'searchName'])->name('gestores.search');

        Route::get('/adicionar', [GestorController::class, 'create'])->name('gestores.create');
        Route::post('/adicionar', [GestorController::class, 'store'])->name('gestores.store');

        Route::any('/upload', [GestorController::class, 'renderUpload'])->name('gestores.upload');
    

        Route::get('/{id}/editar', [GestorController::class, 'edit'])->name('gestores.edit');
        Route::put('/{id}', [GestorController::class, 'update'])->name('gestores.update');

        Route::get('/{id}/excluir', [GestorController::class, 'delete'])->name('gestores.delete');
        Route::delete('/{id}', [GestorController::class, 'destroy'])->name('gestores.destroy');
    });
});

Route::get('/dashboard', [ServidorController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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


//TODO: Adicionar portaria por meio de um formuário



/*
|--------------------------------------------------------------------------
| ADMINISTRADORES
|--------------------------------------------------------------------------
*/
Route::get('/gestores', [GestorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('gestores');
Route::any('/ranking',[MemberOrdinanceController::class,'ranking'])->name('ranking.portarias')->middleware(['auth', 'verified']);

//TODO: Listar todos os gestores cadastrados no sistema
//TODO: Salvar novos gestores por meio de um formulário


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';