<?php

use Illuminate\Support\Facades\Route;
/* Admin*/
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Clinet\CommentPost;

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
        Route::get('/index', [AdminUserController::class, 'index'])->name('.index');

        //create user
        Route::post('/StoreUser', [AdminUserController::class, 'store'])->name('.StoreUser');

        //edit user
        Route::post('/UserUpdate', [AdminUserController::class,'update'])->name('.UpdateUser');
        Route::post('/UsersEdit', [AdminUserController::class, 'edit'])->name('.EditUser');

        //delete user
        Route::post('/UserDelete', [AdminUserController::class, 'destroy'])->name('.DeleteUser');

        //seach user
        Route::post('/search', [AdminUserController::class, 'search'])->name('.SearchUser');

    //end user
    //
    //show post
        Route::get('/post/index', [AdminPostController::class, 'index'])->name('.postIndex');

        //create post
        Route::post('/StorePost', [AdminPostController::class, 'store'])->name('.StorePost');


        //edit post
        Route::post('/PostUpdate', [AdminPostController::class, 'update'])->name('.UpdatePost');
        Route::post('/PostEdit', [AdminPostController::class, 'edit'])->name('.EditPost');

        //delete post
        Route::post('delete_post', [AdminPostController::class, 'destroy'])->name('.DeletePost');

        //seach post
        Route::post('/search_post',[AdminPostController::class, 'search'])->name('.searchPost');

        Route::get('clinet/single_blog/{id}', [BlogClinetController::class, 'blogDetail'])->name('clinet.single_blog');



        //comment post
        Route::post('/comment/store', [CommentPost::class, 'CommentStore'])->name('.CreateComment');
        Route::post('/commentId', [CommentPost::class,'CommentId'])->name('.CommentId');
        Route::post('/commentCreate',[CommentPost::class, 'CommentCreate'])->name('.CommentCreateReply');
        Route::post('/DelComment',[CommentPost::class, 'DelComment'])->name('.DeleteComment');
    //end post
});
require __DIR__.'/auth.php';

/*clinet*/
    Route::get('/clinet/index', [IndexClinetController::class, 'index'])->name('index.clinet');

    Route::get('/details/{id}', [DetailClinetController::class, 'detail'])->name('clinet.detail');

    Route::get('/clinet/blog', [BlogClinetController::class, 'blog'])->name('clinet.blog');

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
