<?php


Route::get('/', 'HomeController@index')->name('index');

//CANDIATO
Route::group(['prefix' => 'candidato'], function(){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.candidate');
    Route::get('/cadastrar', 'Auth\RegisterController@showRegistrationForm')
        ->name('login.register.candidate');
    Route::post('/cadastrar', 'Auth\RegisterController@registerCandidate')
        ->name('register.candidate');


    Route::group(['as' => 'candidate.', 'namespace' => 'Candidate', 'middleware' => ['auth', 'can:candidate']], function(){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});

//RECRUTADOR
Route::group(['prefix' => 'recrutador'], function(){
    Route::get('/login', 'Auth\LoginController@showRecruiterLoginForm')->name('login.recruiter');
    Route::get('/cadastrar', 'Auth\RegisterController@showRecruiterRegistrationForm')
        ->name('login.register.recruiter');
    Route::post('/cadastrar', 'Auth\RegisterController@registerRecruiter')
        ->name('register.recruiter');

    Route::group(['as' => 'recruiter.', 'namespace' => 'Recruiter', 'middleware' => ['auth', 'can:recruiter']], function(){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});
//Login
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/esqueci-minha-senha', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
