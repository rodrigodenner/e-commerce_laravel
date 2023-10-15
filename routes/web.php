<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;


Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/cart', [CarrinhoController::class, 'listCart'])->name('site.carrinho');
Route::post('/cart', [CarrinhoController::class, 'cartAdd'])->name('site.cartadd');
Route::post('/remove', [CarrinhoController::class, 'cartRemove'])->name('site.cartremove');
Route::post('/atualizar', [CarrinhoController::class, 'cartAtualiza'])->name('site.cartatualiza');
Route::get('/limpar', [CarrinhoController::class, 'limparCart'])->name('site.cartclear');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');







