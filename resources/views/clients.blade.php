@extends('_master')
@section('title', 'Clients')
@push('scripts')
<script>
        window.onload = function() {
            var panasonicLine1 = Snap("#panasonicLine1");
            panasonicLine1.line(0, '100%', '100%', '0%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var microsoftLine1 = Snap("#microsoftLine1");
             microsoftLine1.line(0, '100%', '100%', '55%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var dbpLine1 = Snap("#dbpLine1");
            dbpLine1.line(0, '30%', '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var mitsubishiLine1 = Snap("#mitsubishiLine1");
            mitsubishiLine1.line(0, '50%', '100%', '70%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var blueLine1 = Snap("#blueLine1");
            blueLine1.line(0, '55%', '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var bpiLine1 = Snap("#bpiLine1");
            bpiLine1.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var forexLine1 = Snap("#forexLine1");
            forexLine1.line(0, '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var accentureLine1 = Snap("#accentureLine1");
            accentureLine1.line(0, '55%', '100%', '45%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var ucpbLine1 = Snap("#ucpbLine1");
            ucpbLine1.line(0, '100%', '100%', '15%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var metrobankLine1 = Snap("#metrobankLine1");
            metrobankLine1.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var ritemedLine1 = Snap("#ritemedLine1");
            ritemedLine1.line('30%', 0, '50%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            
            /*For Responsive purposes*/
            var leftLine = Snap("#leftLine");
            leftLine.line('60%', 0, '5%', '10%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var rightLine = Snap("#rightLine");
            rightLine.line('5%', 0, '60%', '10%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var panasonicLine2 = Snap("#panasonicLine2");
            panasonicLine2.line('10%', '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var microsoftLine2 = Snap("#microsoftLine2");
            microsoftLine2.line(0, '56%', '100%', '56%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var forexLine2 = Snap("#forexLine2");
            forexLine2.line(0, '50%', '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var mitsubishiLine2 = Snap("#mitsubishiLine2");
            mitsubishiLine2.line(0, 0, '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var dbpLine2 = Snap("#dbpLine2");
            dbpLine2.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var blueLine2 = Snap("#blueLine2");
            blueLine2.line(0, 0, '90%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var scentshopLine2 = Snap("#scentshopLine2");
            scentshopLine2.line(0, 0, '90%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var scentshopLine3 = Snap("#scentshopLine3");
            scentshopLine3.line(0, 0, '70%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var panasonicLine3 = Snap("#panasonicLine3");
            panasonicLine3.line(0, '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var accentureLine2 = Snap("#accentureLine2");
            accentureLine2.line(0, 0, '100%', '45%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var bpiLine2 = Snap("#bpiLine2");
            bpiLine2.line('10%', 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
            var forexLine3 = Snap("#forexLine3");
            forexLine3.line(0, '70%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});  
        }
            $( document ).ready(function() {
                $('.cv-container').hide();
                $('.clients-img-container').show();
                
                if ($(window).width() < 479 && $(window).width() > 321) {
                   $('.clients-doubleLine-container').show();
                }
                $('.cv-show').click(function(){
                    $(this).next('.cv-container').toggle(200);
                    $(this).parent().siblings().not('.clients-doubleLine-container').toggle(300);
                    $(this).parent().toggleClass('current');
                    $('#clients-menu').toggleClass('current-menu');
                    $('.clients-doubleLine-container').toggleClass('current-line');
                });
            });
        
        
        </script>
@endpush

@section('content')
    <div class="main-content">
        <div id="clients-container">
            <!--for responsive purposes-->
            <div class="clients-doubleLine-container">
                <div id="clients-left-container">
                    <svg width="100%" height="100%" id="leftLine" class="clients-doubleLine"></svg>
                </div>
                <div id="clients-right-container">
                    <svg width="100%" height="100%" id="rightLine" class="clients-doubleLine"></svg>
                </div>
            </div>
            <!--end-->
            <div class="clients-img-container" id="clients-panasonic">
                <svg width="100%" height="100%" id="panasonicLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="panasonicLine2" class="clients-line"></svg>
                <svg width="100%" height="100%" id="panasonicLine3" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[0]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[0]->client_image) }}" alt="Panasonic" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-forex">
                <svg width="100%" height="100%" id="forexLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="forexLine2" class="clients-line"></svg>
                <svg width="100%" height="100%" id="forexLine3" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[1]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[1]->client_image) }}" alt="Forex" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-ucpb">
                <svg width="100%" height="100%" id="ucpbLine1" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[2]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[2]->client_image) }}" alt="UCPB" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-microsoft">
                <svg width="100%" height="100%" id="microsoftLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="microsoftLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[3]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[3]->client_image) }}" alt="Microsoft" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-accenture">
                <svg width="100%" height="100%" id="accentureLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="accentureLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[4]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[4]->client_image) }}" alt="Accenture" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-dbp">
                <svg width="100%" height="100%" id="dbpLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="dbpLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[5]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[5]->client_image) }}" alt="DBP" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-scentshop">
                <svg width="100%" height="100%" id="scentshopLine2" class="clients-line"></svg>
                <svg width="100%" height="100%" id="scentshopLine3" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[6]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[6]->client_image) }}" alt="ScentShop" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-mitsubishi">
                <svg width="100%" height="100%" id="mitsubishiLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="mitsubishiLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[7]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[7]->client_image) }}" alt="Mitsubishi" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-blue">
                <svg width="100%" height="100%" id="blueLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="blueLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[8]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[8]->client_image) }}" alt="Blue" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-bpi">
                <svg width="100%" height="100%" id="bpiLine1" class="clients-line"></svg>
                <svg width="100%" height="100%" id="bpiLine2" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[9]->page_content_id) }}" ><img src="{{ asset('images/clients/'.$content[9]->client_image) }}" alt="BPI" class="clients-img"/></a>
            </div>
            <div class="clients-img-container" id="clients-metrobank">
                <svg width="100%" height="100%" id="metrobankLine1" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[10]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[10]->client_image) }}" alt="Metrobank" class="clients-img"/></a>
            </div>
            <div class="clients-img-container"  id="clients-ritemed">
                <svg width="100%" height="100%" id="ritemedLine1" class="clients-line"></svg>
                <a href="{{ url('clients/'.$content[11]->page_content_id) }}"><img src="{{ asset('images/clients/'.$content[11]->client_image) }}" alt="Ritemed" class="clients-img"/></a>
            </div>
        </div>
    </div>  
</div> <!-- #main -->
@endsection