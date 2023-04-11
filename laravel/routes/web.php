<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cadastrar', function(){
    return view('user.cadastro');
})->middleware(['auth']);

Route::post('/cadastrar', [RegisteredUserController::class, 'store'])->middleware(['auth']);

Route::get('/questions', function () {
    return view('questions/index');
})->middleware(['auth'])->name('questions');

Route::get('/answers', function () {
    return view('answers/index');
})->middleware(['auth'])->name('questions');

Route::post('/questions/store', [QuestionController::class, 'store'])->name('add_question');

Route::post('/answers/store', [AnswerController::class, 'store'])->name('add_answer');

Route::get('/answers', [AnswerController::class, 'index']);

Route::fallback(function()
{
    echo 'Essa rota não existe, <a href="'.url('/').'">clique aqui </a>para ir para página inicial';
});

require __DIR__.'/auth.php';
