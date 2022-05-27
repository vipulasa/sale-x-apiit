<?php

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

Auth::routes();

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::resource('users', App\Http\Controllers\UserController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('manufacturers', App\Http\Controllers\ManufacturerController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('vehicle-models', App\Http\Controllers\VehicleModelController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('vehicle-addons', App\Http\Controllers\VehicleAddonController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('vehicles', App\Http\Controllers\ProductController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::get('vehicle/{id}', [
    App\Http\Controllers\ProductController::class, 'show'
])->name('vehicle.show');

Route::resource('spareparts', App\Http\Controllers\SparepartController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('promotions', App\Http\Controllers\PromotionController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('stores', App\Http\Controllers\StoreController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('delivery-methods', App\Http\Controllers\DeliveryMethodController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('orders', App\Http\Controllers\OrderController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::get('/cart/{cart}/checkout', [App\Http\Controllers\CartController::class, 'checkout'])
    ->middleware([
        'auth'
    ])
    ->name('cart.checkout');

Route::post('/cart/{cart}/{order}/update', [App\Http\Controllers\CartController::class, 'updateOrder'])
    ->middleware([
        'auth'
    ])
    ->name('cart.order.update');

Route::post('/cart/{cart}/{order}/thank-you', [App\Http\Controllers\CartController::class, 'completeCheckout'])
    ->middleware([
        'auth'
    ])
    ->name('cart.thank-you');

Route::resource('cart', App\Http\Controllers\CartController::class)
    ->middleware([
        'auth'
    ]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
