<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'category_id', 'stock', 'precio_unitario'];

    public function scopeName($query, $name){
        //search with partial name
        if(trim($name)!= "") {
            $query->where('nombre', 'LIKE', "%$name%");
        }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function invoice_details(){
        return $this->belongsTo(Invoice_Detail::class);
    }

    public static function findByNameorDescription($term){
        return static::select('id', 'nombre', 'descripcion', 'category_id', 'precio_unitario')
            ->where('nombre', 'LIKE', "%$term%")
            ->orWhere('descripcion', 'LIKE', "%$term%")
            ->get();
    }

}
