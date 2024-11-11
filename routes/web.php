<?php

use App\Http\Controllers\CloudController;
use App\Http\Controllers\SixController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix'=>'cloud'],function(){

    Route::get('funcTree',[CloudController::class,'showCloud'])->name("cloud.show");
    Route::get('funcTree/admin',[CloudController::class,'showCloudAdmin'])->name("cloud.admin");
    Route::post('funcTree/admin',[CloudController::class,'storeNode'])->name("cloud.store");
    Route::put('/funcTree/admin/{id}', [CloudController::class, 'updateNode'])->name('cloud.update');
    Route::delete('/funcTree/admin/{id}',[CloudController::class,'deleteNode'])->name('cloud.delete');
    
});

Route::group(['prefix'=>'sixth'],function(){
    Route::get('funcTree',[SixController::class, 'showSixth'])->name("sixth.show");
    Route::get('funcTree/admin',[SixController::class, 'showSixthAdmin'])->name("sixth.admin");
    Route::post('funcTree/admin',[SixController::class,'storeNode'])->name("sixth.store");
    Route::put('/funcTree/admin/{id}', [SixController::class, 'updateNode'])->name('sixth.update');
    Route::delete('/funcTree/admin/{id}',[SixController::class,'deleteNode'])->name('sixth.delete');
});