<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/details', function () {
    return view('Frontend.artistDetails');
});
Route::get('/test', function () {
    return view('dashboard.home');
});
Route::resource('artists', ArtistController::class);
Route::resource('artistDetails', ArtistDetailsController::class);
Route::resource('artWorks', ArtWorkController::class);
Route::resource('events', EventController::class);

Route::get('/status-update/{id}','EventController@status_update');

Route::get('notification', 'EventNotification@notification')->name('notification');
Route::get('/', 'IndexController@artistList')->name('/');
Route::get('/artistDetailPage', 'IndexController@artistDetailPage')->name('/artistDetailPage');


Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

