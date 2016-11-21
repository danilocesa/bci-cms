@extends('_master')
@section('title', 'BCI. eNav')
@push('styles')
    <style>
        #contact-us-menu:after{ display:none;}
        #clients-menu:before{ display:none;}
        #clients-menu:after{ display:none;}
        #about-menu:after{display:none;}
    </style>
@endpush
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
        
        if ($(window).width() >= 758) { //Media 1
            // aLine.line(0, '12%', '99%', '48%').attr({ stroke: '#B9B9B9', strokeWidth: 2, strokeDasharray: 1000,strokeDashoffset:1000});
            aLine.line(0, '12%', '99%', '48%').attr({ stroke: '#B9B9B9', strokeWidth: 2});
            cLine.line(0, '30%', '73%', '25%').attr({ stroke: '#B9B9B9', strokeWidth: 2});
            pLine.line(0, '49%', '58%', '18%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            wLine.line(0, '68%', '42%', '36%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            cuLine.line(0, '83%', '36%', '48%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});

            //Animation of line
            // aLine.animate({ strokeDashoffset: 1000 },3000);
            // Snap.animate(1000,300, function( value ){
            //        aLine.attr();
            //        // console.log(1);
            //        cLine.attr({ 'strokeDashoffset': value });

            // },5000 );
            // console.log(aLine.inAnim());

            // console.log(aLine.selectAll('path'));
            // aLine.path().getTotalLength(aLine.getTotalLength());
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