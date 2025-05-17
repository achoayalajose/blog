<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

Route::get('/posts/views', [PostController::class, 'postsView'])->middleware(['jwt','checkRol:cliente|editor|admin']);
Route::post('/posts/create-update', [PostController::class, 'createUpdate'])->middleware(['jwt','checkRol:editor']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts-crear', [PostController::class, 'create']);
Route::put('/posts-update', [PostController::class, 'update']);
Route::delete('/posts-eliminar/{id}', [PostController::class, 'destroy']);




// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('jwt')->group(function () {
//     Route::get('/user', [AuthController::class, 'getUser']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::put('/user', [AuthController::class, 'updateUser']);
// });