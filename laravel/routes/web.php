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

<<<<<<< HEAD
Route::get('/questions/create', function () {
    return view('questions/index');
})->middleware(['auth'])->name('create');

Route::get('/questions', [QuestionController::class, 'index'])->name('list_questions');

Route::post('/enviar', [QuestionController::class, 'store']);

Route::get('/questions/{id}', [QuestionController::class, 'show']);

Route::get('/questions/edit/{id}', [QuestionController::class, 'edit']);

Route::put('/questions/update/{id}', [QuestionController::class, 'update']);

Route::delete('/questions/delete/{id}', [QuestionController::class, 'destroy']);

// Route::get('/questions/list', [QuestionController::class, 'show'])->name('list_questions');

// Route::post('/questions/store', [QuestionController::class, 'store'])->name('add_questions');

// Route::put('/questions/update/{id}', [QuestionController::class, 'update'])->name('update_questions');

// Route::delete('/questions/delete/{id}', [QuestionController::class, 'delete'])->name('delete_questions');

// Route::post('/questions/multiplaescolha', [QuestionController::class, 'answer'])->name('add_multipla');

// Route::get('/questions/view/{id}', [QuestionController::class, 'view'])->name('view_question');

Route::fallback(function()
{
    echo 'Essa rota não existe, <a href="'.url('/').'">clique aqui </a>para ir para página inicial';
});

require __DIR__.'/auth.php';
=======
Route::get('/questions/create', [QuestionController::class, 'create']);

Route::post('/enviar', [QuestionController::class, 'store']);

Route::get('/questions/{id}', [QuestionController::class, 'show']);

Route::get('/questions/edit/{id}', [QuestionController::class, 'edit']);

Route::put('/questions/update/{id}', [QuestionController::class, 'update']);

Route::delete('/questions/delete/{id}', [QuestionController::class, 'destroy']);

require __DIR__.'/auth.php';
>>>>>>> a9a92fc312bfe772d90d7665270b3701c5a9ab18
