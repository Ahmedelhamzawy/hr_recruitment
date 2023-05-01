<?php

use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\Recruiter\RecruiterController;
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

Route::group(['middleware' => ['auth:applicant']], function () {
    Route::get('/applicant', [ApplicantController::class,'index'])->name('applicant');
    Route::get('/show/applicant/{id}', [ApplicantController::class,'show'])->name('show-applicant-job');
    Route::get('/apply/{id}', [ApplicantController::class,'apply'])->name('apply');
    Route::post('/custom-apply/{id}', [ApplicantController::class,'create'])->name('custom-apply');

});
Route::group(['middleware' => ['auth:recruiter']], function () {
    Route::get('/recruiter', [RecruiterController::class,'index'])->name('recruiter');
    Route::get('/post', [JobController::class,'post']);
    Route::post('/jobadded', [JobController::class,'create'])->name('create-job');
    Route::get('/show/{id}', [RecruiterController::class,'show'])->name('show');
    Route::get('/candidates/job/{id}', [RecruiterController::class,'candidates'])->name('candidates');

});
Route::group(['middleware' => ['auth:recruiter,applicant']], function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});



    Route::group(['middleware' => ['guest:applicant,recruiter']], function () {
    Route::get('/login', [AuthController::class,'loginForm'])->name('login');
    Route::get('/register', [AuthController::class,'registerForm'])->name('register');
    Route::post('/custom-register', [AuthController::class,'create'])->name('custom-register');
    Route::post('/custom-login', [AuthController::class,'login'])->name('custom-login');
    });
Route::get('/home', function(){
    return view('welcome');
})->name('home');