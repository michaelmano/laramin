<?php

if (App::environment('local')) {
    // Only enque these routes if the application is in a local environment.
    Route::get('/laramin', 'michaelmano\laramin\LaraminController@index')->name('index')->middleware('web');
    Route::get('/laramin/login', 'michaelmano\laramin\LaraminController@login')->name('login')->middleware('web');
}
