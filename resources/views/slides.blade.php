@extends('_master')
@section('title', 'Slides')
@push('styles')
<style type="text/css">
    /* jssor slider arrow navigator skin 08 css */
        /*
        .jssora08l                  (normal)
        .jssora08r                  (normal)
        .jssora08l:hover            (normal mouseover)
        .jssora08r:hover            (normal mouseover)
        .jssora08l.jssora08ldn      (mousedown)
        .jssora08r.jssora08rdn      (mousedown)
        .jssora08l.jssora08lds      (disabled)
        .jssora08r.jssora08rds      (disabled)
        */
        .jssora08l, .jssora08r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 50px;
            height: 50px;
            cursor: pointer;
            background: url('{{ asset("images/a08.png") }}') no-repeat;
            overflow: hidden;
            opacity: .4;
            filter: alpha(opacity=40);
        }
        .jssora08l { background-position: -5px -35px; }
        .jssora08r { background-position: -65px -35px; }
        .jssora08l:hover { background-position: -5px -35px; opacity: .8; filter:alpha(opacity=80); }
        .jssora08r:hover { background-position: -65px -35px; opacity: .8; filter:alpha(opacity=80); }
        .jssora08l.jssora08ldn { background-position: -5px -35px; opacity: .3; filter:alpha(opacity=30); }
        .jssora08r.jssora08rdn { background-position: -65px -35px; opacity: .3; filter:alpha(opacity=30); }
        .jssora08l.jssora08lds { background-position: -5px -35px; opacity: .3; pointer-events: none; }
        .jssora08r.jssora08rds { background-position: -65px -35px; opacity: .3; pointer-events: none; }


</style>
@endpush
@push('scripts')
<script src="{{ asset('js/vendor/jssor.slider-21.1.6.min.js') }}"></script>
<script>
jssor_1_slider_init = function() {
    var jssor_1_options = {
      $AutoPlay: false,
      $DragOrientation: 2,
      $PlayOrientation: 2,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*responsive code begin*/
    /*you can remove responsive code if you don't want the slider scales while window resizing*/
    function ScaleSlider() {
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 600);
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*responsive code end*/
};

</script>
@endpush

@section('content')
<div class="main-content">
  <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 520px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('{{ asset('images/loading.gif')}}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 350px; overflow: hidden;">
            <div data-p="112.50">
                <img data-u="image" src="{{ asset('images/a1.png') }}" />
                <div class="slide-caption">
                    <button>open</button>
                    <span>sdf sdfsdfsd fsdf sdfsd fsdf sdf sdfsf sdfsdf sdf sfsdfsd</span>
                </div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('images/a1.png') }}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('images/a1.png') }}" />
            </div>
            <a data-u="any" href="http://www.jssor.com" style="display:none">Vertical Slider</a>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('images/a1.png') }}" />
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora08l" style="top:8px;left:8px;width:50px;height:50px;" data-autocenter="1"></span>
        <span data-u="arrowright" class="jssora08r" style="bottom:8px;right:8px;width:50px;height:50px;" data-autocenter="1"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>

</div>  

@endsection