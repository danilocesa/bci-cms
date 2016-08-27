@extends('admin.shared._master')
@section('title','Page Mangement')
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
                      <li class="{{ Request::segment(3) == '' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management') }}">About Us</a>
                      </li>
                      <li class="{{ Request::segment(3) == 'clients' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/clients') }}">Clients</a>
                      </li>
                      <li class="{{ Request::segment(3) == 'portfolio' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/portfolio') }}">Portfolio</a>
                      </li>
                      <li class="{{ Request::segment(3) == 'contact-us' ? 'active' : '' }}"><a href="{{ url('web-admin/page-management/contact-us') }}" >Contact Us</a>
                      </li>
                    </ul>
                    <div id="pagesTabContent" class="tab-content">
                      <div class="tab-pane fade {{ Request::segment(3) == '' ? 'active in' : '' }}" >
                        @if(isset($directors))
                            @include('admin.pages.about-us')
                        @endif
                      </div>
                      <div class="tab-pane fade {{ Request::segment(3) == 'clients' ? 'active in' : '' }}" >
                        @include('admin.pages.clients')
                      </div>
                      <div class="tab-pane fade {{ Request::segment(3) == 'portfolio' ? 'active in' : '' }} ">
                        @include('admin.pages.portfolio')
                      </div>
                      <div class="tab-pane fade {{ Request::segment(3) == 'contact-us' ? 'active in' : '' }} ">
                        @include('admin.pages.contact-us')
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')
 <script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
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

  });

</script>
@endsection