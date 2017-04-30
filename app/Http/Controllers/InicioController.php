<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Descripcion;
use App\ImagenInicio;
use App\Servicio;
use Validator;

class InicioController extends Controller
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
        //
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
            'inicio' => "active",
            'empresa' => "",
            'servicios' => "",
            'imagenes' => ""            
            );
        $descripcion = Descripcion::find(1);
        $cantImagenes = ImagenInicio::count();
        $imagenes = ImagenInicio::orderBy('id', 'DESC')->paginate(10);
        $servicios = Servicio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('backend.inicio.edit', ['seccionActiva' => $seccionActiva, 'descripcion' => $descripcion, 'cantImagenes'=> $cantImagenes, 'imagenes' => $imagenes, 'servicios' => $servicios]);
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
            'textoInicio' => 'required|min:10'
        ]);
        if ($validator->fails()){
          return redirect()
                ->route('inicio.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        };

        $descripcion = Descripcion::find($id);
        $descripcion->textoInicio = $request->textoInicio;
        $descripcion->save();

        return redirect()->route('inicio.edit', ['id' => $id]);  
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
