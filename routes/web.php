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

Route::group(['prefix'=>'funcTree'],function(){

    Route::post('cloud',[MindController::class,'storeNode'])->name("funcTree.store");
    Route::get('cloud',[MindController::class,'showCloud'])->name("funcTree.cloud");
    Route::put('/cloud/{id}', [MindController::class, 'updateNode'])->name('funcTree.update');
    Route::delete('/cloud/{id}',[MindController::class,'deleteNode'])->name('funcTree.delete');
    
});