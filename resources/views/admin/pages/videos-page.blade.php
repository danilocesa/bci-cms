@extends('admin.shared._master')
@section('title', 'Video Links')
@section('styles')
  <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pnotify.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pnotify.buttons.css') }}" rel="stylesheet">
@endsection
@section('main-content')
 <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Video links</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ $title }}</h2>
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Video link:</label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <input type="text" name="video_link" class="form-control">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-success" id="add_video_link">Add link</button>
                            </span>
                          </div>
                        </div>
                      </div> 
                    </div> 

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     @if(count($videos) > 0)
                       <table id="video_datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Thumbnail</th>
                              <th>Video Link</th>
                              <th>Created Date</th>
                              <th>Updated Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($videos as $v)
                            <tr>
                              <td> <img src=""><?php 
                                              $parts = parse_url($v->video_link);
                                      
                                              dump($parts);
                                              ?>  </td>
                              <td>{{ $v->video_link }}</td>
                              <td>{{ $v->created_at }}</td>
                              <td>{{ $v->updated_at}}</td>
                              <td  data-id="{{ $v->id }}" >
                                <button type="button" class="btn btn-info btn-xs edit-video"><i class="fa fa-edit"></i>  Edit</button>
                                <button type="button" class="btn btn-danger btn-xs delete-video"><i class="fa fa-trash"></i>  Delete</button></td>
                            </tr>
                            @endforeach 
                          </tbody>
                        </table>
                     @else
                      <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        No videos available
                      </div>
                     @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection 


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script src="{{ asset('js/pnotify.js') }}"></script>
<script src="{{ asset('js/pnotify.buttons.js') }}"></script>
<script src="{{ asset('js/pnotify.confirm.js') }}"></script>
<script type="text/javascript">
  $('#video_datatable').dataTable();
  $('#add_video_link').click(function(){
      var $videoLink = $('input[name="video_link"]').val();
      /** Add video link validation **/
      if(!$videoLink){
        new PNotify({
          title: 'Oh No!',
          text: 'Video link is required.',
          type: 'error',
          addclass: "stack-bottomright",
          styling: 'bootstrap3',
          buttons: { sticker: false }
        });
        return;
      }
      /** End add role validation **/

      /** Call ajax for add role post **/
        callAjax({method:'POST',url:"{{ url('web-admin/page-management/save-video') }}",data:{id:'{{ Request::segment(4) }}', videoLink: $videoLink, _token:'{{ csrf_token() }}' }},function(result){
          console.log(result);
          // if(!result){
          //   new PNotify({
          //     title: 'Oh No!',
          //     text: 'Role name is already exist.',
          //     type: 'error',
          //     styling: 'bootstrap3'
          //   });
          //   return;
          // }
          PNotify.removeAll();
          new PNotify({
            title: 'Success!',
            text: 'Video link added.',
            type: 'success',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          // $('#modal-perm-title').text('Add Permissions');
          // $('#addPermission').modal({backdrop: 'static', keyboard: false});
          setTimeout(function(){ location.reload(); }, 2000);
        });
      /** End ajax add role **/
    });
    /** End add role action **/



</script>
@endsection
