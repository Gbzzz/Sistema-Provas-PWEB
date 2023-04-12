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

Route::get('/questions', function () {
    return view('questions/index');
})->middleware(['auth'])->name('questions');

Route::get('/questions/list', [QuestionController::class, 'show'])->name('list_questions');

Route::post('/questions/store', [QuestionController::class, 'store'])->name('add_questions');

Route::put('/questions/update/{id}', [QuestionController::class, 'edit'])->name('edit_questions');

Route::delete('/questions/delete/{id}', [QuestionController::class, 'delete'])->name('delete_questions');

Route::post('/questions/multiplaescolha', [QuestionController::class, 'answer'])->name('add_multipla');

Route::get('/questions/view/{id}', [QuestionController::class, 'view'])->name('view_question');

Route::fallback(function()
{
    echo 'Essa rota não existe, <a href="'.url('/').'">clique aqui </a>para ir para página inicial';
});

require __DIR__.'/auth.php';
