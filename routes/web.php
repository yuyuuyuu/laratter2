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

Route::resource('expense', ExpenseController::class);
Route::get('/expense/year', [ExpenseController,year])->name('expense.year');
Route::get('/expense/monthly', 'App\Http\Controllers\ExpenseController@month')->name('expense.monthly');
Route::get('/expense/dayly', 'App\Http\Controllers\ExpenseController@day')->name('expense.dayly');
Route::get('/expense/input', 'App\Http\Controllers\ExpenseController@input')->name('expense.input');
Route::get('/expense/edit', 'App\Http\Controllers\ExpenseController@edit')->name('expense.edit');
Route::get('/expense/store', 'App\Http\Controllers\ExpenseController@store')->name('expense.store');
/*
Route::getするときにはcontrollerをつけるときにApp\Http\Controllersをcontrollerの前につけないといけないみたい！！
*/
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
