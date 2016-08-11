<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;

class RoleAndPermission extends Controller
{
    private $newRole;
    /** 
    * Initializing models
    *
    *
    */
    public function __construct(){
        $this->role = new Role;
        $this->permissions = new Permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
        // return response()->json($this->role->all());
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
     * Store a newly created role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_name = str_slug($request->roleName,'-');
        $role = $this->role->where('name',$role_name)->first();
        if($role){ //Check for existing roles
            return response()->json(false);
        }

        $request->session()->put('roles', ['role_name'=>$role_name,'display_name'=>ucwords($request->roleName)]); //Store role name to session for attaching permissions

        return response()->json($request);
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
     * create a new permission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPermission(Request $request){

        // $this->permission->name         = 'contact-page';
        // $this->permission->display_name = 'View contact';
        // $this->permission->save();

        // $role->attachPermission($var);
    }

    /**
     * Attach permission to the role
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attachPermission(Request $request){
        /** Save new role **/
        $newRole = $this->role->name = $request->session()->get('roles')['role_name'];
        $newRole = $this->role->display_name = $request->session()->get('roles')['display_name'];
        $newRole = $this->role->save();

        $request->session()->forget('role_name');

        $editUser = new Permission();
$editUser->name         = 'edit-user2343sss';
$editUser->display_name = 'Edit Users'; // optional
// Allow a user to...
$editUser->description  = 'edit existing users'; // optional
$editUser->save();

        /** Attaching permission in newly created role **/
        $permissions = $this->permissions->where('id',1)->first();
        $newRole->attachPermission($editUser);
        // dd($newRole->perms()->sync(array($createPost->id));
        // $newRole->attachPermission($createPost);
        // $this->permission->name         = 'contact-page';
        // $this->permission->display_name = 'View contact';
        // $this->permission->save();
    }

}


