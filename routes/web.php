<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', ['uses' => 'HomeController@view',
				'as'=> 'index' 
]);   /*se le asigna un nombre a la ruta*/

Route::get('/index', ['uses' => 'HomeController@view',
				'as'=> 'index' 
]);

Route::get('/servicios', ['uses' => 'HomeController@servicios',
				'as'=> 'servicios'  /*se le asigna un nombre a la ruta*/
]);

Route::get('/servicio/{id}', ['uses' => 'HomeController@servicio',
				'as'=> 'servicio'  /*se le asigna un nombre a la ruta*/
]);

Route::get('/empresa', ['uses' => 'HomeController@empresa',
				'as'=> 'empresa'  /*se le asigna un nombre a la ruta*/
]);

Route::get('/contacto', ['uses' => 'HomeController@contacto',
				'as'=> 'contacto'  /*se le asigna un nombre a la ruta*/
]);