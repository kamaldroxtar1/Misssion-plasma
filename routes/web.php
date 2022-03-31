<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlasmaDonor;
use App\Http\Controllers\PlasmaRequest;
use App\Http\Controllers\PlasmaRequestList;
use App\Http\Controllers\PlasmaDonorList;
use App\Http\Controllers\ChartController;


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

Route::get('/',[ChartController::class,'Chart']);
Route::get('/listPlasmaDonor',[PlasmaDonorList::class,'show'])->name('listPlasmaDonor');
Route::get('showDonorStateWise/{id}',[PlasmaDonorList::class,'showStateWise']);
Route::get('showDonorBloodWise/{id}',[PlasmaDonorList::class,'showBloodWise']);

Route::get('/listPlasmaRequest',[PlasmaRequestList::class,'show'])->name('listPlasmaRequest');
Route::get('/showRequestStateWise/{id}',[PlasmaRequestList::class,'showStateWise']);
Route::get('/showRequestBloodWise/{id}',[PlasmaRequestList::class,'showBloodWise']);

Route::get('/plasmaRequestForm',[PlasmaRequest::class,'showRequestForm'])->name('plasmaRequestForm');
Route::post('/postRequestForm',[PlasmaRequest::class,'store'])->name('postRequestForm');

Route::get('/PlasmaDonateForm',[PlasmaDonor::class,'showDonorForm'])->name('PlasmaDonateForm');
Route::post('/getCity',[PlasmaDonor::class,'GetCity']);
Route::post('/postDonorForm',[PlasmaDonor::class,'store'])->name('postDonorForm');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
