<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function view(){
    	$seccionActiva = array(
        	'index' => "active",
    		'servicios' => "",
			'empresa' => "",
			'contacto' => ""
			);
        return view('homeController.welcome', ['seccionActiva' => $seccionActiva]);
    }

    public function servicios(){
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "active",
			'empresa' => "",
			'contacto' => ""
		);
    	return view('homeController.servicios', ['seccionActiva' => $seccionActiva]);
    }

    public function servicio($id){
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "active",
			'empresa' => "",
			'contacto' => ""
		);
		
   		if ($id == 1) {
  			return view('homeController.diseno', ['seccionActiva' => $seccionActiva]);
		}elseif ($id == 2) {
        	return view('homeController.analisisFEM', ['seccionActiva' => $seccionActiva]);
    	}else{
    		return redirect()->action('HomeController@servicios');
       	}
    }

    public function empresa(){
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "",
			'empresa' => "active",
			'contacto' => ""
		);
    	return view('homeController.empresa', ['seccionActiva' => $seccionActiva]);
    }


}