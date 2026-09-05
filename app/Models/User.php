<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; 
    
    protected $fillable = [
        'name',
        'username',
        'email',
        'telepon',
        'password',
        'role',
        'gambar',
        'last_login_at',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
}
