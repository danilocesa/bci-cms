@extends('admin.shared._master')
@section('title','Audit Trail')
@section('styles')
   <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/iCheck/flat/green.css') }}" rel="stylesheet">
@endsection
@section('scripts')
   <script src="{{ asset('js/icheck.min.js') }}"></script>
   <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

    <script>
      $(document).ready(function() {
         $('#logs_datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("web-admin/audit-trail/logs") }}',
            "order": [[ 3, 'desc' ]],
            columns: [
                {data: 0, name: 'name'},
                {data: 1, name: 'type'},
                {data: 2, name: 'type_description'},
                {data: 3, name: 'created_at'}
            ]
        });
      });
    </script>
@endsection
@section('main-content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Audit Trail</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
            <table id="logs_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Type Description</th>
                <th>Created Date</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
 	
@endsection

