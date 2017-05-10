<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;
use App\Imagen;
use App\Empresa;
use Validator;
use File;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                ->route('imagenes.show',  ['id' => $request->idServicio])
                ->withErrors($validator)
                ->withInput();
        };

        $file = $request->file('imagen');
        $fileThumbnails = $request->file('thumbnails');        
        /*creo la imagen y el thumbnails*/
        $imagen = new Imagen();
        $imagen->idServicio = $request->idServicio;
        $imagen->nombre = $file->getClientOriginalName();
        $imagen->nombreArchivo = '';
        $imagen->nombreThumbnails = $fileThumbnails->getClientOriginalName();
        $imagen->nombreArchivoThumbnails = '';
        $imagen->pieDeFoto = $request->pieDeFoto;
        $imagen->save();

        $servicio = Servicio::find($request->idServicio);
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
  
        return redirect()->route('imagenes.show', ['id' => $request->idServicio]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seccionActiva = array(
            'inicio' => "",
            'empresa' => "",
            'servicios' => "active"
        );
        $servicio = Servicio::find($id);
        
        $tieneImagenes = (count($servicio->imagenes)>0);
        $datosEmpresa = Empresa::find(1);
     
        return view('backend.imagenes.show', ['seccionActiva' => $seccionActiva, 'servicio' => $servicio, 'datosEmpresa' => $datosEmpresa, 'tieneImagenes' => $tieneImagenes]);
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
            'inicio' => "",
            'empresa' => "",
            'servicios' => "active"
        );
        $imagen = Imagen::find($id);
        $servicioImagen = $imagen->servicio;
        $servicios = Servicio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $datosEmpresa = Empresa::find(1);
        return view('backend.imagenes.edit', ['seccionActiva' => $seccionActiva, 'imagen' => $imagen, 'nombreServicioImagen' => $servicioImagen->nombre , 'servicios' => $servicios, 'datosEmpresa' => $datosEmpresa]);
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
        $datosImagenGuardada = Imagen::find($id);
        $imagen = Imagen::find($id);
        $idServicio = $imagen->idServicio;
        /*si cambio la imagen, actualizo los datos*/
        if($request->file('imagen') <> null){
            $file = $request->file('imagen');
            $imagen->nombre = $file->getClientOriginalName();
            $imagen->nombreArchivo = '';
        }
        /*si cambio thumbnails, actualizo los datos */
        if($request->file('thumbnails') <> null){
            $fileThumbnails = $request->file('thumbnails');
            $imagen->nombreThumbnails = $fileThumbnails->getClientOriginalName(); 
            $imagen->nombreArchivoThumbnails = '';
        }

        $imagen->idServicio = $idServicio;
        $imagen->pieDeFoto = $request->pieDeFoto;
        $imagen->save();

        /*si cambio la imagen, guardo el archivo de la imagen*/
        if($request->file('imagen') <> null){
            $servicio = Servicio::find($idServicio);
            $path = public_path() . '/images/' . $servicio->nombre;
            $nombreArchivo = $imagen->id . '_imagen_' . $servicio->nombre . '.' . $file->getClientOriginalExtension(); 
            $file->move($path, $nombreArchivo);
            $imagen->nombreArchivo = $nombreArchivo;
            $imagen->save();
        }
        /*si cambio el thumbnails, guardo el archivo del thumbnails*/
        if($request->file('thumbnails') <> null){
            $servicio = Servicio::find($idServicio);
            $pathThumbnails = public_path() . '/images/thumbnails/' . $servicio->nombre;
            $nombreArchivoThumbnails = $imagen->id . '_thumbnails_' . $servicio->nombre . '.' . $fileThumbnails->getClientOriginalExtension();
            $fileThumbnails->move($pathThumbnails, $nombreArchivoThumbnails);
            $imagen->nombreArchivoThumbnails = $nombreArchivoThumbnails;
            $imagen->save();
        }
    
        return redirect()->route('imagenes.show', ['id' => $idServicio]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        $idServicio = $imagen->idServicio;
        File::delete(public_path() . '/images/thumbnails/' . $imagen->servicio->nombre . '/' . $imagen->nombreArchivoThumbnails); 
        File::delete(public_path() . '/images/' . $imagen->servicio->nombre . '/' . $imagen->nombreArchivo); 
        $imagen->delete();
        return redirect()->route('imagenes.show', ['id' => $idServicio]);
    }
}
