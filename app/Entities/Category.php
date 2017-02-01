<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['nombre', 'descripcion'];


   public function scopeName($query, $name){
       //search with partial name
       if(trim($name)!= "") {
           $query->where('nombre', 'LIKE', "%$name%");
       }
   }

   public function articles(){
       return $this->hasMany(Article::class);
   }
}
