@extends('_master')
@section('title', 'Slides')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">
<style type="text/css">
.swiper-container {
    width: 490px;
    height: 610px;
}   
.swiper-slide{
    height:280px!important;
}

.swiper-button-top{
    border-style: solid;
    border-width: 0 27.5px 25px 26.5px;
    border-color: transparent transparent #007bff transparent;
    cursor: pointer;
    position: absolute;
    top:-4em;
    z-index: 1;
    left:47%;
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
    bottom:-3em;
    z-index: 1;
    left:45%;
    width: 53px;
    height: 37px;
}

.slider-caption button{
    float:left;
    width: 50px;
}
.slider-caption p{
    float:left;
    margin-left:9px;
    margin-top: 7px;
    font-size:1.;
}




</style>
@endpush
@push('scripts')
<script src="{{ asset('js/vendor/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/swiper.min.js') }}"></script>
<script>
$(document).ready(function () {
    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'vertical',
      loop: true,
      slidesPerView: 2,
      preloadImages: false,
      lazyLoading: true,
      lazyLoadingInPrevNext: true,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      nextButton: '.swiper-button-top',
      prevButton: '.swiper-button-bottom',
      spaceBetween:40
    });      
  });       

</script>
@endpush

@section('content')
<div class="main-content">
  <!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <img data-src="{{ asset('images/a1.png') }}" class="swiper-lazy" width="100%" height="100%">
            <div class="slider-caption">
                <a href="{{ url('slides/1')}}">
                    <button class="ui blue button">Open</button>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
            <div class="swiper-lazy-preloader"></div>
        </div>
        <div class="swiper-slide">
            <img data-src="{{ asset('images/about-us.png') }}" class="swiper-lazy" width="100%" height="100%">
            <div class="slider-caption">
                    test
            </div>
            <div class="swiper-lazy-preloader"></div>
        </div>
        <div class="swiper-slide">
            <img data-src="{{ asset('images/a1.png') }}" class="swiper-lazy" width="100%" height="100%">
            <div class="slider-caption">
                
            </div>
            <div class="swiper-lazy-preloader"></div>
        </div>
        <div class="swiper-slide">
            <img data-src="{{ asset('images/about-us.png') }}" class="swiper-lazy" width="100%" height="100%">
            <div class="slider-caption">
                    test
            </div>
            <div class="swiper-lazy-preloader"></div>
        </div>
    </div>
    
    

</div>

<!-- If we need navigation buttons -->
    <div class="swiper-button-top"></div> 
    <div class="swiper-button-bottom"></div>

</div>  

@endsection