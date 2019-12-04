<?php

namespace App\Models;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    
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
    const CUSTOMER_ROLE = 2;
    
    public static $role = [
        self::ADMIN_ROLE => 'Admin',
        self::CUSTOMER_ROLE => 'Customer'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * get list of user
     *
     * @param array
     * @return User
     */
    public function getList($input)
    {
        $builder = $this->orderBy('created_at');
        if (isset($input['name'])) {
            $builder->where('name', 'LIKE', '%' . $input['name'] . '%');
        }
        if (isset($input['email'])) {
            $builder->where('email', 'LIKE', '%' . $input['email'] . '%');
        }
        if (isset($input['phone'])) {
            $builder->where('phone', '=', $input['phone']);
        }
        if (isset($input['address'])) {
            $builder->where('address', 'LIKE', '%' . $input['address'] . '%');
        }
        if (isset($input['role'])) {
            $builder->where('role', '=', $input['role']);
        }
        if (isset($input['start']) || isset($request['end']) ) {
//            $builder->where('name', 'LIKE', '%' . $input['name'] . '%');
        }
        return $builder->paginate();
    }
    
    public function storeData($request)
    {
        $input = $request->all();
        
        $filePart = 'upload/admin';
        if ($request->hasFile('avata_url')) {
            
            $file = $request->avata_url;
            $file->move($filePart, $file->getClientOriginalName());
        }
        $input['avata_url'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        $input['role'] = 1;
        $input['password'] = \Hash::make($input['password']);
        $input['created_at'] = Carbon::now();
        return $this->create($input);
    }
    
    /**
     * update user data
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return mixed
     */
    public function updateData($request, $id)
    {
        $input = $request->all();
        $filePart = 'upload/admin';
        if ($request->hasFile('avata_url')) {
            
            $file = $request->avata_url;
            $file->move($filePart, $file->getClientOriginalName());
            $input['avata_url'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        } else {
            unset($input['avata_url']);
        }
        $input['role'] = 1;
        
        // check input have password
        if (isset($input['password'])) {
            $input['password'] = \Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        return $this->find($id)->update($input);
    }
    
    /**
     * relationship to feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks()
    {
        return $this->hasMany(\App\Models\Feedback::class);
    }
    
    /**
     * relationship to order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }
    
}
