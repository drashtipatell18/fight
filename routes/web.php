
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PopularPlaceController;
use App\Http\Controllers\PlacetoRaomController;
use App\Http\Controllers\AirPortController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\PlaneMasterController;
use App\Http\Controllers\SeatMasterController;
use App\Http\Controllers\JourneyMasterController;
use App\Http\Controllers\BookMasterController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\BookingPassengerController;
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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginstore', [UserController::class, 'loginstore'])->name('loginstore');
Route::post('/verifyOtp', [UserController::class, 'verifyOtp'])->name('verifyOtp');
Route::get('/otp', [UserController::class, 'Otp'])->name('otp');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
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

//  plane master

Route::get('/planemaster',[PlaneMasterController::class,'planemaster'])->name('planemaster');
Route::get('/planemaster/create',[PlaneMasterController::class,'planemasterCreate'])->name('planemaster.create');
Route::post('/planemaster/insert',[PlaneMasterController::class,'planemasterStore'])->name('planemaster.store');
Route::get('/planemaster/edit/{id}',[PlaneMasterController::class,'planemasterEdit'])->name('planemaster.edit');
Route::post('/planemaster/update/{id}',[PlaneMasterController::class,'planemasterUpdate'])->name('planemaster.update');
Route::get('/planemaster/delete/{id}',[PlaneMasterController::class,'planemasterDestroy'])->name('planemaster.destroy');

// seat master

Route::get('/seatmaster',[SeatMasterController::class,'seatmaster'])->name('seatmaster');
Route::get('/seatmaster/create',[SeatMasterController::class,'seatmasterCreate'])->name('seatmaster.create');
Route::post('/seatmaster/insert',[SeatMasterController::class,'seatmasterStore'])->name('seatmaster.store');
Route::get('/seatmaster/edit/{id}',[SeatMasterController::class,'seatmasterEdit'])->name('seatmaster.edit');
Route::post('/seatmaster/update/{id}',[SeatMasterController::class,'seatmasterUpdate'])->name('seatmaster.update');
Route::get('/seatmaster/delete/{id}',[SeatMasterController::class,'seatmasterDestroy'])->name('seatmaster.destroy');

// Journey Master

Route::get('/journey',[JourneyMasterController::class,'journey'])->name('journey');
Route::get('/journey/create',[JourneyMasterController::class,'journeyCreate'])->name('journey.create');
Route::post('/journey/insert',[JourneyMasterController::class,'journeyStore'])->name('journey.store');
Route::get('/journey/edit/{id}',[JourneyMasterController::class,'journeyEdit'])->name('journey.edit');
Route::post('/journey/update/{id}',[JourneyMasterController::class,'journeyUpdate'])->name('journey.update');
Route::get('/journey/delete/{id}',[JourneyMasterController::class,'journeyDestroy'])->name('journey.destroy');

// Booking Master

Route::get('/booking',[BookMasterController::class,'booking'])->name('booking');
Route::get('/booking/create',[BookMasterController::class,'bookingCreate'])->name('booking.create');
Route::post('/booking/insert',[BookMasterController::class,'bookingStore'])->name('booking.store');
Route::get('/booking/edit/{id}',[BookMasterController::class,'bookingEdit'])->name('booking.edit');
Route::post('/booking/update/{id}',[BookMasterController::class,'bookingUpdate'])->name('booking.update');
Route::get('/booking/delete/{id}',[BookMasterController::class,'bookingDestroy'])->name('booking.destroy');

// booking detail

Route::get('/bookingdetail',[BookingDetailController::class,'bookingdetail'])->name('bookingdetail');
Route::get('/bookingdetail/create',[BookingDetailController::class,'bookingdetailCreate'])->name('bookingdetail.create');
Route::post('/bookingdetail/insert',[BookingDetailController::class,'bookingdetailStore'])->name('bookingdetail.store');
Route::get('/bookingdetail/edit/{id}',[BookingDetailController::class,'bookingdetailEdit'])->name('bookingdetail.edit');
Route::post('/bookingdetail/update/{id}',[BookingDetailController::class,'bookingdetailUpdate'])->name('bookingdetail.update');
Route::get('/bookingdetail/delete/{id}',[BookingDetailController::class,'bookingdetailDestroy'])->name('bookingdetail.destroy');


// booking passenger seat

Route::get('/bookingpassenger',[BookingPassengerController::class,'bookingpassenger'])->name('bookingpassenger');
Route::get('/bookingpassenger/create',[BookingPassengerController::class,'bookingpassengerCreate'])->name('bookingpassenger.create');
Route::post('/bookingpassenger/insert',[BookingPassengerController::class,'bookingpassengerStore'])->name('bookingpassenger.store');
Route::get('/bookingpassenger/edit/{id}',[BookingPassengerController::class,'bookingpassengerEdit'])->name('bookingpassenger.edit');
Route::post('/bookingpassenger/update/{id}',[BookingPassengerController::class,'bookingpassengerUpdate'])->name('bookingpassenger.update');
Route::get('/bookingpassenger/delete/{id}',[BookingPassengerController::class,'bookingpassengerDestroy'])->name('bookingpassenger.destroy');
