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
        $formdata = array();
        parse_str($request->get('formdata'), $formdata);
        return response()->json($formdata);
        $validator = Validator::make($formdata,  [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email'    => 'required|email',
            'gender' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'role'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }else{
            return response()->json($request);
        }
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Status</a><a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-lock"></i> Role</a><a href="#edit-'.$user->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
            })->make();

        // return Datatables::of(AdminsTB::query())->make(true);
    }




}
