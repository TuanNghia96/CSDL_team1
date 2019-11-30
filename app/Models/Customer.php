<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    
    public $timestamps = false;
    protected $fillable = [
        'email',
        'name',
        'avata_url',
        'password',
        'address',
        'phone',
        'role',
        'remember_token',
        'status',
        'created_at'
    ];
    
    const ADMIN_ROLE = 1;
    const MANAGER_ROLE = 2;
    const CUSTOMER_ROLE = 3;
    
    public static $role = [
        self::ADMIN_ROLE => 'Admin',
        self::MANAGER_ROLE => 'Manager',
        self::CUSTOMER_ROLE => 'Customer'
    ];
    
}
