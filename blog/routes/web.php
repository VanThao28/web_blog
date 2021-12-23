<?php

use Illuminate\Support\Facades\Route;
/* Admin*/
use App\Http\Controllers\Admin\AdminUsersControler;
use App\Http\Controllers\Admin\AdminPostController;
/*end Admin*/

/* Clinet*/
use App\Http\Controllers\Clinet\IndexClinetController;
use App\Http\Controllers\Clinet\DetailClinetController;
use App\Http\Controllers\Clinet\BlogClinetController;
/*end clinet*/
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
        Route::get('/index', [AdminUsersControler::class, 'index'])->name('.index');

        //create user
        Route::post('/StoreUser', [AdminUsersControler::class, 'store'])->name('.StoreUser');
        Route::get('/CreateUser', [AdminUsersControler::class, 'create'])->name('.CreateUser');

        //edit user
        Route::post('/update/{user}', [AdminUsersControler::class,'update'])->name('.UpdateUser');
        Route::get('/users/{id}/edit', [AdminUsersControler::class, 'edit'])->name('.EditUser');

        //delete user
        Route::delete('delete_user/{id}', [AdminUsersControler::class, 'destroy'])->name('.DeleteUser');

        //seach user
        Route::post('/search', [AdminUsersControler::class, 'search'])->name('.SearchUser');

    //end user
    //
    //show post
        Route::get('/post/index', [AdminPostController::class, 'index'])->name('.postIndex');

        //create post
        Route::post('/StorePost', [AdminPostController::class, 'store'])->name('.StorePost');

        //show post
        //Route::get('/ShowPost/{id}', [AdminPost::class, 'show'])->name('.ShowPost');

        //edit post
        Route::post('/postSession',[AdminPostController::class, 'postSession'])->name('.SavePost');

        Route::post('updatePost/{post}', [AdminPostController::class, 'update'])->name('.UpdatePost');
        Route::post('/post/{id}/edit', [AdminPostController::class, 'edit'])->name('.EditPost');


        //delete post
        Route::delete('delete_post/{id}', [AdminPostController::class, 'destroy'])->name('.DeletePost');

        //seach post
        Route::post('/search_post',[AdminPostController::class, 'search'])->name('.searchPost');
    //end post
});
require __DIR__.'/auth.php';

/*clinet*/
    Route::get('/clinet/index', [IndexClinetController::class, 'index'])->name('index.clinet');

    Route::get('/details/{id}', [DetailClinetController::class, 'detail'])->name('clinet.detail');

    Route::get('/clinet/blog', [BlogClinetController::class, 'blog'])->name('clinet.blog');

    Route::get('clinet/single_blog/{id}', [BlogClinetController::class, 'blogDetail'])->name('clinet.single_blog');
/*end clinet*/

Route::get('/About', function () {
   return view('clinet.about');
})->name('about');


Route::get('/Contact', function () {
    return view('clinet.contact');
})->name('clinet.contact');


Route::get('/Categori', function () {
    return view('clinet.categori');
})->name('clinet.categori');
