<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nombre', 'apellido', 'direccion', 'telefono', 'email'];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function scopeName($query, $name){
        //search with partial name
        if(trim($name)!= "") {
            $query->where('nombre', 'LIKE', "%$name%");
        }
    }

    public static function findByNombreoEmail($term){
        return static::select('id', 'nombre', 'apellido', 'direccion', 'email')
            ->where('nombre', 'LIKE', "%$term%")
            ->orWhere('email', 'LIKE', "%$term%")
            ->get();
    }
}
