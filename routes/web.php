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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', App\Http\Livewire\DashboardComponent::class)->name('dashboard');
    Route::get('/categories', App\Http\Livewire\CategoryComponent::class)->name('categories');
    Route::get('/articles', App\Http\Livewire\Articles\ArticlesComponent::class)->name('articles');
    Route::get('/articles/create/{slug?}', App\Http\Livewire\Articles\CreateUpdateArticleComponent::class)->name('articles.create');
    Route::get('/pharmacists/create/{pId?}', App\Http\Livewire\Pharmacists\CreateUpdatePharmacistsComponent::class)->name('pharmacists.create');
    Route::get('/pharmacists', App\Http\Livewire\Pharmacists\PharmacistsComponent::class)->name('pharmacists');

    Route::get('/products', App\Http\Livewire\ProductComponent::class)->name('products');
    Route::get('/product/create/{pId?}', App\Http\Livewire\CreateUpdateProductComponent::class)->name('products.create');
});
