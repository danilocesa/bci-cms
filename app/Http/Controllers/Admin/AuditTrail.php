<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Auth;
use App\UIlogs;
use App\AdminsTB;

class AuditTrail extends Controller
{
    public function __construct(){
        if(!Auth::user()->can('view-logs')){
            abort(404);
        }
        $this->adminsTB = new AdminsTB;
        $this->ui_logs = new UIlogs;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = $this->adminsTB->where('id',auth()->user()->id)->first();
        // $this->ui_logs->user_id = $user->id;
        // $this->ui_logs->name = $user->first_name.' '.$user->last_name;
        // $this->ui_logs->type = 'Audit Trail';
        // $this->ui_logs->type_description = 'Viewed audit trail';
        // $this->ui_logs->save();
        return view('admin\audit');

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
        //
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
    public function logsList()
    {
        $logs = UILogs::select(['name', 'type', 'type_description', 'created_at']);

        return Datatables::of($logs)->make();

        // return Datatables::of(AdminsTB::query())->make(true);
    }


}
