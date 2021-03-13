<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;

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



Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend

Route::get('/user/quiz/{quizid}', [App\Http\Controllers\ExamController::class, 'getQuizQuestions'])->middleware('auth')->name('quiz.question');
Route::post('/quiz/create', [App\Http\Controllers\ExamController::class, 'postQuiz'])->middleware('auth')->name('quiz.question');
Route::get('/result/user/{userid}/quiz/{quizid}', [App\Http\Controllers\ExamController::class, 'viewresult'])->middleware('auth')->name('quiz.question');


Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::get('/quiz/{id}/questions',[App\Http\Controllers\QuizController::class, 'question'])->name('quiz.question');
    Route::resource('user', UserController::class);
    Route::resource('quiz', QuizController::class);
    Route::get('exam/assign',[App\Http\Controllers\ExamController::class, 'create'])->name('assign.exam');
    Route::post('exam/assign',[App\Http\Controllers\ExamController::class, 'assignexam'])->name('assign.exam');
    Route::get('exam/user',[App\Http\Controllers\ExamController::class, 'userexam'])->name('view.exam');
    Route::post('exam/remove',[App\Http\Controllers\ExamController::class, 'removeexam'])->name('remove.exam');
    Route::get('/result', [App\Http\Controllers\ExamController::class, 'result'])->name('result');
    Route::get('/result/{userid}/{quizid}', [App\Http\Controllers\ExamController::class, 'userquizresult']);
});

