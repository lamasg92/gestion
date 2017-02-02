<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
