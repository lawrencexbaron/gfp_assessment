<?php

use App\Http\Controllers\IssueController;
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



Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issue/{encodedUrl}', [IssueController::class, 'show'])->name('issues.show');
