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

Route::get('/', [EmployeeController::class, 'index'])->name('tampilan.pegawai');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('tampilan.tambah');
Route::post('/employees/create', [EmployeeController::class, 'store'])->name('tambah.pegawai');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('tampilan.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('edit.pegawai');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('hapus.destroy');
