<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts as LiveWirePosts;
//use App\Http\Livewire\Contacts;

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
})->name('home');
//Route::get('/contacts', [Contacts::class, 'index']);

Route::get('/posts/',[PostsController::class, 'index'])->name('public_posts_index');
Route::get('/posts/{id}',[PostsController::class, 'show'])->name('public_posts_show');

Route::get('/pages/',[PagesController::class, 'index'])->name('public_pages_index');
Route::get('/pages/{id}',[PagesController::class, 'show'])->name('public_pages_show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('post', Posts::class)->name('post');

Route::middleware(['auth:sanctum', 'verified'])->get('posts_admin', LiveWirePosts::class)->name('posts');

