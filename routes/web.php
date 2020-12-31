<?php

use App\Http\Controllers\MagicImageController;
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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [MagicImageController::class,'index'])
    ->name('dashboard');

Route::get('/-{id}',[MagicImageController::class,'show'])
    ->name('magic-images.show');
Route::middleware(['auth:sanctum', 'verified'])
    ->group(function(){
        Route::get('/magic-images/',[MagicImageController::class,'index'])
            ->name('magic-images.index');
        Route::get('/magic-images/create',[MagicImageController::class,'create'])
            ->name('magic-images.create');
        Route::get('/magic-images/{id}/update',[MagicImageController::class,'update'])
            ->name('magic-images.update');
    });
