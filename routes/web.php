<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BokerDashboardController;
use App\Http\Controllers\Apartment\ApartmentsController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Apartment\ApartmentsBokerController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Storage;


// use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router\Illuminate\Routing\RouteRegistrar;

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

# *** ########### Apartments Routes ###################

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('apartment', ApartmentsController::class);
Route::post('Upload_attachment', [ApartmentsController::class,'Upload_attachment'])->name('Upload_attachment');
Route::get('Download_attachment/{Apartmentaddress}/{filename}', [ApartmentsController::class,'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment', [ApartmentsController::class, 'Delete_attachment'])->name('Delete_attachment');

# ***** ################## chat ################### **** #
Route::resource('chat', ChatController::class);



// Route::group(['prefix' => LaravelLocalization::setLocale()],'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
//  function (){
//     Route::get('create','CrudController@create');
//  });
// Route::group(['prefix' => 'apartment'],function(){
//     // Route::get('store','AprtementController@store')
               // prefix use for Route to not repeat the name of the directory
               // in the url for example use/delete
               // at same time the are in the same directory in controller
//     });


 # ************* ######## User and Auth Routes ###################
// Route::get('apartment/show',['apartment', ApartmentsController::class,'show'])->name('apartment.show');
Route::resource('apartmentbroker', ApartmentsBokerController::class);
// Route::resource('users', UsersController::class);
Auth::routes();
// ---
//  Route::middleware(['auth'])->group(function(){
    // [App\Http\Controllers\HomeController::class, 'index']
    // Route::get('/users/{Auth::user()->id}',[UsersController::class,'edit'])->name('users.edit');
    Route::get('/users/edit/{id}',[UsersController::class,'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UsersController::class,'update'])->name('users.update');
    //  });

// ---

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['VerfiyIsAdmin']);
Route::get('/dashboardboker',[BokerDashboardController::class,'index'])->name('dashboardboker');
//Route::get('users', [App\Http\Controllers\UsersController::class, 'index']);
// Route::get('/{page}', 'AdminController@index');
Route::get('/{page}',[AdminController::class,'index']);

//profile
// Route::middleware(['auth'])->group(function(){
//     Route::get('/users/{user}/profile',[UsersController::class,'edit'])->name('user.edit');

//     });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Storage::disk('local')->put('example.txt', 'Contents');
