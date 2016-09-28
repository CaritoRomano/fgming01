<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mail\ContactoEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

	public function index(){
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "",
			'empresa' => "",
			'contacto' => "active"
		);
    	return view('homeController.contacto', ['seccionActiva' => $seccionActiva]);
    }

    public function store(Request $request){

    	//dd( $request->all());
    	$mensaje = 
    	Mail::to('romano.carolina90@gmail.com', 'nombremail')
		->cc('cc@example.com') /*copias a otros destinatarios*/
		/*->bcc('cc@example.com') copias ocultas a otros destinatarios*/
		->send(new ContactoEmail('unNombreReceptor'));

    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "",
			'empresa' => "",
			'contacto' => "active"
		);
    	return view('homeController.contacto', ['seccionActiva' => $seccionActiva]);
    }

}


