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
use App\Mail\ContactoEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', ['uses' => 'FrontendController@view',
				'as'=> 'index' 
]);   /*se le asigna un nombre a la ruta*/

Route::get('/index', ['uses' => 'FrontendController@view',
				'as'=> 'index' 
]);

Route::get('/servicios', ['uses' => 'FrontendController@servicios',
				'as'=> 'servicios'  /*se le asigna un nombre a la ruta*/
]);

Route::get('/servicio/{id}', ['uses' => 'FrontendController@servicio',
				'as'=> 'servicio'  /*se le asigna un nombre a la ruta*/
]);

Route::get('/empresa', ['uses' => 'FrontendController@empresa',
				'as'=> 'empresa'  /*se le asigna un nombre a la ruta*/
]);

Route::resource('/contacto', 'MailController');

///////////////////////////////////////////////////////////////////////////
/////////////////////     BACKEND       ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/', ['uses' => 'BackendController@view',
				'as'=> 'backend'
	]);	

	Route::get('/backend', ['uses' => 'BackendController@view',
				'as'=> 'backend'
	]);	
	
	Route::resource('/empresa', 'EmpresaController');

	Route::resource('/servicios', 'ServiciosController');

	Route::get('/imagenes/create',['uses' => 'ImagenesController@create',
				'as'=> 'createimagen'  
	]);
	Route::resource('/imagenes', 'ImagenesController');
});


/*
Route::get('/contacto', ['uses' => 'HomeController@contacto',
				'as'=> 'contacto'  /*se le asigna un nombre a la ruta
]);

Route::resource('/enviarContacto', 'MailController');



//backend
Route::get('/admin', ['uses' => 'BackendController@view',
				'as'=> 'backend' 
]);

*/
Auth::routes();

Route::get('/home', 'HomeController@index'); 
