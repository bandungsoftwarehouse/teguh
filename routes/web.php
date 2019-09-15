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
Route::middleware('throttle:60,1')
     ->group(function() {
	if(Request::has('reff')){
	  $refferal = Request::get('reff');
	  session(['refferal'=>$refferal]);
	}

	Route::get('/',function() {
	    return render('welcome');
	});
	Route::get('/verify',function() {
	    return render('auth.verify');
	});

	Route::get('/notif',function() {
	   $user = \App\User::first();
	   $user->notify(new \App\Notifications\NewUserRegistration);
	});

	Route::auth();
	Auth::routes(['verify'=>true]);
	Route::group([
	    'middleware' => ['auth','verified']
	],function(){
	    Route::get('/home', 'HomeController@index')->name('home')
                       ->middleware('cache.headers:private;etag');
	    Route::resource('/menu','MenuController');
	    Route::resource('/model','ModelController');
            Route::get('/p','ProductController@index');
	    Route::get('/file/{file}','FilesController@getFile');
	});

});
