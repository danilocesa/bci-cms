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

.swiper-nav-bg-top{
    position: absolute;
    top:-3em;
    z-index: 1;
    left:50%;
    width: 53px;
    height: 37px;
    background: black;
    opacity: 0.5;
}
.swiper-button-top{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 13.5px 18px 15.5px;
    border-color: transparent transparent #007bff transparent;
    margin-top: 7px;
    margin-left: 12px;
    cursor: pointer;
}

.swiper-nav-bg-bottom{
    position: absolute;
    bottom:-3em;
    z-index: 1;
    left:50%;
    width: 53px;
    height: 37px;
    background: black;
    opacity: 0.5;
}

.swiper-button-bottom{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 100px 100px 0 100px;
    border-color: #007bff transparent transparent transparent;
    margin-top: 7px;
    margin-left: 12px;
    cursor: pointer;
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
                    test
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
                    test
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
    <div class="swiper-nav-bg-top">
        <div class="swiper-button-top"></div>    
    </div>
    <div class="swiper-nav-bg-bottom">
        <div class="swiper-button-bottom"></div>
    </div>

</div>  

@endsection