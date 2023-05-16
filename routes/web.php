<?php

use App\Models\Kader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    $jumlahkader = Kader::count();
    $jumlahkaderlakilaki = Kader::where('jeniskelamin', 'lakilaki')->count();
    $jumlahkaderperempuan = Kader::where('jeniskelamin', 'perempuan')->count();

    return view('welcome', compact('jumlahkader', 'jumlahkaderlakilaki', 'jumlahkaderperempuan'));
})->middleware('auth');

Route::get('/kader', [KaderController::class, 'index'])->name('kader')->middleware('auth');
Route::get('/tambahkader', [KaderController::class, 'tambahkader'])->name('tambahkader');
Route::post('/insertdata', [KaderController::class, 'insertdata'])->name('insertkader');
Route::get('/tampilkandata/{id}', [KaderController::class, 'tampilkandata'])->name('tampilkankader');
Route::post('/updatedata/{id}', [KaderController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [KaderController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf', [KaderController::class, 'exportpdf'])->name('exportpdf');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
