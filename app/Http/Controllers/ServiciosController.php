<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;
use App\Empresa;
use Validator;
use File;

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
            'inicio' => "",
            'empresa' => "",
            'servicios' => "active"
        );

        $servicios = Servicio::orderBy('id', 'DESC')->paginate(10);
        $datosEmpresa = Empresa::find(1);
        /*agrego descripcion larga truncada para mostrar*/
        foreach ($servicios as $servicio){
            if ($servicio->conDetalle){
                $texto=substr($servicio->descripcion, 0, 300);
                $index=strrpos($texto, " ");
                $texto=substr($texto, 0,$index); 
                $texto.="...";
                $servicio->descripMostrar = $texto;
            }
        }
                
        return view('backend.servicios.index', ['seccionActiva' => $seccionActiva, 'servicios' => $servicios, 'datosEmpresa' => $datosEmpresa]);
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
            'nombre' => 'required',
            'descripcionCorta' => 'required|max:550'
        ]);
        
        if ($validator->fails()){
            return redirect()
                ->route('servicios.index')
                ->withErrors($validator)
                ->withInput();
        };
        
        $file = $request->file('imagen');
            
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->nombreImagen = $file->getClientOriginalName();
        $servicio->nombreArchivo = '';
        $servicio->descripcion = $request->descripcion;
        $servicio->descripcionCorta = $request->descripcionCorta;
        ($request->conDetalle == 1) ? $request->conDetalle = 1 : $request->conDetalle = 0;
        $servicio->conDetalle = $request->conDetalle;
        $servicio->save();

        $path = public_path() . '/images/servicios';
        $nombreArchivo = $servicio->id .'imagenVista_' . $request->nombre . '.' . $file->getClientOriginalExtension();
        $file->move($path, $nombreArchivo);

        $servicio->nombreArchivo = $nombreArchivo;
        $servicio->save();

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
            'inicio' => "",
            'empresa' => "",
            'servicios' => "active",
            'imagenes' => ""
        );
        $servicio = Servicio::find($id);
        $datosEmpresa = Empresa::find(1);
        return view('backend.servicios.edit', ['seccionActiva' => $seccionActiva, 'servicio' => $servicio, 'datosEmpresa' => $datosEmpresa]);
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'descripcionCorta' => 'required|max:550'
        ]);
        
        if ($validator->fails()){
            return redirect()
                ->route('servicios.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        };
        
        $datosServicioGuardado = Servicio::find($id);
        $servicio = Servicio::find($id);

        /*si cambio la imagen, actualizo los datos*/
        if($request->file('imagen') <> null){
            $file = $request->file('imagen');
            $servicio->nombreImagen = $file->getClientOriginalName();
            $servicio->nombreArchivo = '';
        }
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->descripcionCorta = $request->descripcionCorta;
        ($request->conDetalle == 1) ? $request->conDetalle = 1 : $request->conDetalle = 0;
        $servicio->conDetalle = $request->conDetalle;
        $servicio->save();

        /*si cambio la imagen, guardo el archivo de la imagen*/
            if($request->file('imagen') <> null){
            $path = public_path() . '/images/servicios';
            $nombreArchivo = $servicio->id .'imagenVista_' . $request->nombre . '.' . $file->getClientOriginalExtension();
            $file->move($path, $nombreArchivo);

            $servicio->nombreArchivo = $nombreArchivo;
            $servicio->save(); 
        }

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
        $servicio = Servicio::find($id);
        File::delete(public_path() .'/images/servicios/' . $servicio->nombreArchivo); 
        /*File::delete(public_path() .'/images/servicios/' . $servicio->nombreArchivo); ELIMINAR TODAS LAS DEL SERVICIO*/
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
