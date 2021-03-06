<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;
use App\UILogs;

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
        $this->ui_logs = new UILogs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
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

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Role & Permission';
        $this->ui_logs->type_description = 'Successfully added role: '.ucwords($request->roleName);
        $this->ui_logs->save();

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
        $getPerm = $this->permissions->whereIn('id',$params['permissions'])->get();
        if($request->get('action') == "add"){
            $newRole = $this->role->where('id',$request->session()->get('roleID'))->first();
            /** Attaching permission in newly created role **/
            $newRole->attachPermissions($getPerm);
            $request->session()->forget('roleID');
        }
        else{
            $editRole = $this->role->where('id',$request->get('id'))->first();
            $this->permission_role->where('role_id',$request->get('id'))->delete();
            $editRole->attachPermissions($getPerm);
        }
        return 'success';
    }

    /**
     * Show permission for updating role
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function showPermission($id){
        $role_list = $this->permission_role->where('role_id',$id)->get();
        return response()->json($role_list);
    }

}


