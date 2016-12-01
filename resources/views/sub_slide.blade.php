@extends('_master')
@section('title', 'Slides')
@push('styles')
<style type="text/css">
.footer-container{top:20.5em;}
.fullsize-slide{position:relative;top:47px;width:570px;}
.caption{margin-top:5px;}
.caption p{font-size:1.4em;}


.swiper-button-top{
    border-style: solid;
    border-width: 0 27.5px 25px 26.5px;
    border-color: transparent transparent #007bff transparent;
    cursor: pointer;
    position: absolute;
    top:-1em;
    z-index: 1;
    left:52%;
    width: 53px;
    height: 37px;
}
.swiper-button-bottom{
    border-style: solid;
    border-width: 28px 26px 0 26px;
    border-color: #007bff transparent transparent transparent;
    margin-top: 10px;
    margin-left: 11px;
    cursor: pointer;
    position: absolute;
    bottom:-13em;
    z-index: 1;
    left:50%;
    width: 53px;
    height: 37px;
}

</style>
@endpush
@push('scripts')
<script>

</script>
@endpush

@section('content')
<div class="main-content">
  <!-- Slider main container -->
    <div class="fullsize-slide">
        <img src="{{ asset('images/a1.png') }}" width="100%" height="100%">
        <div class="caption">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        </div>
    </div>
    {{Request::segment(2) - 1}}
    <!-- If we need navigation buttons -->
    <a href="{{ url('slides/'.Request::segment(2) - 1) }}">
        <div class="swiper-button-top"></div> 
    </a>
    <div class="swiper-button-bottom"></div>

</div>  

@endsection