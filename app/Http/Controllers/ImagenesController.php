<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;
use App\Imagen;
use Validator;

class ImagenesController extends Controller
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
            'servicios' => "",
            'imagenes' => "active",
            'contacto' => ""
            );
        $imagenes = Imagen::orderBy('idServicio', 'ASC')->get();
        $servicios = Servicio::orderBy('id', 'ASC')->paginate(10);
        return view('backend.imagenes.index', ['seccionActiva' => $seccionActiva, 'imagenes' => $imagenes, 'servicios' => $servicios]);
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
            'servicios' => "",
            'imagenes' => "active",
            'contacto' => ""
            );
        $servicios = Servicio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('backend.imagenes.create', ['seccionActiva' => $seccionActiva, 'servicios' => $servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imagen' => 'required|image',
            'thumbnails' => 'required|image'
        ]);
        if ($validator->fails()){
            return redirect()
                ->route('imagenes.create')
                ->withErrors($validator)
                ->withInput();
        };

        $file = $request->file('imagen');
        $fileThumbnails = $request->file('thumbnails');        
        /*creo la imagen y el thumbnails*/
        $imagen = new Imagen();
        $imagen->idServicio = $request->id;
        $imagen->nombre = $file->getClientOriginalName();
        $imagen->nombreArchivo = '';
        $imagen->nombreThumbnails = $fileThumbnails->getClientOriginalName();
        $imagen->nombreArchivoThumbnails = '';
        $imagen->save();

        $servicio = Servicio::find($request->id);
        $path = public_path() . '/images/' . $servicio->nombre;
        $pathThumbnails = public_path() . '/images/thumbnails/' . $servicio->nombre;
        /*renombro la imagen y el thumbnails*/
        $nombreArchivo = $imagen->id . '_imagen_' . $servicio->nombre . '.' . $file->getClientOriginalExtension();
        $file->move($path, $nombreArchivo);
        $nombreArchivoThumbnails = $imagen->id . '_thumbnails_' . $servicio->nombre . '.' . $fileThumbnails->getClientOriginalExtension();
        $fileThumbnails->move($pathThumbnails, $nombreArchivoThumbnails);

        $imagen->nombreArchivo = $nombreArchivo;
        $imagen->nombreArchivoThumbnails = $nombreArchivoThumbnails;
        $imagen->save();
  
        return redirect()->route('imagenes.index');  //modificar
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
        $imagen = Imagen::find($id);
        $servicioImagen = $imagen->servicio;
        $servicios = Servicio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('backend.imagenes.edit', ['seccionActiva' => $seccionActiva, 'imagen' => $imagen, 'nombreServicioImagen' => $servicioImagen->nombre , 'servicios' => $servicios]);
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
        //
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
