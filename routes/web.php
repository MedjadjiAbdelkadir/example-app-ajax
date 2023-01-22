<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\OfferController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'offers-ajax' , 'as'=>'offers.'],function(){

    Route::get('/create',[OfferController::class, 'create'])->name('create');

    Route::post('/store',[OfferController::class, 'store'])->name('store');

    Route::get('/all',[OfferController::class, 'allOffers'])->name('all');
    Route::get('/{offer_id}/edit',[OfferController::class, 'edit'])->name('edit');
    Route::post('/{offer_id}/update',[OfferController::class, 'update'])->name('update');
    Route::post('/delete',[OfferController::class, 'delete'])->name('delete');
});

Route::resource('blog',BlogController::class);

