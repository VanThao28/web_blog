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

/*admin*/
Route::get('/admin/index', function () {
    return view('admin.index');
})->middleware(['auth'])->name('admin.index');

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
