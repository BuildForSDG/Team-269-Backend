<?php

Route::middleware('auth')->group(function () {
    Route::post('logout', 'AuthenticationController@logout')->name('auth.logout');
    Route::post('refreshToken', 'AuthenticationController@refresh')->name('auth.refresh');
    Route::get('user', 'AuthenticationController@authUser')->name('auth.user');
    Route::put('resetPassword', 'AuthenticationController@resetPassword')->name('auth.resetPassword');
});
// Guest routes
Route::post('login', 'AuthenticationController@login')->name('auth.login');
Route::post('register', 'Auth\RegisterController@register')->name('auth.register');
