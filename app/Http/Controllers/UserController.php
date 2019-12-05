<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    
    /**
     * CustomerController constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->user->getList($request->all());
        $role = User::$role;
        return view('admin.users.index', compact(['users', 'role']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = User::$role;
        return view('admin.users.create', compact('role'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        
        $this->user->storeData($request);
        return redirect($request->url_back ?? route('admin.users.index'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $role = User::$role;
        return view('admin.users.show', compact(['user', 'role']));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.users.edit', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param UsersStoreRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersStoreRequest $request, $id)
    {
        $this->user->updateData($request, $id);
        return redirect($request->url_back ?? route('admin.users.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->role == User::ADMIN_ROLE) {
            $user->delete();
        } elseif ($user->status == 1) {
            $user->update(['status' => 0]);
        } else {
            $user->update(['status' => 1]);
        }
        return back();
    }
}
