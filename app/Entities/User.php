<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get the post that owns the comment.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * checks for users roles admin
     */
    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }


    public static function findByNameorUserName($term)
    {
        return static::select('id', 'name', 'username')
            ->where('name', 'LIKE', "%$term%")
            ->orWhere('username', 'LIKE', "%$term%")
            ->get();
    }
}
