<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/events')->group(function () {
    Route::get('/create', 'CalendarEventController@create')->name('calendar_events.create');
    Route::post('/store', 'CalendarEventController@store')->name('calendar_events.store');
    Route::get('/', 'CalendarEventController@index')->name('calendar_events.index');
    Route::prefix('/{calendar_event}')->group(function () {
        Route::get('', 'CalendarEventController@show')->name('calendar_events.show');
        Route::get('/edit', 'CalendarEventController@edit')->name('calendar_events.edit');
        Route::put('', 'CalendarEventController@update')->name('calendar_events.update');
        Route::delete('', 'CalendarEventController@destroy')->name('calendar_events.destroy');
    });
});
Route::post('/save-fcm', 'NotificationController@saveFcmToken');
