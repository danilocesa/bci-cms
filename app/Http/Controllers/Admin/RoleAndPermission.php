<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;

class RoleAndPermission extends Controller
{
    /** 
    * Initializing models
    *
    *
    */
    public function __construct(){
        $this->role = new Role;
        $this->permissions = new Permission;
        $this->permission_role = new PermissionRole;
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

        /** Save new role **/
        $this->role->name = $role_name;
        $this->role->display_name = ucwords($request->roleName);
        $this->role->save();
        
        $request->session()->put('roleID',$this->role->id);
        
        // $request->session()->put('roles', ['role_name'=>$role_name,'display_name'=>ucwords($request->roleName)]); //Store role name to session for attaching permissions

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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->role->where('id',$id)->delete();
        return response()->json(true);
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
        if(!$request->permissions){
            return 'error';
        }
        $params = array();
        parse_str($request->permissions, $params);
        
        $newRole = $this->role->where('id',$request->session()->get('roleID'))->first();
        $addPerm = $this->permissions->whereIn('id',$params['permissions'])->get();
        /** Attaching permission in newly created role **/
        $newRole->attachPermissions($addPerm);

        $request->session()->forget('roleID');

        return 'success';
    }

    /**
     * Attach permission to the role
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function showPermission($id){
        $role_list = $this->permission_role->where('role_id',$id)->get();
        return response()->json($role_list);
    }

}


