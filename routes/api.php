<?php

use App\Http\Controllers\documentosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:sanctum'],function(){

    
    //Route::apiResource('/documentos',[documentosController::class,'index'])->name('documentos.index');
    
});

    Route::get('/documentos',[documentosController::class,'index'])->name('documentos.index');

    Route::post('/documentos',[documentosController::class,'store'])->name('documentos.store');

    Route::put('/documentos/{id}',[documentosController::class,'update'])->name('documentos.update');

    Route::patch('/documentos/{id}',[documentosController::class,'cambiarEstado'])->name('documentos.estado');

    Route::get('/documentos/{id}',[documentosController::class,'show'])->name('documentos.show');

/*
Route::delete('/estado/{id}',function(){
    return 'estado';
});
*/

Route::middleware('auth')->group(function () {
    /*
    Route::get('/documentos',function(){
        return 'documentos';
    });
    Route::get('/documentos/{id}',function(){
        return 'obteniendo documentos';
    });
    Route::post('/documentos/{id}',function(){
        return 'documentos creando';
    });
    Route::put('/estado',function(){
        return 'estado actualizado';
    });

    Route::delete('/estado/{id}',function(){
        return 'estado';
    });
    */
    
});
