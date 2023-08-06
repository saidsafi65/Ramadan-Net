<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ViewDataController;

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
// Route::get('/', ['as' => 'login', 'uses' => 'App\Http\Controllers\AuthenticationController@login']);
// Route::post('/', ['as' => 'login.post', 'uses' => 'App\Http\Controllers\AuthenticationController@dologin']);
// Route::get('/registration', function () {
//     return view('registration');
// });

Route::get('/registrat', ['as' => 'registrat', 'uses' => 'App\Http\Controllers\AuthenticationController@registration']);
Route::post('/registrat', ['as' => 'registrat.post', 'uses' => 'App\Http\Controllers\AuthenticationController@doregistration']);

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\AuthenticationController@login']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'App\Http\Controllers\AuthenticationController@dologin']);



Route::post('/logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\AuthenticationController@dologout']);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/daily_sales', 'App\Http\Controllers\HomeController@daily_sales')->name('daily_sales');
Route::get('/daily_cards', 'App\Http\Controllers\HomeController@daily_cards')->name('daily_cards');
Route::get('/daily_home_net', 'App\Http\Controllers\HomeController@daily_home_net')->name('daily_home_net');
Route::get('/daily_P_O_S', 'App\Http\Controllers\HomeController@daily_P_O_S')->name('daily_P_O_S');
Route::get('/daily_add_balance', 'App\Http\Controllers\HomeController@daily_add_balance')->name('daily_add_balance');
Route::get('/daily_sell_jawal/{key}', 'App\Http\Controllers\HomeController@daily_sell_jawal')->name('daily_sell_jawal');
Route::get('/social_media', 'App\Http\Controllers\HomeController@social_media')->name('social_media');
Route::get('/ip_routers', 'App\Http\Controllers\HomeController@ip_routers')->name('ip_routers');
Route::get('/ip_routers_location/{key}', 'App\Http\Controllers\HomeController@ip_routers_location')->name('ip_routers_location');
Route::get('/expenses', 'App\Http\Controllers\HomeController@expenses')->name('expenses');


//save to database DailyCard
Route::view('add_DailyCard', 'AddDailyCard');
Route::post('add_DailyCard', [AuthenticationController::class, 'adddailycard']);

//save to database Home Net
Route::view('add_dailyhomenet', 'add_dailyhomenet');
Route::post('add_dailyhomenet', [AuthenticationController::class, 'add_dailyhomenet']);

//save to database POS Point Of Sale
Route::view('add_dailypos', 'add_dailypos');
Route::post('add_dailypos', [AuthenticationController::class, 'add_dailypos']);

//save to database snaks
Route::view('add_snaks', 'add_dailysnaks');
Route::post('add_snaks', [AuthenticationController::class, 'add_dailysnaks']);

//save to database gifts
Route::view('add_gift', 'add_dailygift');
Route::post('add_gift', [AuthenticationController::class, 'add_dailygift']);

//save to database add balance (jawal - ooridoo - electricity)
Route::view('add_balance', 'add_dailybalance');
Route::post('add_balance', [AuthenticationController::class, 'add_dailybalance']);


//save to database sell balance (jawal)
Route::view('add_selling_jawal', 'add_dailyjawal');
Route::post('add_selling_jawal', [AuthenticationController::class, 'add_dailyjawal']);
//save to database sell balance (ooredoo)
Route::view('add_selling_ooredoo', 'add_dailyooredoo');
Route::post('add_selling_ooredoo', [AuthenticationController::class, 'add_dailyooredoo']);
//save to database sell balance (electricity)
Route::view('add_selling_electricity', 'add_dailyelectricity');
Route::post('add_selling_electricity', [AuthenticationController::class, 'add_dailyelectricity']);

//save to database social media Account
Route::view('add_social_media', 'add_socialmedia');
Route::post('add_social_media', [AuthenticationController::class, 'add_socialmedia']);
//Edit to database social media Account
Route::view('edit_social_media/{id}', 'edit_socialmedia');
Route::post('edit_social_media/{id}', [AuthenticationController::class, 'edit_socialmedia']);

//save to database social media Account
Route::view('ip_routers_location/add_ip_routers', 'add_iprouters');
Route::post('ip_routers_location/add_ip_routers', [AuthenticationController::class, 'add_iprouters']);
//Edit to database Routers Account
Route::view('ip_routers_location/edit_ip_routers/{id}', 'edit_iprouters');
Route::post('ip_routers_location/edit_ip_routers/{id}', [AuthenticationController::class, 'edit_iprouters']);
//save to database Aria Location ip Account
Route::view('add_aria_routers', 'add_ariarouters');
Route::post('add_aria_routers', [AuthenticationController::class, 'add_ariarouters']);