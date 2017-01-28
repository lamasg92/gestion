<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nombre', 'apellido', 'direccion', 'telefono', 'email'];
}
