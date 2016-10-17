@extends('admin.shared._master')
@section('title', 'Clients')
@section('styles')
  <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pnotify.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pnotify.buttons.css') }}" rel="stylesheet">
  <style>
    .thumbnail{height:100%!important;}
      #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    height:24px;
}
#progress-wrp .progress-bar{
    height: 20px;
    border-radius: 3px;
    background-color: #1ABB9C;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}

#progress-port {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    height:24px;
}
#progress-port .progress-bar{
    height: 20px;
    border-radius: 3px;
    background-color: #1ABB9C;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-port .status{
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}
  </style>
@endsection
@section('main-content')

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">

        <h2><span class="fa fa-file-image-o"></span> Sub-clients</h2>
        <div class="clearfix"></div>
        <a href="{{ url('web-admin/page-management/clients') }}" class="btn btn-info" >Back</a>
        @if(count($sub_clients) < 11 )
         <button type="submit" class="btn btn-success pull-right" id="subclient-add-up">Add Image</button>
        @endif 
         <input type="file" name="subclient_image" class="subclient-file-up" data-id="{{ Request::segment(4) }}" />
        <div class="clearfix"></div>

      </div>
      <div class="x_content">
        <div class="row">
        <div id="progress-port"><div class="progress-bar"></div ><div class="status">0%</div></div>
        @if(count($sub_clients) > 0 )
          @foreach($sub_clients as $sc)
           <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="{{ asset('images/clients/sub-clients/'.$sc->subclient_image) }}" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="{{ url('web-admin/page-management/subclient-videos/'.$sc->sub_clients_id) }}"  data-toggle="tooltip" data-placement="left" title="" data-original-title="Video link" ><i class="fa fa-link"></i></a>
                    <a href="{{ url('web-admin/page-management/delete-subclients/'.$sc->sub_clients_id) }}"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" ><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
         @else
         <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            No print ads available
          </div>

         @endif 


        </div>
      </div>
    </div>
  </div>
</div>
@endsection 


@section('scripts')
<script src="{{ asset('js/pnotify.js') }}"></script>
<script>

$(document).ready(function(){
    var progress_bar_id     = '#progress-wrp';
    var progress_port_id     = '#progress-port';
    $(progress_bar_id).hide();
    $(progress_port_id).hide();
    $('.subclient-file-up').hide();

    //Trigger hidden input file
    $('#subclient-add-up').click(function(){
      $('.subclient-file-up').click();
    });


    $('.subclient-file-up').change(function(event){
        var $self = $(this);
        var input = $(event.currentTarget);
        var file = input[0].files[0];

        if(file.type.match('image.*') == null){
          new PNotify({
            title: 'Oh No!',
            text: 'Please upload image only.',
            type: 'error',
            addclass: "stack-bottomright",
            styling: 'bootstrap3',
            buttons: { sticker: false }
          });
          return false;
        }  

        if(file.size > 3145728){
            new PNotify({
              title: 'Oh No!',
              text: 'Maximum of 3MB only.',
              type: 'error',
              addclass: "stack-bottomright",
              styling: 'bootstrap3',
              buttons: { sticker: false }
            });
            return false;
        }
    
        var myFormData = new FormData();
        $(progress_port_id).show();
        myFormData.append('subclient_image', file);
        myFormData.append('_token', '{{ csrf_token() }}');
        myFormData.append('page_content_id', $self.data('id'));

        $.ajax({
          url: '{{ url("web-admin/page-uploads") }}' ,
          type: 'POST',
          processData: false, // important
          contentType: false, // important
          dataType : 'json',
          data: myFormData,
          success:function(result){
            console.log(result);
          },
          xhr: function(){
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
                xhr.upload.addEventListener('progress', function(event) {
                    var percent = 0;
                    var position = event.loaded || event.position;
                    var total = event.total;
                    if (event.lengthComputable) {
                        percent = Math.ceil(position / total * 100);
                    }
                    $(progress_port_id +" .progress-bar").css("width", + percent +"%");
                    $(progress_port_id + " .status").text(percent +"%");
                }, true);
            }
            return xhr;
          },
          mimeType:"multipart/form-data"
        }).done(function(res){
          $(progress_port_id).hide();
          location.reload();
        });

    });

});
</script>

@endsection

