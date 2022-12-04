<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('studentform', function () {
    return view('studentform');
});

Route::post('student', [StudentController::class, 'student'])->name('student');
// Route::get('send-mail', [StudentController::class, 'sendEmail'])->name('send-mail');
Route::get('send-message', [StudentController::class, 'sendMessage'])->name('send-message');