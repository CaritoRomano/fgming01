<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenInicio extends Model
{
    protected $table = "ImagenesInicio";

  	protected $filllable = ['nombre', 'IdServicio', 'nombreArchivo'];
  	protected $guarded = ['id'];

	public function servicio()
  	{
  		return $this->hasOne('App\Servicio', 'id', 'idServicio');
  	}
}
