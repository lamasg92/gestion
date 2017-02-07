<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [ 'client_id', 'user_id', 'payment_id', 'cupon', 'total'];


    public function scopeName($query, $number){
        //search with partial name
        if(trim($number)!= "") {
            $query->where('numero', 'LIKE', "%$number%");
        }
    }


    public function invoice_details(){
        return $this->hasMany(Invoice_Detail::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }


}
