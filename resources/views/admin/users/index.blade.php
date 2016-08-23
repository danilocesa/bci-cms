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
   <script src="{{ asset('js/pnotify.confirm.js') }}"></script>
   <script src="{{ asset('js/parsley.min.js') }}"></script>
   

<script>
  var $editID = null;
  $(document).ready(function() {
  

    $('#user_datatable').dataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("web-admin/user-management/users") }}',
        columns: [
            {data: 0, name: 'id'},
            {data: 1, name: 'first_name'},
            {data: 2, name: 'last_name'},
            {data: 3, name: 'activated'},
            {data: 4, name: 'created_at'},
            {data: 5, name: 'action'}

        ]
    });

    $('#role_datatable').dataTable();
    $('#close-permissions').hide();

    /** Add role action **/
    $('#add_role').click(function(){
      var $roleName = $('input[name="add_role"]').val();
      /** Add role validation **/
      if(!$('input[name="add_role"]').val()){
        new PNotify({
          title: 'Oh No!',
          text: 'Role name is required.',
          type: 'error',
          addclass: "stack-bottomright",
          styling: 'bootstrap3',
          buttons: { sticker: false }
        });


        return;
      }
      /** End add role validation **/

      /** Call ajax for add role post **/
        callAjax({method:'POST',url:'role-and-permission',data:{roleName: $roleName, _token:'{{ csrf_token() }}' }},function(result){
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
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          $('#modal-perm-title').text('Add Permissions');
          $('#addPermission').modal({backdrop: 'static', keyboard: false});
          // setTimeout(function(){ location.reload(); }, 2000);
        });
      /** End ajax add role **/
    });
    /** End add role action **/

    /** Add permission action **/
    $('#permissions-action').click(function(){
      var $permAction = $(this).data('action');
      if(!$('input[name="permissions[]"').serialize()){
          new PNotify({
            title: 'Oh No!',
            text: 'Permission is required.',
            type: 'error',
            addclass: "stack-bottomright",
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          return;
      }
      
      callAjax({method:'POST',url:'role-and-permission/attach-permission',data:{permissions:$('input[name="permissions[]"').serialize(),action:$(this).data('action') , id: $editID ,_token:'{{ csrf_token() }}' }},function(result){
        if(result == 'error'){
          new PNotify({
            title: 'Oh No!',
            text: 'Permission is required.',
            type: 'error',
            addclass: "stack-bottomright",
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          return;
        } 
        if($permAction == "add"){ //add permissions
          new PNotify({
            title: 'Success!',
            text: 'Permission added. Reloading list...',
            type: 'success',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
        }
        else{ //edit permisssions
           new PNotify({
            title: 'Success!',
            text: 'Role edited. Reloading list...',
            type: 'success',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
        }  
        $('#permissions-action').prop('disabled',true);
        setTimeout(function(){ location.reload(); }, 1300);
      });
    });
    /** End add permission action **/

    /** Delete role action **/
    $('.delete-role').click(function(){
     var $id = $(this).closest('td').data('id');
     (new PNotify({
        title: 'Confirmation Needed',
        text: 'Are you sure?',
        type: 'error',
        styling: 'bootstrap3',
        icon: 'glyphicon glyphicon-question-sign',
        hide: false,
        confirm: {
            confirm: true
        },
        buttons: { sticker: false, closer: false },
        history: {
          history: false
        },
        addclass: 'stack-modal',
        stack: {
            'dir1': 'down',
            'dir2': 'right',
            'modal': true
        }
      })).get().on('pnotify.confirm', function() {
        callAjax({method:'POST',url:'role-and-permission/'+$id,data:{_method: 'delete', _token:'{{ csrf_token() }}' }},function(result){
          new PNotify({
            title: 'Deleted!',
            text: 'Role deleted. Reloading list...',
            type: 'error',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          $('.delete-role').prop('disabled',true);
          $('.edit-role').prop('disabled',true);
          setTimeout(function(){ location.reload(); }, 1000);
        });
      }).on('pnotify.cancel', function() { $('.ui-pnotify-modal-overlay').remove(); });
    });  

    /** End delete role action **/

    /** Edit Permission **/
    $('.edit-role').click(function(){
      $editID = $(this).closest('td').data('id');
      $('#permissions-action').data('action','edit');
      callAjax({method:'GET',url:'role-and-permission/show-permission/'+$editID},function(result){
        $.each(result,function(index,el){
          $('.permissions[value="'+el.permission_id+'"]').iCheck('check');
        });
      });
      $('#modal-perm-title').text('Edit Permissions');
      $('#close-permissions').show();
      $('#addPermission').modal();
    });  

    /** End edit permission **/

    /** Add User **/
      $('#user-action').click(function(){
         callAjax({method:'POST',url:'user-management',data:{formdata:$('#addUser-form').serialize(),_token:'{{ csrf_token() }}' }},function(result){
          console.log(result);
         });


        // $("#addUser-form :input").each(function(){
        //   var input = $(this);
        //   console.log(input.attr('name'));
        //   console.log(input.attr('required'));
        // });
        // console.log($form);

      });


    /** End add user **/
  });
</script>
@endsection
@section('main-content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users</h3>
    </div>
  </div>

<div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Users</h2>
         <button type="submit" class="btn btn-success pull-right" data-toggle="modal" data-target=".bs-addUser-modal-sm"><i class="fa fa-user"></i> Add User</button>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="user_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Action</th>
              </tr>
            </thead>
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
                <td  data-id="{{ $role->id }}" ><button type="button" class="btn btn-info btn-xs edit-role"><i class="fa fa-edit"></i>  Edit</button><button type="button" class="btn btn-danger btn-xs delete-role"><i class="fa fa-trash"></i>  Delete</button></td>
              </tr>
              @endforeach 
            </tbody>
          </table>
          @endif
        </div>
      </div>
    </div>
    </div>   

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addPermission">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-permissions"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modal-perm-title"></h4>
      </div>
      <div class="modal-body">
       <ul class="to_do">
        @foreach($permissions  as $permission)
          <li>
            <p><input type="checkbox" class="flat permissions" value="{{ $permission->id }}" name="permissions[]" > {{ $permission->display_name }} </p>
          </li>
        @endforeach 
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="permissions-action" data-action="add" >Save changes</button>
      </div>

    </div>
  </div>  
  </div> 


<div class="modal fade bs-addUser-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addUser-modal">
<div class="modal-dialog modal-md">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-permissions"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modal-addUser-title">Add User</h4>
    </div>
    <div class="modal-body">
    <div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>
      <form id="addUser-form" class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle-name">Middle Name
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="middle-name" name="middle-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender" >Gender <span class="required">*</span> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="radio" class="flat" name="gender" value="m" checked="checked" / > Male
            <input type="radio" class="flat" name="gender" value="f" /> Female
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" id="confirm-password" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
         <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role <span class="required">*</span>
          </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" tabindex="-1" name="role">
                <option value="">Please select role</option>
                @foreach($roles_list as $role)
                  <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                @endforeach 
                
              </select>
          </div>
        </div>                  
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="user-action" data-action="add" >Save</button>
    </div>

  </div>
</div>  
</div> 

</div>
 	
@endsection