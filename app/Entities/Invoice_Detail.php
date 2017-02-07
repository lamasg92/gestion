<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice_Detail extends Model
{
    protected $table = 'invoice_details';

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
