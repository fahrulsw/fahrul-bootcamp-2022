<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[AuthController::class, 'getLogin']);
Route::post('/login',[AuthController::class, 'postLogin']);
Route::get('/logout',[AuthController::class, 'postLogout']);

Route::middleware(['middleware' => 'front'])->group(function()
{
    Route::get('/',[FrontController::class, 'getIndex']);
    Route::get('/product/{id}',[ProductController::class, 'getDetail']);
    Route::get('/cart',[CartController::class, 'getIndex']);
    Route::get('/cart/add',[CartController::class, 'getAdd']);
    Route::get('/cart/delete/{id}',[CartController::class, 'getDelete']);
    Route::post('/cart/checkout',[CartController::class, 'postCheckout']);
});

Route::get('admin/login',[LoginController::class,"getIndex"])->name("login");
Route::post('admin/login',[LoginController::class,"postLogin"])->name("loginFunction");
Route::get('admin/logout',[LoginController::class,"getLogout"])->name("logoutFunction");

Route::group(['prefix' => 'admin', 'middleware' => ['admin.login']], function(){
    Route::get('',[AdminController::class,"getIndex"])->name("admin");

    // controller product
    Route::get('products',[ProductsController::class,"getIndex"])->name("adminProducts");
    Route::get('products/add',[ProductsController::class,"getAdd"])->name("adminAddProducts");
    Route::post('products/add',[ProductsController::class,"postAddSave"])->name("adminAddSaveProducts");
    Route::get('products/edit/{id}',[ProductsController::class,"getEdit"])->name("adminProductsEdit");
    Route::post('products/edit/{id}',[ProductsController::class,"postEditSave"])->name("adminProductsEditSave");
    Route::get('products/detail/{id}',[ProductsController::class,"getDetail"])->name("adminProductsDetail");
    Route::get('products/delete/{id}',[ProductsController::class,"getDetele"])->name("adminProductsDelete");

    // controller orders
    Route::get('orders',[OrdersController::class,"getIndex"])->name("adminOrders");
    Route::get('orders/detail/{id}',[OrdersController::class,"getDetail"])->name("adminOrdersDetail");
    Route::get('orders/delete/{id}',[OrdersController::class,"getDelete"])->name("adminOrdersDelete");

    // controller customer
    Route::get('customers',[CustomersController::class,"getIndex"])->name("adminCustomers");
    Route::get('customers/add',[CustomersController::class,"getAdd"])->name("adminAddCustomers");
    Route::post('customers/add',[CustomersController::class,"postAddSave"])->name("adminAddSaveCustomers");
    Route::get('customers/edit/{id}',[CustomersController::class,"getEdit"])->name("adminCustomersEdit");
    Route::post('customers/edit/{id}',[CustomersController::class,"postEditSave"])->name("adminCustomersEditSave");
    Route::get('customers/detail/{id}',[CustomersController::class,"getDetail"])->name("adminCustomersDetail");
    Route::get('customers/delete/{id}',[CustomersController::class,"getDetele"])->name("adminCustomersDelete");
});