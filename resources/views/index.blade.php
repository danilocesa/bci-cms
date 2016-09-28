@extends('_master')
@section('title', 'BCI. eNav')
@push('scripts')
<script>
    window.onload = function(){
        /* ==========================================================================
          Index SVG Lines
           ========================================================================== */    
        var aLine = Snap("#aLine");
        var cLine = Snap("#cLine");
        var pLine = Snap("#pLine");
        var wLine = Snap("#wLine");
        var cuLine = Snap("#cuLine");

        console.log('width: '+ $(window).width());
        if ($(window).width() >= 758) { //Media 1
            aLine.line(0, '12%', '99%', '48%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            cLine.line(0, '30%', '73%', '25%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            pLine.line(0, '49%', '58%', '18%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            wLine.line(0, '68%', '42%', '36%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            cuLine.line(0, '83%', '36%', '48%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        } else if($(window).width() >= 470 && $(window).width() < 758){
            // aLine.line(0, '6%', '100%', '28%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        }
    }
</script>
@endpush

@section('content')
    <div id="line-art-connection" class="line-animate">
        <svg width="100%" height="100%" id="aLine"></svg>
        <svg width="100%" height="100%" id="cLine"></svg>
        <svg width="100%" height="100%" id="pLine"></svg>
        <svg width="100%" height="100%" id="wLine"></svg>
        <svg width="100%" height="100%" id="cuLine"></svg>
    </div>
    <div id="art-hand">
        <img src="{{ asset('images/art-hand.png') }}" />
    </div>

@endsection