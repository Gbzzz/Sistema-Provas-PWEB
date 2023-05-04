<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('docente')->group(function(){

    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');

    Route::get('/questions/list', [QuestionController::class, 'list'])->name('list_questions');

    Route::post('/questions/addOpen', [QuestionController::class, 'storeOpen'])->name('add_questionOpen');

    Route::post('/questions/addMark', [QuestionController::class, 'storeMark'])->name('add_questionMark');

    Route::get('/questions/edit/{id}', [QuestionController::class, 'edit'])->name('edit_question');

    Route::put('/questions/updateOpen/{id}', [QuestionController::class, 'updateQuestionOpen'])->name('update_questionOpen');

    Route::put('/questions/updateMark/{id}', [QuestionController::class, 'updateQuestionMark'])->name('update_questionMark');

    Route::get('/questions/view/{id}', [QuestionController::class, 'view'])->name('view_question');

    Route::delete('/questions/delete/{id}', [QuestionController::class, 'delete'])->name('delete_questions');

    Route::get('/test', [TestController::class, 'index'])->name('list_test');

    Route::post('/test/add', [TestController::class, 'store'])->name('add_test');

});

Route::fallback(function()
{
    echo 'Essa rota não existe, <a href="'.url('/dashboard').'">clique aqui </a>para ir para página inicial';
});

require __DIR__.'/auth.php';
