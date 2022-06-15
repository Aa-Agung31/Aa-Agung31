<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/product', [EmployeeController::class, 'index'])->name('product');
Route::get('/tambahproduct', [EmployeeController::class, 'tambahproduct'])->name('tambahproduct');
Route::POST('/insertproduct', [EmployeeController::class, 'insertproduct'])->name('insertproduct');

Route::get('/tampilkanproduct/{id}', [EmployeeController::class, 'tampilkanproduct'])->name('tampilkanproduct');
Route::post('/updateproduct/{id}', [EmployeeController::class, 'updateproduct'])->name('updateproduct');

Route::get('/deleteproduct/{id}', [EmployeeController::class, 'deleteproduct'])->name('deleteproduct');
