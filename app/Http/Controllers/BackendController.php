<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackendController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $seccionActiva = array(
        	'empresa' => "active",
    		'servicios' => "",
			'imagenes' => "",
			'contacto' => ""
			);
        return view('backend.backend', ['seccionActiva' => $seccionActiva]);
    }

}
