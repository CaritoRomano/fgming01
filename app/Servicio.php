<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "Servicios";

    protected $filllable = ['Nombre', 'nombreImagen', 'DescripcionCorta', 'Descripcion', 'ConDetalle'];
    protected $guarded = ['id'];

    public function imagenes()
    {
    	return $this->hasMany('App\Imagen', 'idServicio');/*relacion uno a muchos*/
    }

}
