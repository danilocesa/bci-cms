@extends('admin.shared._master')
@section('title', 'Print Ad')
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
        <h2><span class="fa fa-file-image-o"></span> Print Ads</h2>
        <div class="clearfix"></div>
        <a href="{{ url('web-admin/page-management/portfolio') }}" class="btn btn-info" >Back</a>
         <button type="submit" class="btn btn-success pull-right" id="print-add-up">Add Image</button>
         <input type="file" name="print_image[]" class="print-file-up"/>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
        <div id="progress-port"><div class="progress-bar"></div ><div class="status">0%</div></div>
        @if(count($print_ad) > 0 )
          @foreach($print_ad as $ad)
           <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="{{ asset('images/print-ad/'.$ad->print_image) }}" alt="image" data-port-id="#" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="{{ url('web-admin/page-management/delete-print/'.$ad->print_ad_id) }}"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
         @else
         <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
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
    $('.print-file-up').hide();

    //Trigger hidden input file
    $('#print-add-up').click(function(){
      $('.print-file-up').click();
    });


    $('.print-file-up').change(function(event){
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
        myFormData.append('print_image', file);
        myFormData.append('_token', '{{ csrf_token() }}');

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

