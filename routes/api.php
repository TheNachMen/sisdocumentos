<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\documentosController;
use App\Http\Controllers\Api\Admin\DocumentoController as Administrador;
use App\Http\Controllers\Api\Editor\DocumentoController as Editor;
use App\Http\Controllers\Api\Create\DocumentoController as Creador;
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

Route::get('/documentos',[documentosController::class,'index'])->name('documentos.index');

Route::post('/documentos',[documentosController::class,'store'])->name('documentos.store');

Route::put('/documentos/{id}',[documentosController::class,'update'])->name('documentos.update');

Route::patch('/documentos/{id}',[documentosController::class,'cambiarEstado'])->name('documentos.estado');

Route::get('/documentos/{id}',[documentosController::class,'show'])->name('documentos.show');



//rutas publicas
Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);

//rutas privada(necesitan autenticacion)
Route::group(['middleware'=> 'auth:sanctum'], function () {

    Route::post('/auth/logout',[AuthController::class,'logout']);

    //Route::get('/documentos',[documentosController::class,'index'])->name('documentos.index');

    

    //Administrador
    Route::apiResource('/admin/documentos',Administrador::class);
    Route::patch('/admin/documentos/estado/{id}',[Administrador::class,'cambiarEstado']);
    
    //editor
    Route::apiResource('/editor/documentos',Editor::class);
    Route::patch('/editor/documentos/estado/{id}',[Editor::class,'cambiarEstado']);

    //creador
    Route::apiResource('/create/documentos',Creador::class);
    
});
