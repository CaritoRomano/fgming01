<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Descripcion;
use Validator;

class EmpresaController extends Controller
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
            'inicio' => "",
            'empresa' => "active",
            'servicios' => "",
            'imagenes' => ""            
            );
        $descripciones = Descripcion::find(1);
        $datosEmpresa = Empresa::find($id);
        return view('backend.empresa.edit', ['seccionActiva' => $seccionActiva, 'datosEmpresa' => $datosEmpresa, 'descripciones' => $descripciones]);
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
            'nombre' => 'required|min:1|max:50',
            'mail' => 'required|max:50|email',
            'telefono' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'textoVision' => 'required',
            'textoMision' => 'required',
            'textoValores' => 'required'
        ]);
        if ($validator->fails()){
          return redirect()
                ->route('empresa.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        };

        $empresa = Empresa::find($id);
        $empresa->nombre = $request->nombre;
        $empresa->mail = $request->mail;
        $empresa->telefono = $request->telefono;
        $empresa->localidad = $request->localidad;
        $empresa->provincia = $request->provincia;
        $empresa->save();

        $descripciones = Descripcion::find($id);
        $descripciones->textoVision = $request->textoVision;
        $descripciones->textoMision = $request->textoMision;
        $descripciones->textoValores = $request->textoValores;
        $descripciones->save();
        return redirect()->route('inicio.edit', ['id' => 1]);  //vuelve a Inicio

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
