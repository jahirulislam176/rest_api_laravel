<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::apiResource('test','Api\testApi');
Route::get('/test',[ClassController::class,'index']);
Route::post('/test',[ClassController::class,'store']);
Route::post('/update/{id}',[ClassController::class,'update']);
Route::post('/delete/{id}',[ClassController::class,'destroy']);
// Route::apiResource('/subject','Api\SubjectController');

// subject module route
Route::get('/subject',[SubjectController::class,'index']);

Route::post('/subject',[SubjectController::class,'store']);

Route::post('/subject/update/{id}',[SubjectController::class,'update']);

Route::post('/subject/delete/{id}',[SubjectController::class,'destroy']);



//section module controller
Route::get('/section',[SectionController::class,'index']);

Route::post('/section',[SectionController::class,'store']);

Route::post('/section/update/{id}',[SectionController::class,'update']);

Route::post('/section/delete/{id}',[SectionController::class,'destroy']);
// Student Module Controller
Route::get('/student',[StudentController::class,'index']);

Route::post('/student',[StudentController::class,'store']);

Route::post('/student/update/{id}',[StudentController::class,'update']);

Route::post('/student/delete/{id}',[StudentController::class,'destroy']);



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login',[AuthController::class,'login']);
    
    Route::post('/logout',[AuthController::class,'logout']);

    Route::post('/refresh',[AuthController::class,'refresh']);

    Route::post('/me',[AuthController::class,'me']);

    Route::post('/payload',[AuthController::class,'payload']);

    Route::post('/register',[AuthController::class,'register']);
});