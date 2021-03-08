<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/set_language/{lang}', 'Controller@setLanguaje')->name( 'set_language');
Auth::routes();
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/', function () {
    return view('welcome');
});



 Route::get('/', 'HomeController@index')->name('home');

 Route::get('/images/{path}/{attachment}', function($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if(File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::group(['prefix' => 'courses'], function () {
    Route::group(['middleware' => ['auth']], function() {
		Route::get('/subscribed', 'CourseController@subscribed')->name('courses.subscribed');
		Route::get('/{course}/inscribe', 'CourseController@inscribe')->name('courses.inscribe');
		Route::post('/add_review', 'CourseController@addReview')->name('courses.add_review');

		Route::group(['middleware' => [sprintf('role:%s', \App\Role::TEACHER)]], function () {
			Route::resource('courses', 'CourseController');
		});
	});
	Route::get('/{course}', 'CourseController@show')->name('courses.detail');
});


 
	Route::group(["prefix" => "subscriptions"], function() {
		Route::get('/plans', 'SubscriptionController@plans')
		     ->name('subscriptions.plans');
        Route::post('/process_subscription', 'SubscriptionController@processSubscription')
		->name('subscriptions.process_subscription');
		Route::get('/admin', 'SubscriptionController@admin')
		     ->name('subscriptions.admin');
	});

	 
 