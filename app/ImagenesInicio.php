<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesInicio extends Model
{
    protected $table = "Imagenes";

  	protected $filllable = ['nombre', 'IdServicio', 'nombreArchivo'];
  	protected $guarded = ['id'];

	public function servicio()
  	{
  		return $this->hasOne('App\Servicio', 'id', 'idServicio');
  	}
}
