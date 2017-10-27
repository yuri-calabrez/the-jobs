<?php


Route::get('/', 'HomeController@index')->name('index');


Route::group(['prefix' => 'candidato'], function(){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.candidate');
    Route::get('/cadastrar', 'Auth\RegisterController@showRegistrationForm')->name('login.register.candidate');
});

Route::group(['prefix' => 'recrutador'], function(){
    Route::get('/login', 'Auth\LoginController@showRecruiterLoginForm')->name('login.recruiter');
    Route::get('/cadastrar', 'Auth\RegisterController@showRecruiterRegistrationForm')->name('login.register.recruiter');
});

Route::get('/esqueci-minha-senha', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
