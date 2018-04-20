<?php

Route::group(['middleware' => 'admin'],function(){
    Route::get('/dashboard','Admin\AdminController@dashboard')->name('dashboard');

    /*manage role and users */
    Route::get('role-list','Admin/RolemanagenetController@roleList')->name('rolelist');
    Route::get('role-management','Admin/RolemanagenetController@assignrolemenu')->name('managerole');
    Route::post('role-management','Admin\RolemanagenetController@assignrolemenu')->name('managerole');
    Route::get('rolemenu/{role_id}','Admin\RolemanagenetController@getRolewisemenu')->name('rolemenu');

    /*user add remove and delete*/
    Route::get('user','Admin\UserController@index')->name('user');
    Route::get('create-user','Admin\UserController@create')->name('create-user');
    Route::post('create-user','Admin\UserController@store')->name('create-user');
    Route::post('edit-user','Admin\UserController@update')->name('edit-user');

});
Route::get('/','UserController@login')->name('login');
Route::get('user/logout','UserController@logout')->name('logout');
Route::post('user/signup','UserController@signup')->name('signup');

/*finding country and state list */
Route::get('api/get-state-list','APIController@getStateList');
Route::get('api/get-city-list','APIController@getCityList');
Route::get('api/country-and-codes/{name?}', 'APIController@countrycodes');

?>


