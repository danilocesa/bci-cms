@extends('_master')
@section('title', 'BCI. eNav')
@push('styles')
    <style>
        #art-hand{ width: 455px; overflow:hidden;; }
        #art-hand img{ width:446px; position:relative; left:-6px}
        #line-art-connection{position: absolute;margin-left: 80px;height: 44em;overflow:hidden;}
        #line-art-connection div{ position:absolute;  width:100%;  height:100%}
        #aLine{ position:absolute; }
        #pLine{ position:absolute; top:0; left:0;}
        #wLine{ position:absolute; top:0; }
        #cuLine{ position:absolute; top:1em; }

        #contact-us-menu:after{ display:none;}
        #clients-menu:before{ display:none;}
        #clients-menu:after{ display:none;}
        #about-menu:after{display:none;}

        .line-path{display:none;}
        #art-hand{display:none;}

        @keyframes dash {
          to {
            stroke-dashoffset: 0;
          }
        }

    </style>
@endpush
@push('scripts')
<script>
    $(document).ready(function(){
        $('.skip-text').html('<a href="{{ url("slides") }}"><h1>Skip</h1></a>');
        $("#art-hand").fadeIn(2500,function(){
            $('.line-path').css({
                "display":"block",
                "stroke-dasharray":"1000",
                "stroke-dashoffset":"1000",
                "animation": "dash 7s linear forwards"
            });
            setTimeout(function(){
                window.location = "{{ url('slides')}} ";
            },6500);
        });    

    });
</script>
@endpush

@section('content')
    <div id="line-art-connection">
        <svg height="570" width="590" id="lines-hand">
          <line class="line-path" x1="0" y1="13%" x2="91%" y2="56%" style="stroke:#B9B9B9;stroke-width:2" />
          <line class="line-path" x1="0" y1="33%" x2="69%" y2="35%" style="stroke:#B9B9B9;stroke-width:2" />
          <line class="line-path" x1="0" y1="55%" x2="55%" y2="29%" style="stroke:#B9B9B9;stroke-width:2" />
          <line class="line-path" x1="0" y1="75%" x2="42%" y2="41%" style="stroke:#B9B9B9;stroke-width:2" />
          <line class="line-path" x1="0" y1="99%" x2="32%" y2="59%" style="stroke:#B9B9B9;stroke-width:2" />
          Sorry, your browser does not support inline SVG.
        </svg>
    </div>
    <div id="art-hand">
        <img src="{{ asset('images/art-hand.png') }}" />
    </div>

@endsection