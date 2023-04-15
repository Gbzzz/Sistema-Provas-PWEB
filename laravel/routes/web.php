<?php

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

Route::get('/questions/list', [QuestionController::class, 'list'])->name('list_questions');

Route::post('/questions/addOpen', [QuestionController::class, 'storeOpen'])->name('add_questionOpen');

Route::post('/questions/addMark', [QuestionController::class, 'storeMark'])->name('add_questionMark');

Route::get('/questions/edit/{id}', [QuestionController::class, 'edit'])->name('edit_question');

Route::put('/questions/updateOpen/{id}', [QuestionController::class, 'updateQuestionOpen'])->name('update_questionOpen');

Route::put('/questions/updateMark/{id}', [QuestionController::class, 'updateQuestionMark'])->name('update_questionMark');

Route::get('/questions/view/{id}', [QuestionController::class, 'view'])->name('view_question');

Route::delete('/questions/delete/{id}', [QuestionController::class, 'delete'])->name('delete_questions');

Route::fallback(function()
{
    echo 'Essa rota não existe, <a href="'.url('/dashboard').'">clique aqui </a>para ir para página inicial';
});

require __DIR__.'/auth.php';
