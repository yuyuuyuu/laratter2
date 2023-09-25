<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
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

Route::resource('product', ProductController::class);
Route::resource('expense', ExpenseController::class);
Route::get('/expense/yearexpense', 'ExpenseController@years')->name('expense.yearexpense');
Route::get('/expense/monthexpense', 'ExpenseController@months')->name('expense.monthexpense');
Route::get('/expense/dayexpense', 'ExpenseController@days')->name('expense.dayexpense');
Route::get('/expense/input', 'ExpenseController@inputs')->name('expense.input');
Route::get('/expense/edit', 'ExpenseController@edit')->name('expense.edit');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
