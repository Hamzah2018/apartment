<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BokerDashboardController;
use App\Http\Controllers\Apartment\ApartmentsController;
use App\Http\Controllers\Apartment\ApartmentsBokerController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Storage;

// use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// use App\Http\Middleware\VerfiyIsAdmin;

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

// Route::get('/', function () {
//     // return view('home');
//     Storage::disk('public')->put('ex.txt','Hamzah 2');
//     return 'success';
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('apartment', ApartmentsController::class);
Route::resource('apartmentbroker', ApartmentsBokerController::class);
Route::resource('users', UsersController::class);
Auth::routes();

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['VerfiyIsAdmin']);
Route::get('/dashboardboker',[BokerDashboardController::class,'index'])->name('dashboardboker');
//Route::get('users', [App\Http\Controllers\UsersController::class, 'index']);
// Route::get('/{page}', 'AdminController@index');
Route::get('/{page}',[AdminController::class,'index']);

//profile
Route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/profile',[UsersController::class,'edit'])->name('user.edit');

    });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Storage::disk('local')->put('example.txt', 'Contents');
