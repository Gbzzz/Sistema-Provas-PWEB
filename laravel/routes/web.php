<?php

use App\Http\Controllers\QuestionController;
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
})->middleware(['auth']);

Route::get('/questions', [QuestionController::class, 'index']);

Route::get('/questions/create', [QuestionController::class, 'create']);

Route::post('/enviar', [QuestionController::class, 'store']);

Route::get('/questions/{id}', [QuestionController::class, 'show']);

Route::get('/questions/edit/{id}', [QuestionController::class, 'edit']);

Route::put('/questions/update/{id}', [QuestionController::class, 'update']);

Route::delete('/questions/delete/{id}', [QuestionController::class, 'destroy']);

require __DIR__.'/auth.php';