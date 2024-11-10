<?php

use App\Http\Controllers\MindController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'cloud'],function(){

    Route::post('funcTree',[MindController::class,'storeNode'])->name("cloud.store");
    Route::get('funcTree',[MindController::class,'showCloud'])->name("cloud.show");
    Route::put('/funcTree/{id}', [MindController::class, 'updateNode'])->name('cloud.update');
    Route::delete('/funcTree/{id}',[MindController::class,'deleteNode'])->name('cloud.delete');
    
});