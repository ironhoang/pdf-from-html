<?php

Route::group([], function () {
    Route::get('/', 'User\IndexController@index')->name('index');
    Route::get('/image', 'User\IndexController@getImage')->name('image');
    Route::post('/image', 'User\IndexController@postImage')->name('post.image');
    Route::post('/', 'User\IndexController@pdf1')->name('index.post');

    Route::group(['middleware' => ['user.guest']], function () {
        Route::get('signin', 'User\AuthController@getSignIn')->name('signIn.get');
        Route::post('signin', 'User\AuthController@postSignIn')->name('signIn.post');
        Route::get('forgot-password', 'User\PasswordController@getForgotPassword')->name('forgetPassword.get');
        Route::post('forgot-password', 'User\PasswordController@postForgotPassword')->name('forgetPassword.post');
        Route::get('reset-password/{token}', 'User\PasswordController@getResetPassword')->name('resetPassword.get');
        Route::post('reset-password', 'User\PasswordController@postResetPassword')->name('resetPassword.post');
        Route::get('signup', 'User\AuthController@getSignUp')->name('signUp.post');
        Route::post('signup', 'User\AuthController@postSignUp')->name('signUp.post');

        /* NEW SERVICE AUTH ROOT */
    });

    Route::group(['middleware' => ['user.auth']], function () {
        Route::post('signout', 'User\AuthController@postSignOut')->name('signOut.post');
    });
});
