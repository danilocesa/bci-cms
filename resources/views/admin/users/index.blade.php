@extends('admin.shared._master')
@section('title','User Management')
@section('styles')
   <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/iCheck/flat/green.css') }}" rel="stylesheet">
   <link href="{{ asset('css/pnotify.css') }}" rel="stylesheet">
   <link href="{{ asset('css/pnotify.buttons.css') }}" rel="stylesheet">
@endsection
@section('scripts')
   <script src="{{ asset('js/icheck.min.js') }}"></script>
   <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
   <script src="{{ asset('js/pnotify.js') }}"></script>
   <script src="{{ asset('js/pnotify.buttons.js') }}"></script>
   

<script>
  $(document).ready(function() {
  
    $('#datatable').dataTable();

    $('#role_datatable').dataTable();

    /** Add role action **/
    $('#add_role').click(function(){
      var $roleName = $('input[name="add_role"]').val();
      /** Add role validation **/
      if(!$('input[name="add_role"]').val()){
        new PNotify({
          title: 'Oh No!',
          text: 'Role name is required.',
          type: 'error',
          styling: 'bootstrap3'
        });
        return;
      }
      /** End add role validation **/

      /** Call ajax for add role post **/
        callAjax({method:'POST',url:'user-management/addRole',data:{roleName: $roleName, _token:'{{ csrf_token() }}' }},function(result){
          if(!result){
            new PNotify({
              title: 'Oh No!',
              text: 'Role name is already exist.',
              type: 'error',
              styling: 'bootstrap3'
            });
            return;
          }
          PNotify.removeAll();
          new PNotify({
            title: 'Success!',
            text: 'Role added.',
            type: 'success',
            styling: 'bootstrap3'
          });
          setTimeout(function(){ location.reload(); }, 2000);
        });
      /** End ajax add role **/
  
    });
    /** End add role action **/

  });
</script>
@endsection
@section('main-content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Admins</h3>
    </div>
  </div>

<div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Admins</h2>
         <button type="submit" class="btn btn-success pull-right"><i class="fa fa-user"></i> Add User</button>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p class="text-muted font-13 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
          </p>
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>$234,500</td>
              </tr>
          
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div> 
<!-- Roles -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Roles</h2>
            <div class="form-horizontal">
             <div class="form-group">
                <label class="col-sm-7 control-label">Role Name:</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="text" name="add_role" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success" id="add_role">Add Roles</button>
                    </span>
                  </div>
                </div>
            </div> 
            </div> 
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          @if(count($roles_list) < 1)
          <h2>No roles. Please add new role</h2>
          @else
          <table id="role_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Role Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles_list as $role)
              <tr>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->created_at }}</td>
                <td>{{ $role->updated_at}}</td>
                <td>Delete</td>
              </tr>
              @endforeach 
            </tbody>
          </table>
          @endif
        </div>
      </div>
    </div>
    </div> 
             
</div>
 	
@endsection