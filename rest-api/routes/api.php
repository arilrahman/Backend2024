<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/animals',function() {
    return "Menampilkan data animals";
});

Route::get('/animals',[AnimalController::class, 'index']);

Route::post('/animals',[AnimalController::class, 'store']);

Route::put('/animals/{id}',[AnimalController::class, 'update']);

Route::delete('/animals/{id}',[AnimalController::class, 'destroy']);

// route ::get('/Animals',[AnimalController::class,'index']);
