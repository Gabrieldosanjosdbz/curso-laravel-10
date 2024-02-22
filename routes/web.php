<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Site\SiteController;   //o use serve para eu puxar os namepace, como se fosse o include.
use Illuminate\Support\Facades\Route;

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::get('supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/contato', [SiteController::class, 'contact']); //como segundo parametro to passando a classe e a função que quero puxar dele 


Route::get('/', function () {       //o primeiro parametro é a rota na url, o segundo é a função que sera puxada nessa rota. Tem os verbos http como o get, post e etc    
    return view('welcome');         //ele ta retornando a view blade welcome, que esta dentro de resources 
});
