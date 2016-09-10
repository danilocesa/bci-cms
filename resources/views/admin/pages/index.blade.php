@extends('admin.shared._master')
@section('title','Page Mangement')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery-upload.css')}}">

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
 <script src="{{ asset('js/jquery.ui.widget.js') }}"></script>
 <script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
 <script src="{{ asset('js/jquery.upload.min.js') }}"></script>

<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#aboutUs-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

  $(document).ready(function(){
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


    $("#aboutUs-up").change(function(){
        readURL(this);
    });


    var filesList = $('input[type="file"]').prop('files');

     // $('#aboutUs-up').fileupload({
     //    url: '{{ url("web-admin/page-uploads") }}',
     //    dataType: 'json',
     //    send: {files: filesList},
     //    done: function (e, data) {
     //        $.each(data.result.files, function (index, file) {
     //            $('<p/>').text(file.name).appendTo('#files');
     //        });
     //    },
     //    progressall: function (e, data) {
     //        var progress = parseInt(data.loaded / data.total * 100, 10);
     //        $('#loader-up .loaderUp-bar').css(
     //            'width',
     //            progress + '%'
     //        );
     //    }
     //  })
     //  .error(function (jqXHR, textStatus, errorThrown) {
     //      console.log(jqXHR);
     //      console.log(textStatus);
     //      console.log(errorThrown);
     //  })
     //  .prop('disabled', !$.support.fileInput)
     //  .parent().addClass($.support.fileInput ? undefined : 'disabled');


       $('#aboutUs-up').fileupload('send', {files: filesList});



  });

</script>
@endsection