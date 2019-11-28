<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    public $timestamps = false;
    protected $fillable = [
        'emal' ,
        'name' ,
        'role' ,
        'password' ,
        'created_at'
    ];
    
    const ADMIN_ROLE = 1;
    const MANAGER_ROLE = 1;
    
    public static $role = [
        self::ADMIN_ROLE => 'Admin',
        self::MANAGER_ROLE => 'Manager',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
