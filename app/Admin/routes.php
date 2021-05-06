<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('site/slides', SlideController::class);
    $router->resource('site/headers', HeaderController::class);
    $router->resource('site/about', AboutController::class);
    $router->resource('site/aboutservices', AboutServicesController::class);
    $router->resource('site/tariffs', TariffsController::class);
    $router->resource('site/rooms', RoomsController::class);
    $router->resource('site/testimonials', TestimonialsController::class);
    $router->resource('site/messages', MessagesController::class);
    $router->resource('site/galleries', GalleriesController::class);

});
