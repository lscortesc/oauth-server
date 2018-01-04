<?php

/**
 * Oauth Routes
 *
 * Login
 * Logout
 * Refresh Token
*/

Route::post('/login', 'ProxyController@login');
Route::post('/logout', 'ProxyController@logout');
Route::post('/login/refresh', 'ProxyController@refresh');