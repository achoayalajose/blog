<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// http://127.0.0.1:8000/api/prueba   //endpoint
Route::get('/prueba', function (Request $request){
    return 'hola mundo';
});


#CRUD
# CREATE ==> POST
// READ ==> GET
// UPDATE ==> PUT
// DELETE ==> DELETE

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts-crear', [PostController::class, 'create']);
Route::put('/posts-update', [PostController::class, 'update']);
Route::delete('/posts-eliminar/{id}', [PostController::class, 'destroy']);