<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

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


Route::get('/admin',function (){
    return view('home');
});

Route::get('/employees',[EmployeeController::class,'index'])->name('employees.show');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::post('/employees/store',[EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/edit/{id}',[EmployeeController::class,'edit'])->name('employees.edit');
Route::post('/employees/update',[EmployeeController::class,'update'])->name('employees.update');
Route::get('/employees/delete/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');
Route::get('/search',[EmployeeController::class,'find'])->name('employees.search');