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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('layouts.site');
// });

Route::get('robots.txt', function() {

    // If on the live server, serve a nice, welcoming robots.txt.
    if (App::environment() == 'production')
    {
        RobotsTxt::addUserAgent('*');
        RobotsTxt::addSitemap('sitemap.xml');
    } else {
        // If you're on any other server, tell everyone to go away.
        RobotsTxt::addDisallow('*');
    }

    return Response::make(RobotsTxt::generate(), 200, array('Content-Type' => 'text/plain'));
});

Route::group(['middleware' => 'web'], function() {
	
	Route::get('/', ['uses'=>'IndexController@execute', 'as'=>'home']);
	Route::resource('slide','SlideController',['only'=>'index']);
	Route::resource('addotzyv', 'OtzyvController', ['only'=> 'store']);
	Route::resource('sendmsg', 'MsgController', ['only'=> 'store']);
	Route::resource('callback', 'CallbackController', ['only'=> 'store']);
	// Route::get('/slides', ['uses'=>'Slides@execute', 'as'=>'slides']);
	Route::get('/gallery', ['uses'=>'GalleryController@execute', 'as'=>'gallery']);
	Route::match(['get','post'], '/testimonials', ['uses'=>'TestimonialsController@execute', 'as'=>'testimonials']);
});