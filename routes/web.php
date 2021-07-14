<?php

use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductInShoppingCartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\ShoppingCart;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('productos', ProductsController::class);

Route::resource('in_shopping_carts', ProductInShoppingCartController::class, [
    'only' => ['store', 'destroy'],
]);

Route::get('/carrito', [ShoppingCartController::class, 'show'])->name('shopping_cart.show');
Route::get('/carrito/productos', [ShoppingCartController::class, 'products'])->name('shopping_cart.products');

Route::get('/pagar', [PaymentsController::class, 'pay'])->name('payments.pay');
Route::get('/pagar/completar', [PaymentsController::class, 'execute'])->name('payments.execute');