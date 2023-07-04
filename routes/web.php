<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserController as ControllersUserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//__Front end__//
Route::get('/',[ControllersProductController::class, 'index']);
Route::get('shop',[ControllersProductController::class, 'shop']);
Route::get('shop_sorting',[ControllersProductController::class, 'shop_sorting']);
Route::get('shop_details/{id}',[ControllersProductController::class, 'shop_details']);
Route::get('home_category/{id}',[ControllersProductController::class, 'home_category']);
Route::get('search',[ControllersProductController::class, 'search']);
Route::get('category/{id}',[ControllersProductController::class, 'category']);
Route::view('contact', 'contact');

Route::get('/auth/{provider}/redirect',[ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback',[ProviderController::class, 'callback']);

Route::middleware('auth')->group(function () {
   //__Cart__//
   Route::post('store_cart', [CartController::class, 'store_cart']);
   Route::get('cart',[CartController::class, 'index']);
   Route::post('update_cart/{id}',[CartController::class, 'update_cart']);
   Route::get('delete_cart/{id}',[CartController::class, 'delete_cart']);
   //__Order__//
   Route::post('place_order', [OrderController::class, 'place_order']);
   Route::get('checkout', [OrderController::class, 'checkout']);
   Route::view('thank_you', 'thank_you');
   Route::get('order', [OrderController::class, 'order']);
   Route::get('order_details/{id}', [OrderController::class, 'order_details']);
   Route::get('download_invoice/{id}', [OrderController::class, 'download_invoice']);
   Route::post('review',[ControllersProductController::class, 'review']);
   Route::get('profile', [ControllersUserController::class, 'profile']);
   Route::post('update_profile', [ControllersUserController::class, 'update']);

   

});



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



//__Admin__//
Route::middleware('auth')->group(function () {
Route::prefix('admin')->middleware('authAdmin')->group(function () {
    Route::view('/dashboard','admin.dashboard');
    //__Category__//
    Route::get('/all_category',[CategoryController::class, 'index']);
    Route::get('/add_category',[CategoryController::class, 'create']);
    Route::post('/store_category',[CategoryController::class, 'store']);
    Route::get('/edit_category/{id}',[CategoryController::class, 'edit']);
    Route::get('/view_category/{id}',[CategoryController::class, 'view']);
    Route::post('/update_category/{id}',[CategoryController::class, 'update']);
    Route::get('/delete_category/{id}',[CategoryController::class, 'destroy']);
    Route::get('/active_category/{id}',[CategoryController::class, 'active']);
    Route::get('/inactive_category/{id}',[CategoryController::class, 'inactive']);
    //__Product__//
    Route::get('/all_product',[ProductController::class, 'index']);
    Route::get('/add_product',[ProductController::class, 'create']);
    Route::post('/store_product',[ProductController::class, 'store']);
    Route::get('/edit_product/{id}',[ProductController::class, 'edit']);
    Route::post('/update_product/{id}',[ProductController::class, 'update']);
    Route::get('/delete_product/{id}',[ProductController::class, 'destroy']);
    Route::get('/active_product/{id}',[ProductController::class, 'active']);
    Route::get('/inactive_product/{id}',[ProductController::class, 'inactive']);
    //__Order__/
    Route::get('/order', [AdminOrderController::class, 'order']);
    Route::get('/order_details/{id}', [AdminOrderController::class, 'order_details']);
    Route::get('/pending_order/{id}', [AdminOrderController::class, 'pending_order']);
    Route::get('/completed_order/{id}', [AdminOrderController::class, 'completed_order']);
    Route::get('/delete_order/{id}', [AdminOrderController::class, 'delete_order']);
    //__Users__//
    Route::get('users', [UserController::class, 'index']);
    Route::post('add_user', [UserController::class, 'add_user']);
    Route::get('update_user/{id}', [UserController::class, 'edit_user']);

});
});