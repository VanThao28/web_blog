<?php

use Illuminate\Support\Facades\Route;
/* Admin*/
use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\Admin\AdminPost;
/*end Admin*/
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

/*Admin*/

Route::name('admin')->prefix('admin')->middleware(['auth'])->group(function (){
    //show user
    Route::get('/index', [AdminUsers::class, 'index'])->name('.index');

    //create user
    Route::post('/StoreUser', [AdminUsers::class, 'store'])->name('.StoreUser');
    Route::get('/CreateUser', [AdminUsers::class, 'create'])->name('.CreateUser');

    //edit user
    Route::post('/update/{user}', [AdminUsers::class,'update'])->name('.UpdateUser');
    Route::get('/users/{id}/edit', [AdminUsers::class, 'edit'])->name('.EditUser');

    //delete user
    Route::delete('delete_user/{id}', [AdminUsers::class, 'destroy'])->name('.DeleteUser');

    //seach user
    Route::post('/search', [AdminUsers::class, 'search'])->name('.SearchUser');

    //end user
    //
    //show post
    Route::get('/post/index', [AdminPost::class, 'index'])->name('.postIndex');

    //create post
    Route::post('/StorePost', [AdminPost::class, 'store'])->name('.StorePost');
    Route::get('/CreatePost', [AdminPost::class, 'create'])->name('.CreatePost');

    //edit post
    Route::post('updatePost/{post}', [AdminPost::class, 'update'])->name('.UpdatePost');
    Route::get('/post/{id}/edit', [AdminPost::class, 'edit'])->name('.EditPost');

    //delete post
    Route::delete('delete_post/{id}', [AdminPost::class, 'destroy'])->name('.DeletePost');

    //seach post
    Route::post('/search_post',[AdminPost::class, 'search'])->name('.searchPost');
});
require __DIR__.'/auth.php';

/*clinet*/
Route::get('/Clinet', function (){
    return view('clinet.index');
})->name('index.clinet');

Route::get('/About', function () {
   return view('clinet.about');
})->name('about');

Route::get('/Blog', function () {
    return view('clinet.blog');
})->name('clinet.blog');

Route::get('/Contact', function () {
    return view('clinet.contact');
})->name('clinet.contact');

Route::get('/Details', function () {
    return view('clinet.details');
})->name('clinet.detail');

Route::get('/Single_blog', function () {
    return view('clinet.single_blog');
})->name('clinet.single_blog');

Route::get('/Categori', function () {
    return view('clinet.categori');
})->name('clinet.categori');
