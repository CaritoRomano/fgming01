<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;

class ServiciosController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seccionActiva = array(
            'empresa' => "",
            'servicios' => "active",
            'imagenes' => "",
            'contacto' => ""
            );
        $servicios = Servicio::orderBy('id', 'DESC')->paginate(10);

        return view('backend.servicios.index', ['seccionActiva' => $seccionActiva, 'servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seccionActiva = array(
            'empresa' => "",
            'servicios' => "active",
            'imagenes' => "",
            'contacto' => ""
            );
        return view('backend.servicios.create', ['seccionActiva' => $seccionActiva]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombreArchivo = 'imagenVista_' . $request->nombre . '.' . $file->getClientOriginalExtension();
            
            $path = public_path() . '/images/servicios';
            $file->move($path, $nombreArchivo);
            $servicio = new Servicio();
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->descripcionCorta = $request->descripcionCorta;
            $servicio->nombreImagen = $nombreArchivo;
            $servicio->save();
        }
        return redirect()->route('servicios.index');  //modificar
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccionActiva = array(
            'empresa' => "",
            'servicios' => "active",
            'imagenes' => "",
            'contacto' => ""
        );
        $servicio = Servicio::find($id);
        return view('backend.servicios.edit', ['seccionActiva' => $seccionActiva, 'servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDAR DATOS

        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();

        return redirect()->route('servicios.index');  //modificar
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
