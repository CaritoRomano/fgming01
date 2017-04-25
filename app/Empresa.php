<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "Empresa";

    protected $filllable = ['nombre', 'mail', 'telefono', 'localidad', 'provincia', 'updated_at', 'created_at'];
    protected $guarded = ['id'];
}
