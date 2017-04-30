<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicio;
use App\ImagenInicio;
use Validator;
use File;

class ImagenesInicioController extends Controller
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
            'idServicio' => 'required'
        ]);
        if ($validator->fails()){
            return redirect()
                ->route('inicio.edit', ['id' => 1])
                ->withErrors($validator)
                ->withInput();
        };

        $file = $request->file('imagen');      
        /*creo la imagen*/
        $imagen = new ImagenInicio();
        $imagen->idServicio = $request->idServicio;
        $imagen->nombre = $file->getClientOriginalName();
        $imagen->nombreArchivo = '';
        $imagen->save();

        $servicio = Servicio::find($request->idServicio);
        $path = public_path() . '/images/carousel';
        /*renombro la imagen*/
        $nombreArchivo = $imagen->id . '_imagen_' . $servicio->nombre . '.' . $file->getClientOriginalExtension();
        $file->move($path, $nombreArchivo);

        $imagen->nombreArchivo = $nombreArchivo;
        $imagen->save();
  
        return redirect()->route('inicio.edit', ['id' => 1]);  
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
        //
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
        $imagen = ImagenInicio::find($id);
        File::delete(public_path() .'/images/carousel/' . $imagen->nombreArchivo);   
        $imagen->delete();
        return redirect()->route('inicio.edit', ['id' => 1]); 
    }
}
