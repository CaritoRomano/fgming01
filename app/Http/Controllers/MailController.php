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
        $destinatarios_temp= explode(',', env('ADMIN_EMAILS'));
        
        $destinatarios = [];
        foreach($destinatarios_temp as $key => $emailDest){
                $ua = [];
                $ua['email'] = $emailDest;
                $ua['name'] = 'admin';
                $destinatarios[$key] = (object)$ua;
        }
        //dd($destinatarios);
    	Mail::to('contacto@fgmingenieria.com.ar')
		->cc($destinatarios)/*copias a otros destinatarios*/
		 /*->bcc($cc)copias ocultas a otros destinatarios*/
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

