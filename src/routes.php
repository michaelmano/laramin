<?php

if (App::environment('local')) {
    // Only enque these routes if the application is in a local environment.
    Route::group([
        'prefix' => 'laramin',
        'as' => 'laramin',
    ], function () {
        Route::get('/', 'michaelmano\laramin\LaraminController@index')->name('index');
        Route::get('/sprite', 'michaelmano\laramin\LaraminController@sprite')->name('sprite');
    });
}
