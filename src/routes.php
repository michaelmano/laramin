<?php

if (App::environment('local')) {
    // Only enque these routes if the application is in a local environment.
    Route::get('/laramin', 'michaelmano\laramin\LaraminController@index')->name('index')->middleware('web');
}
Route::group(['middleware' => 'web'], function () {
    Route::post('/laramin/contact', 'michaelmano\laramin\LaraminController@contact')->name('laramin.contact')->middleware('auth');
});
