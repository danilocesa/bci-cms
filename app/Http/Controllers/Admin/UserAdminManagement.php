<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\AdminsTB;
use Yajra\Datatables\Datatables;
use Validator;


class UserAdminManagement extends Controller
{
    /** 
    * Initializing models
    *
    *
    */
    public function __construct(){
        $this->role = new Role;
        $this->permissions = new Permission;
        $this->admins = new AdminsTB;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin\users\index',['roles_list'=>$this->role->orderBy('updated_at','desc')->get(),'permissions'=>$this->permissions->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins,email',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'gender'   => 'required|',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'status'  => 'required',
            'role'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $this->admins->email = $request->get('email');
        $this->admins->first_name = $request->get('firstname');
        $this->admins->last_name = $request->get('lastname');
        $this->admins->gender = $request->get('gender');
        $this->admins->password = bcrypt($request->get('password'));
        $this->admins->activated = $request->get('status');
        $this->admins->permissions = $request->get('role');
        $this->admins->save();

        $this->admins->where('email',$request->get('email'))->first()->roles()->attach($request->get('role'));

        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->admins->where('id',$id)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'gender'   => 'required|',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'status'  => 'required',
            'role'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = $this->admins->where('id',$id)->first();

        $user->email = $request->get('email');        
        $user->first_name = $request->get('firstname');
        $user->last_name = $request->get('lastname');
        $user->gender = $request->get('gender');
        $user->password = bcrypt($request->get('password'));
        $user->activated = $request->get('status');
        $user->permissions = $request->get('role');
        $user->save();

        //Change permission also


        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->admins->where('id',$id)->delete();
        return response()->json(true);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userList()
    {
        $users = AdminsTB::select(['id','first_name', 'last_name', 'activated', 'created_at']);

        return Datatables::of($users)->addColumn('action', function ($user) {
                return '<span class="btn btn-xs btn-primary edit-user" data-id="'.$user->id.'"><i class="fa fa-lock"></i> Edit</span><span class="btn btn-xs btn-danger delete-user" data-id="'.$user->id.'"><i class="fa fa-trash"></i> Delete</span>';
            })->make();

        // return Datatables::of(AdminsTB::query())->make(true);
    }




}
