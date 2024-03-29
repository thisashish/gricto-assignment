<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\VerifyOTPController;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\StateController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Route::post('/register', [CustomerController::class, 'register']);
// Route::get('/register', [CustomerController::class, 'showRegistrationForm'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route to handle the login request
Route::post('/login', [LoginController::class, 'login']);

// Route to handle the logout request
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/send-otp', [LoginController::class, 'sendOTP'])->name('send-otp');

Route::get('/verify-otp', [VerifyOTPController::class, 'showVerifyForm'])->name('verify-otp');
Route::post('/verify-otp', [VerifyOTPController::class, 'verifyOTP']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('locations', LocationController::class);
});

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::resource('customers', 'CustomerController')->middleware('auth');

Route::get('/states', [StateController::class, 'index'])->name('states.index');
Route::get('/states/create', [StateController::class, 'create'])->name('states.create');
Route::post('/states', [StateController::class, 'store'])->name('states.store');
Route::get('/states/{state}/edit', [StateController::class, 'edit'])->name('states.edit');
Route::put('/states/{state}', [StateController::class, 'update'])->name('states.update');
Route::delete('/states/{state}', [StateController::class, 'destroy'])->name('states.destroy');


// Routes for managing Cities
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');

// Routes for managing Pincodes
Route::get('/pincodes', [PincodeController::class, 'index'])->name('pincodes.index');
Route::get('/pincodes/create', [PincodeController::class, 'create'])->name('pincodes.create');
Route::post('/pincodes', [PincodeController::class, 'store'])->name('pincodes.store');
Route::get('/pincodes/{pincode}/edit', [PincodeController::class, 'edit'])->name('pincodes.edit');
Route::put('/pincodes/{pincode}', [PincodeController::class, 'update'])->name('pincodes.update');
Route::delete('/pincodes/{pincode}', [PincodeController::class, 'destroy'])->name('pincodes.destroy');


