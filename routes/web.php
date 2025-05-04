<?php

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

Route::view('/', 'welcome')->name('home');

//contact
Route::view('contacto', 'contact')->name('contact');
//about
//Route::view('nosotros', 'about')->name('about');

Route::get('/productos/{slug}', \App\Livewire\ProductShow::class)->name('products.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    //routs for the admin panel clear cache
    Route::get('/admin/clear-cache', function () {
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        return 'Cache cleared';
    })->name('admin.clear-cache');

    //crear store link
    Route::get('/admin/create-store-link', function () {
        $store = \App\Models\Store::find(1);
        $store->createStoreLink();
        return 'Store link created';
    })->name('admin.create-store-link');

require __DIR__.'/auth.php';
