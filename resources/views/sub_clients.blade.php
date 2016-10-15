@extends('_master')
@section('title', 'Clients')
@push('scripts')
<script>
    window.onload = function() {
        //0
        var mitsubishiLine1 = Snap("#mitsubishiLine1");
        mitsubishiLine1.line(0, '50%', '100%', '70%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //1
        @if(count($sub_clients) > 1)
        var blueLine1 = Snap("#blueLine1");
        blueLine1.line(0, '55%', '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //2
        @if(count($sub_clients) > 2)
        var microsoftLine1 = Snap("#microsoftLine1");
        microsoftLine1.line(0, '100%', '100%', '55%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //3
        @if(count($sub_clients) > 3)
        var panasonicLine1 = Snap("#panasonicLine1");
        panasonicLine1.line(0, '100%', '100%', '0%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //4

        //5
        @if(count($sub_clients) > 4)
        var accentureLine1 = Snap("#accentureLine1");
        accentureLine1.line(0, '55%', '100%', '45%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //6
        @if(count($sub_clients) > 5)
        var metrobankLine1 = Snap("#metrobankLine1");
        metrobankLine1.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //7
        @if(count($sub_clients) > 6)
        var ucpbLine1 = Snap("#ucpbLine1");
        ucpbLine1.line(0, '100%', '100%', '15%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //8
        @if(count($sub_clients) > 7)
        var bpiLine1 = Snap("#bpiLine1");
        bpiLine1.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //9
        @if(count($sub_clients) > 8)
        var forexLine1 = Snap("#forexLine1");
        forexLine1.line(0, '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif
        //10
        @if(count($sub_clients) > 9)
        var dbpLine1 = Snap("#dbpLine1");
        dbpLine1.line(0, '30%', '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        @endif       
        
        /*For Responsive purposes*/
        var leftLine = Snap("#leftLine");
        leftLine.line('60%', 0, '5%', '10%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        var rightLine = Snap("#rightLine");
        rightLine.line('5%', 0, '60%', '10%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //0
        var mitsubishiLine2 = Snap("#mitsubishiLine2");
        mitsubishiLine2.line(0, 0, '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //1
        var blueLine2 = Snap("#blueLine2");
        blueLine2.line(0, 0, '90%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //2
        var microsoftLine2 = Snap("#microsoftLine2");
        microsoftLine2.line(0, '56%', '100%', '56%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //3
        var panasonicLine2 = Snap("#panasonicLine2");
        panasonicLine2.line('10%', '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //4
        var scentshopLine2 = Snap("#scentshopLine2");
        scentshopLine2.line(0, 0, '90%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //5
        var accentureLine2 = Snap("#accentureLine2");
        accentureLine2.line(0, 0, '100%', '45%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //6

        //7

        //8
        var bpiLine2 = Snap("#bpiLine2");
        bpiLine2.line('10%', 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //9
        var forexLine2 = Snap("#forexLine2");
        forexLine2.line(0, '50%', '100%', '50%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        //10
        var dbpLine2 = Snap("#dbpLine2");
        dbpLine2.line(0, 0, '100%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        
        
        var scentshopLine3 = Snap("#scentshopLine3");
        scentshopLine3.line(0, 0, '70%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        var panasonicLine3 = Snap("#panasonicLine3");
        panasonicLine3.line(0, '100%', '100%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        
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
                        <!--0-->
                        <div class="clients-img-container" id="clients-mitsubishi">
                            <svg width="100%" height="100%" id="mitsubishiLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="mitsubishiLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[0]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-mitsubishi">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        <!--1-->
                        @if(count($sub_clients) > 1)
                        <div class="clients-img-container" id="clients-blue">
                            <svg width="100%" height="100%" id="blueLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="blueLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[1]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-blue">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--2-->
                        @if(count($sub_clients) > 2)
                        <div class="clients-img-container" id="clients-microsoft">
                            <svg width="100%" height="100%" id="microsoftLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="microsoftLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[2]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-microsoft">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--3-->
                        @if(count($sub_clients) > 3)
                        <div class="clients-img-container" id="clients-panasonic">
                            <svg width="100%" height="100%" id="panasonicLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="panasonicLine2" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="panasonicLine3" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[3]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-panasonic">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--4-->
                        @if(count($sub_clients) > 4)
                        <div class="clients-img-container" id="clients-scentshop">
                            <svg width="100%" height="100%" id="scentshopLine2" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="scentshopLine3" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[4]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--5-->
                        @if(count($sub_clients) > 5)
                        <div class="clients-img-container" id="clients-accenture">
                            <svg width="100%" height="100%" id="accentureLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="accentureLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[5]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--6-->
                        @if(count($sub_clients) > 6)
                        <div class="clients-img-container" id="clients-metrobank">
                            <svg width="100%" height="100%" id="metrobankLine1" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[6]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-metrobank">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--7-->
                        @if(count($sub_clients) > 7)
                        <div class="clients-img-container" id="clients-ucpb">
                            <svg width="100%" height="100%" id="ucpbLine1" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[7]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--8-->
                        @if(count($sub_clients) > 8)
                        <div class="clients-img-container" id="clients-bpi">
                            <svg width="100%" height="100%" id="bpiLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="bpiLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[8]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="cv-bpi">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--9-->
                        @if(count($sub_clients) > 9)
                        <div class="clients-img-container" id="clients-forex">
                            <svg width="100%" height="100%" id="forexLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="forexLine2" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="forexLine3" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[9]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                        <!--10-->
                        @if(count($sub_clients) > 10)
                        <div class="clients-img-container" id="clients-dbp">
                            <svg width="100%" height="100%" id="dbpLine1" class="clients-line"></svg>
                            <svg width="100%" height="100%" id="dbpLine2" class="clients-line"></svg>
                            <a href="#" class="cv-show"><img src="{{ asset('images/clients/sub-clients/'.$sub_clients[10]->subclient_image) }}" alt="" class="clients-img"/></a>
                            <div class="cv-container" id="">
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                                <a href="#"><p>https://www.youtube.com/watch?v=79Z5iwEWbIQ</p></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>   
</div> <!-- #main -->
@endsection