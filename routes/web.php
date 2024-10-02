<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PopularPlaceController;
use App\Http\Controllers\PlacetoRaomController;
use App\Http\Controllers\AirPortController;
use App\Http\Controllers\MealsController;
use Illuminate\Support\Facades\Auth;

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
    return view('layouts.main');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'users'])->name('user');
Route::get('/user/create',[UserController::class,'userCreate'])->name('create.user');
Route::post('/user/insert',[UserController::class,'userInsert'])->name('insert.user');
Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('edit.user');
Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
Route::get('/user/destroy/{id}',[UserController::class,'userDestroy'])->name('destroy.user');
Route::get('/user/my/profile', [UserController::class, 'myProfile'])->name('myprofile');
Route::get('/edit-profile/{id}', [UserController::class, 'editProfile'])->name('edit-profile');
Route::post('/update-profile/{id}', [UserController::class, 'Profileupdate'])->name('update-profile');

Route::get('/role', [RoleController::class, 'role'])->name('role');
Route::get('/role/create', [RoleController::class, 'roleCreate'])->name('role.create');
Route::post('/role/insert', [RoleController::class, 'roleStore'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'roleEdit'])->name('role.edit');
Route::post('/role/update/{id}', [RoleController::class, 'roleUpdate'])->name('role.update');
Route::get('/role/delete/{id}', [RoleController::class, 'roleDestroy'])->name('role.destroy');

Route::get('/popularplace', [PopularPlaceController::class, 'popularPlace'])->name('popularplace');
Route::get('/popularplace/create', [PopularPlaceController::class, 'popularPlaceCreate'])->name('popularplace.create');
Route::post('/popularplace/insert', [PopularPlaceController::class, 'popularPlaceStore'])->name('popularplace.store');
Route::get('/popularplace/edit/{id}', [PopularPlaceController::class, 'popularPlaceEdit'])->name('popularplace.edit');
Route::post('/popularplace/update/{id}', [PopularPlaceController::class, 'popularPlaceUpdate'])->name('popularplace.update');
Route::get('/popularplace/delete/{id}', [PopularPlaceController::class, 'popularPlaceDelete'])->name('popularplace.destroy');

Route::get('/placetoroam', [PlacetoRaomController::class, 'placetoroam'])->name('placetoroam');
Route::get('/placetoroam/create', [PlacetoRaomController::class, 'placetoRoamCreate'])->name('placetoroam.create');
Route::post('/placetoroam/insert', [PlacetoRaomController::class, 'placetoRoamStore'])->name('placetoroam.store');
Route::get('/placetoroam/edit/{id}', [PlacetoRaomController::class, 'placetoRoamEdit'])->name('placetoroam.edit');
Route::post('/placetoroam/update/{id}', [PlacetoRaomController::class, 'placetoRoamUpdate'])->name('placetoroam.update');
Route::get('/placetoroam/delete/{id}', [PlacetoRaomController::class, 'placetoRoamDelete'])->name('placetoroam.destroy');

Route::get('/airport', [AirPortController::class, 'airport'])->name('airport');
Route::get('/airport/create', [AirPortController::class, 'airportCreate'])->name('airport.create');
Route::post('/airport/insert', [AirPortController::class, 'airportStore'])->name('airport.store');
Route::get('/airport/edit/{id}', [AirPortController::class, 'airportEdit'])->name('airport.edit');
Route::post('/airport/update/{id}', [AirPortController::class, 'airportUpdate'])->name('airport.update');
Route::get('/airport/delete/{id}', [AirPortController::class, 'airportDestroy'])->name('airport.destroy');

// meals

Route::get('/meals',[MealsController::class,'meals'])->name('meals');
Route::get('/meals/create',[MealsController::class,'mealsCreate'])->name('meals.create');
Route::post('/meals/insert',[MealsController::class,'mealsStore'])->name('meals.store');
Route::get('/meals/edit/{id}',[MealsController::class,'mealsEdit'])->name('meals.edit');
Route::post('/meals/update/{id}',[MealsController::class,'mealsUpdate'])->name('meals.update');
Route::get('/meals/delete/{id}',[MealsController::class,'mealsDestroy'])->name('meals.destroy');



