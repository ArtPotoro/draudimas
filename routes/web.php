<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\ImageController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\ShortCodeController;
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

Route::get('cars', [CarController::class, 'index'])->name('cars.index');
Route::middleware(['auth', 'role', 'shortcode' ])->group(function (){
    Route::resource('cars',CarController::class)->except(['index']);

});

Route::get('owners', [OwnerController::class, 'index'])->name('owners.index');
Route::middleware( ['auth', 'role', 'shortcode'])->group(function () {
    Route::resource('owners', OwnerController::class)->except(['index']);

});



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('cars', CarController::class);
//Route::get('/cars',[CarController::class, 'showCars' ])->name('cars');
    Route::resource('owners', OwnerController::class);
//Route::get('/owners',[OwnerController::class, 'showOwners' ])->name('owners');
});

Route::get('/image/{name}',[ImageController::class,'display'])
    ->name('image.display')
    ->middleware('auth');
Route::get('/carImage/{id}',[ImageController::class,'carImage'])
    ->name('image.carImage')
    ->middleware('auth');


Route::resource('shortcodes', ShortCodeController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
