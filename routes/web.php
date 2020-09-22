<?php

use App\Http\Controllers\PropertyController;

use Illuminate\Support\Facades\App;
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

Route::get('/new', function () {
    return "OII";
});


Route::get('/imoveis',[PropertyController::class,'index']);

Route::get('/imoveis/new', [PropertyController::class,'create']);

Route::post('/imoveis/save', [PropertyController::class,'store']);

Route::get('/imoveis/{name}', [PropertyController::class,'show']);

Route::get('/imoveis/editar/{name}', [PropertyController::class,'edit']);

Route::put('/imoveis/update/{name}', [PropertyController::class,'update']);


Route::get('/imoveis/remover/{name}', [PropertyController::class,'destroy']);


