<?php

use Illuminate\Support\Facades\Route;
/* Admin*/
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Clinet\CommentPost;
use App\Http\Controllers\Admin\ResetPassController;
/* Clinet*/
use App\Http\Controllers\Clinet\IndexClinetController;
use App\Http\Controllers\Clinet\DetailClinetController;
use App\Http\Controllers\Clinet\BlogClinetController;
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

        Route::get('/index', [AdminUserController::class, 'index'])->name('.index');
        Route::post('/StoreUser', [AdminUserController::class, 'store'])->name('.StoreUser');
        Route::post('/UserUpdate', [AdminUserController::class,'update'])->name('.UpdateUser');
        Route::post('/UsersEdit', [AdminUserController::class, 'edit'])->name('.EditUser');
        Route::post('/UserDelete', [AdminUserController::class, 'destroy'])->name('.DeleteUser');
        Route::post('/search', [AdminUserController::class, 'search'])->name('.SearchUser');

        Route::get('/post/index', [AdminPostController::class, 'index'])->name('.postIndex');
        Route::post('/StorePost', [AdminPostController::class, 'store'])->name('.StorePost');
        Route::post('/PostUpdate', [AdminPostController::class, 'update'])->name('.UpdatePost');
        Route::post('/PostEdit', [AdminPostController::class, 'edit'])->name('.EditPost');
        Route::post('delete_post', [AdminPostController::class, 'destroy'])->name('.DeletePost');
        Route::post('/search_post',[AdminPostController::class, 'search'])->name('.searchPost');

        Route::get('/role/index', [AdminRoleController::class, 'index'])->name('.roleIndex');
        Route::post('/role/create', [AdminRoleController::class, 'store'])->name('.roleCreate');
        Route::post('role/edit',[AdminRoleController::class,'edit'])->name('.roleEdit');
        Route::post('/role/update', [AdminRoleController::class, 'update'])->name('.roleUpdate');
        Route::post('/role/delete', [AdminRoleController::class, 'destroy'])->name('.roleDelete');
        Route::post('/search_role',[AdminRoleController::class, 'searchRole'])->name('.searchRole');
        Route::post('/permission_role',[AdminRoleController::class, 'permissionUserAdd'])->name('.permissionUserAdd');


        Route::post('/comment/store', [CommentPost::class, 'CommentStore'])->name('.CreateComment');
        Route::post('/commentId', [CommentPost::class,'CommentId'])->name('.CommentId');
        Route::post('/commentCreate',[CommentPost::class, 'CommentCreate'])->name('.CommentCreateReply');
        Route::post('/DelComment',[CommentPost::class, 'DelComment'])->name('.DeleteComment');
});
Route::middleware(['auth'])->group(function (){
    Route::get('clinet/single_blog/{id}', [BlogClinetController::class, 'blogDetail'])->name('clinet.single_blog');
});
require __DIR__.'/auth.php';
/*clinet*/
    Route::get('/clinet/index', [IndexClinetController::class, 'index'])->name('index.clinet');
    Route::get('/details/{id}', [DetailClinetController::class, 'detail'])->name('clinet.detail');
    Route::get('/clinet/blog', [BlogClinetController::class, 'blog'])->name('clinet.blog');

    Route::get('/forgotpassword',[ResetPassController::class, 'test']);
    Route::get('/test-email',[ResetPassController::class, 'testEmail']);
