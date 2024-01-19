<?php
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\UserController;
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



Route::get('/', function () {return view('index');})->name('index')->middleware('auth');

Route::get('/login', [UserController::class, 'index'])->name('indexlogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['web', 'role:admin'])->group(function () {
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('filiere', FiliereController::class);
});

Route::middleware(['web', 'role:student'])->group(function () {
    Route::get('/filieres-with-student-count', [FiliereController::class, 'filieresWithStudentCount'])
    ->name('filieres.withStudentCount');
});