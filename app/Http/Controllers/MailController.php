<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mail\ContactoEmail;
use Illuminate\Support\Facades\Mail;
use Session;

class MailController extends Controller
{

	public function index(){
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "",
			'empresa' => "",
			'contacto' => "active"
		);
    	return view('homeController.contacto', ['seccionActiva' => $seccionActiva, 'mensaje' => '']);
    }

    public function store(Request $request){

    	/*dd( $request->all()); */

    	Mail::to('contacto@fgmingenieria.com.ar')
		->cc('g-galarraga29@hotmail.com') /*copias a otros destinatarios*/
		/*->bcc('cc@example.com') copias ocultas a otros destinatarios*/
		->send(new ContactoEmail($request['nombre'], $request['email'], $request['mensaje']));


        /*para redireccionar*/    
    	$seccionActiva = array(
        	'index' => "",
    		'servicios' => "",
			'empresa' => "",
			'contacto' => "active"
		);

    	return view('homeController.contacto', ['seccionActiva' => $seccionActiva, 'mensaje' => 'exito']);
    }

}


