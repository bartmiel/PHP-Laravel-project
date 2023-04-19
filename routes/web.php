<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [CompetitionController::class, 'index'])->name('competition.home');
    Route::get('/competition', [CompetitionController::class, 'index'])->name('competition.home');
    Route::get('/competition/details/{id}', [CompetitionController::class, 'details'])->name('competition.details');
    Route::get('/competition/create', [CompetitionController::class, 'create'])->name('addCompetition.home');
    Route::get('/competition/edit/{id}', [CompetitionController::class, 'edit'])->name('competition.edit');
    Route::get('/competition/delete/{id}', [CompetitionController::class, 'destroy'])->name('competition.destroy');
    Route::get('/competition/finish/{id}', [CompetitionController::class, 'finish'])->name('competition.finish');
    Route::get('/competition/registration/{id}', [CompetitionController::class, 'registration'])->name('registration.home');
    Route::post('/competition', [CompetitionController::class, 'store'])->name('competition.store');
    Route::get('/result/details/{id}', [ResultController::class, 'details'])->name('result.details');
    Route::get('/result', [ResultController::class, 'index'])->name('result.home');
    Route::get('/competition/{id}', [CompetitionController::class, 'update'])->name('competition.update');
    Route::post('/competition/details/{id}', [CompetitionController::class, 'signup'])->name('competition.signup');
    Route::get('/competition', [CompetitionController::class, 'getByQuery'])->name('competition.getByQuery');
});

