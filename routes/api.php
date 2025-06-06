<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComentarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/prueba', function (Request $request){
    return 'hola mundo';
});


#CRUD
# CREATE ==> POST
// READ ==> GET
// UPDATE ==> PUT
// DELETE ==> DELETE

// Route::get('/posts/views', [PostController::class, 'postsView'])->middleware(['jwt','checkRol:cliente|editor|admin']);
// Route::post('/posts/create-update', [PostController::class, 'createUpdate'])->middleware(['jwt','checkRol:editor']);

Route::get('/posts/views', [PostController::class, 'postsView']);
Route::post('/posts/create-update', [PostController::class, 'createUpdate']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts-crear', [PostController::class, 'create']);
Route::put('/posts-update', [PostController::class, 'update']);
Route::delete('/posts-eliminar/{id}', [PostController::class, 'destroy']);


Route::post('/comentario/create', [ComentarioController::class, 'create'])->middleware(['jwt']);
Route::put('/comentario/update', [ComentarioController::class, 'update'])->middleware(['jwt']);
Route::delete('comentario/delete/{id}', [ComentarioController::class, 'delete'])->middleware(['jwt']);



// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('jwt')->group(function () {
//     Route::get('/user', [AuthController::class, 'getUser']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::put('/user', [AuthController::class, 'updateUser']);
// });