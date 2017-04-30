<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    protected $table = "Descripciones";

    protected $filllable = ['TextoInicio', 'TextoVision', 'TextoMision', 'TextoValores'];
    protected $guarded = ['id'];
}
