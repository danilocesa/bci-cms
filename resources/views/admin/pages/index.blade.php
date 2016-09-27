@extends('admin.shared._master')
@section('title','Page Mangement')
@section('styles')
<link href="{{ asset('css/pnotify.css') }}" rel="stylesheet">
<style>
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
.caption input{
  width:100%;
}

</style>
@endsection
@section('main-content')
<div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Pages</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                    <ul id="pagesTab" class="nav nav-tabs bar_tabs" >
                      @permission('about-page') 
                      <li class="{{ Request::segment(3) == '' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management') }}">About Us</a>
                      </li>
                      @endpermission
                      @permission('clients-page') 
                      <li class="{{ Request::segment(3) == 'clients' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/clients') }}">Clients</a>
                      </li>
                      @endpermission
                      @permission('portfolio-page') 
                      <li class="{{ Request::segment(3) == 'portfolio' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/portfolio') }}">Portfolio</a>
                      </li>
                      @endpermission
                      @permission('contact-page') 
                      <li class="{{ Request::segment(3) == 'contact-us' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/contact-us') }}" >Contact Us</a>
                      </li>
                      @endpermission
                    </ul>
                    <div id="pagesTabContent" class="tab-content">
                      @permission('about-page') 
                      <div class="tab-pane fade {{ Request::segment(3) == '' ? 'active in' : '' }}" >
                        @if(isset($directors))
                            @include('admin.pages.about-us')
                        @endif
                      </div>
                      @endpermission
                      @permission('clients-page') 
                      <div class="tab-pane fade {{ Request::segment(3) == 'clients' ? 'active in' : '' }}" >
                        @if(Request::segment(3) == 'clients')
                          @include('admin.pages.clients')
                        @endif
                      </div>
                      @endpermission
                      @permission('portfolio-page') 
                      <div class="tab-pane fade {{ Request::segment(3) == 'portfolio' ? 'active in' : '' }} ">
                        @if(Request::segment(3) == 'portfolio')
                          @include('admin.pages.portfolio')
                        @endif
                      </div>
                      @endpermission
                      @permission('contact-page') 
                      <div class="tab-pane fade {{ Request::segment(3) == 'contact-us' ? 'active in' : '' }} ">
                        @if(Request::segment(3) == 'contact-us')
                          @include('admin.pages.contact-us')
                        @endif  
                      </div>
                      @endpermission
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
 <script src="{{ asset('js/parsley.min.js') }}"></script>
 <script src="{{ asset('js/pnotify.js') }}"></script>

<script>
function readURL(type,input,container = null) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          if(type == 1){
            $('#aboutUs-img').attr('src', e.target.result);
          }
          else if(type == 2){
            //clients
          }
          else{
            console.log(container);
            $('img[data-port-id="'+container+'"]').attr('src', e.target.result);
          }
        }

        reader.readAsDataURL(input.files[0]);
    }
}

  $(document).ready(function(){
    var progress_bar_id     = '#progress-wrp';
    var progress_port_id     = '#progress-port';
    $(progress_bar_id).hide();
    $(progress_port_id).hide();
    $('.port-file-up').hide();

    window.Parsley.on('parsley:field:validate', function() {
      validateFront();
    });
    var validateFront = function() {
      if (true === $('#aboutUs-form').parsley().isValid()) {
        $('.bs-callout-info').removeClass('hidden');
        $('.bs-callout-warning').addClass('hidden');
      } else {
        $('.bs-callout-info').addClass('hidden');
        $('.bs-callout-warning').removeClass('hidden');
      }
    };

    $('.save-btn').on('click',function(){

      $('#aboutUs-form').parsley().validate();
          validateFront();
      });


    $("#aboutUs-up").change(function(event){
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

        readURL(1,this);

        var myFormData = new FormData();
        $(progress_bar_id).show();
        myFormData.append('aboutUs_image', file);
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
                    $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
                    $(progress_bar_id + " .status").text(percent +"%");
                }, true);
            }
            return xhr;
          },
          mimeType:"multipart/form-data"
        }).done(function(res){
          $(progress_bar_id).hide();
        });
        
    });

    $('.port-up').click(function(){
      var $self = $(this);
      $('input[data-pencil-id="'+$self.data('pencil-id')+'"]').click();

    });

    $('.port-file-up').change(function(event){
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
      readURL(3,this,input[0].dataset.pencilId);
    
        var myFormData = new FormData();
        $(progress_port_id).show();
        myFormData.append('port_image', file);
        myFormData.append('_token', '{{ csrf_token() }}');
        myFormData.append('port_id', input[0].dataset.pencilId);

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
        });


    });



    $('.client-up').click(function(){
      var $self = $(this);
      $('input[data-pencil-id="'+$self.data('pencil-id')+'"]').click();

    });


    $('.client-file-up').change(function(event){
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
      readURL(3,this,input[0].dataset.pencilId);
    
        var myFormData = new FormData();
        $(progress_port_id).show();
        myFormData.append('client_image', file);
        myFormData.append('_token', '{{ csrf_token() }}');
        myFormData.append('client_id', input[0].dataset.pencilId);

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
        });


    });


  });

</script>
@endsection