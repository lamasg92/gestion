<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice_Detail extends Model
{
    //protected $table = 'invoice_details';
    protected $fillable = ['invoice_id', 'cantidad', 'article_id', 'precio', 'total_line'];


//    public function invoice(){
//        return $this->belongsTo(Invoice::class);
//    }

    public function articles(){
        return $this->belongsTo(Article::class);
    }
}
