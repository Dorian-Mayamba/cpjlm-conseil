<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\AdminController;
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
/* Page routes */
Route::get('/',[PagesController::class,'index'])->name('Page.index');
Route::get('/A-propos',[PagesController::class,'about'])->name('Page.about');
Route::get('/formations',[PagesController::class,'formation'])->name('Page.formation');
Route::get('/missions',[PagesController::class,'mission'])->name('Page.mission');
Route::get('/partenaires',[PagesController::class,'partners'])->name('Page.partners');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/contact',[ContactController::class,'post'])->name('contact');

//Partner Routes

Route::get('/partenaires/{id}',[PartnersController::class,'show'])->name('partners.show');
Route::post('/partenaires/{id}',[PartnersController::class,'update'])->name('update');
Route::delete('/partenaires/{id}',[PartnersController::class,'delete'])->name('delete');
Route::put('/partenaires',[PartnersController::class,'addPartner'])->name('addPartner');

//Admin Routes

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/{id}',[AdminController::class,'show'])->name('admin.show');


