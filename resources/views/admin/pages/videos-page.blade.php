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
                <a href="#" class="btn btn-info" >Back</a>
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
                              <td> <img src="http://img.youtube.com/vi/<?php 
                                              $query = parse_url($v->video_link,PHP_URL_QUERY);
                                              parse_str($query, $params);
                                              echo $params['v'];
                                              ?>/default.jpg">  </td>
                              <td> <a href="{{ $v->video_link }}" target="_blank">{{ $v->video_link }}</a> </td>
                              <td>{{ $v->created_at }}</td>
                              <td>{{ $v->updated_at}}</td>
                              <td  data-id="{{ $v->page_video_id }}" >
                                <!--<button type="button" class="btn btn-info btn-xs edit-video"><i class="fa fa-edit"></i>  Edit</button>-->
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
  /** Add video link action **/
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
      var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
      if(!regexp.test($videoLink)){
        new PNotify({
          title: 'Oh No!',
          text: 'Video link must be a link.',
          type: 'error',
          addclass: "stack-bottomright",
          styling: 'bootstrap3',
          buttons: { sticker: false }
        });
        return;
      }
      /** End add video link validation **/

      /** Call ajax for add video link post **/
        callAjax({method:'POST',url:"{{ url('web-admin/page-management/save-video') }}",data:{id:'{{ Request::segment(4) }}', videoLink: $videoLink, _token:'{{ csrf_token() }}' }},function(result){
          PNotify.removeAll();
          new PNotify({
            title: 'Success!',
            text: 'Video link added.',
            type: 'success',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          setTimeout(function(){ location.reload(); }, 2000);
        });
      /** End ajax add video link **/
  });
  /** End add video link action **/


  /** Delete video link action **/
  $('.delete-video').click(function(){
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
        callAjax({method:'GET',url:'{{ url("web-admin/page-management/delete-video") }}/'+$id},function(result){
          new PNotify({
            title: 'Deleted!',
            text: 'Video link deleted. Reloading list...',
            type: 'success',
            addclass: "stack-bottomright", 
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          $('.delete-video').prop('disabled',true);
          $('.edit-video').prop('disabled',true);
          setTimeout(function(){ location.reload(); }, 1000);
        });
      }).on('pnotify.cancel', function() { $('.ui-pnotify-modal-overlay').remove(); });
  });  
  /** End delete video link action **/


</script>
@endsection
