<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'stock', 'precio_unitario'];

    public function scopeName($query, $name){
        //search with partial name
        if(trim($name)!= "") {
            $query->where('nombre', 'LIKE', "%$name%");
        }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
