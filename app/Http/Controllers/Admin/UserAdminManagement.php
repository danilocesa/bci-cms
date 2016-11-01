<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\RoleUser;
use App\Permission;
use App\AdminsTB;
use App\UILogs;
use Yajra\Datatables\Datatables;
use Validator;
use Auth;


class UserAdminManagement extends Controller
{
    /** 
    * Initializing models
    *
    *
    */
    public function __construct(){
        $this->role = new Role;
        $this->role_admin = new RoleUser;
        $this->permissions = new Permission;
        $this->admins = new AdminsTB;
        $this->ui_logs = new UILogs;
        $this->logAction = $this->admins->where('id',auth()->user()->id)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->ui_logs->user_id = $this->logAction->id;
        // $this->ui_logs->name = $this->logAction->first_name.' '.$this->logAction->last_name;
        // $this->ui_logs->type = 'User Management';
        // $this->ui_logs->type_description = 'Viewed user page';
        // $this->ui_logs->save();
        return view('admin/users/index',['roles_list'=>$this->role->orderBy('updated_at','desc')->get(),'permissions'=>$this->permissions->all()]);
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
     * Create User.
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
        $this->admins->password = bcrypt($request->get('password'));
        $this->admins->activated = $request->get('status');
        $this->admins->permissions = $request->get('role');
        $this->admins->save();

        $this->admins->where('email',$request->get('email'))->first()->roles()->attach($request->get('role'));

        /** Log action **/
        $this->ui_logs->user_id = $this->logAction->id;
        $this->ui_logs->name = $this->logAction->first_name.' '.$this->logAction->last_name;
        $this->ui_logs->type = 'User Management';
        $this->ui_logs->type_description = 'Successfully created user: '.$request->get('firstname').' '.$request->get('lastname');
        $this->ui_logs->save();


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
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'status'  => 'required',
            'role'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = $this->admins->where('id',$id)->first();

        $this->role_admin->where('user_id',$user->id)->delete();

        $user->email = $request->get('email');        
        $user->first_name = $request->get('firstname');
        $user->last_name = $request->get('lastname');
        $user->password = bcrypt($request->get('password'));
        $user->activated = $request->get('status');
        $user->permissions = $request->get('role');
        $user->save();


        $user->roles()->attach($request->get('role'));

         /** Log action **/
        $this->ui_logs->user_id = $this->logAction->id;
        $this->ui_logs->name = $this->logAction->first_name.' '.$this->logAction->last_name;
        $this->ui_logs->type = 'User Management';
        $this->ui_logs->type_description = 'Successfully update user: '.$request->get('firstname').' '.$request->get('lastname');
        $this->ui_logs->save();


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
            
        $deletedUser = $this->admins->where('id',$id)->first();
        /** Log action **/
        $this->ui_logs->user_id = $this->logAction->id;
        $this->ui_logs->name = $this->logAction->first_name.' '.$this->logAction->last_name;
        $this->ui_logs->type = 'User Management';
        $this->ui_logs->type_description = 'Successfully deleted user: '.$deletedUser->first_name.' '.$deletedUser->last_name;
        $this->ui_logs->save();

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
                $actionHTML = '';
                if(Auth::user()->can('edit-user')){
                    $actionHTML .= '<span class="btn btn-xs btn-primary edit-user" data-id="'.$user->id.'"><i class="fa fa-lock"></i> Edit</span>';
                }
                if(Auth::user()->can('delete-user')){
                     $actionHTML .= '<span class="btn btn-xs btn-danger delete-user" data-id="'.$user->id.'"><i class="fa fa-trash"></i> Delete</span>';
                }
                if(!Auth::user()->can('edit-user') && !Auth::user()->can('delete-user')){
                    $actionHTML = 'Disabled';
                }
                return $actionHTML;
            })->make();

        // return Datatables::of(AdminsTB::query())->make(true);
    }




}
