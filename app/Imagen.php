<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
  protected $table = "Imagenes";

  protected $filllable = ['nombre', 'IdServicio', 'nombreArchivo'];
  protected $guarded = ['id'];

  /*public function categoria()
  {
    return $this->belongsTo('App\Servicio', 'idServicio'); /*relacion uno a muchos (inversa)
  }*/
  public function servicio()
  {
  	return $this->hasOne('App\Servicio', 'id', 'idServicio');
  }
}
