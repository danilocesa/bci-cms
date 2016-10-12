@extends('_master')
@section('title', 'Portfolio')
@push('scripts')
 <script type="text/javascript">      
            $(document).ready(function(){
                $("nav#bci-menu").addClass('port-menu');
                     
                $(".main-content").attr('id','port-content');
                $(".port-circle-print").click(function() {
                    $("#print-details").show();
                    $("#port-lines").hide();
                    $("#port-main").hide();
                });

                $('.port-circle-events').click(function(){
                    var main = $('.port-circle-events');
                    var line = $("#port-lines svg:not(#eventLine)");
                    var details = $("#event-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active');                     
                    
                    clickCircle(main,line,details,'events');   
           
                    $(window).resize(function(){
                        if($('.port-circle-events').hasClass('active')){
                            clickCircle(main,line,details,'events');                    
                        }

                    });
                 });  

                $('.port-circle-digital').click(function(){
                    var main = $('.port-circle-digital');
                    var line = $("#port-lines svg:not(#digitalLine)");
                    var details = $("#digital-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active');   
                    
                    clickCircle(main,line,details,'digital');  

                    $(window).resize(function(){
                        if($('.port-circle-digital').hasClass('active')){
                            clickCircle(main,line,details,'digital');                       
                        }

                    });
                 });     

                 $('.port-circle-shopper').click(function(){
                    var main = $('.port-circle-shopper');
                    var line = $("#port-lines svg:not(#shopLine)");
                    var details = $("#shopper-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active');   
                    
                    clickCircle(main,line,details,'shopper');  

                    $(window).resize(function(){
                        if($('.port-circle-shopper').hasClass('active')){
                            clickCircle(main,line,details,'shopper');                       
                        }

                    });
                 }); 

                $('.port-circle-ooh').click(function(){
                    var main = $('.port-circle-ooh');
                    var line = $("#port-lines svg:not(#oohLine)");
                    var details = $("#ooh-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active');   
                    
                    clickCircle(main,line,details,'ooh');  

                    $(window).resize(function(){
                        if($('.port-circle-ooh').hasClass('active')){
                            clickCircle(main,line,details,'ooh');                       
                        }

                    });
                 });     

                $('.port-circle-activation').click(function(){
                    var main = $('.port-circle-activation');
                    var line = $("#port-lines svg:not(#actLine)");
                    var details = $("#activation-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active'); 

                    clickCircle(main,line,details,'activation'); 

                    $(window).resize(function(){
                        if($('.port-circle-activation').hasClass('active')){
                            clickCircle(main,line,details,'activation');                                      
                        }

                    });
                 });        

                $('.port-circle-tv').click(function(){
                    var main = $('.port-circle-tv');
                    var line = $("#port-lines svg:not(#tvLine)");
                    var details = $("#tv-details");

                    var func = $(this).hasClass('active') ? 'removeClass' : 'addClass';
                    $(this).addClass('active');
                    $(this)[func]('active'); 

                    clickCircle(main,line,details,'tv');

                    $(window).resize(function(){
                        if($('.port-circle-tv').hasClass('active')){
                            clickCircle(main,line,details,'tv');                        
                        }

                    });
                });  

                $('.pop-video').click(function(){
                    var $id = $(this).data('id');
                    var $thumb = $(this).data('thumb');
                    $('.ui.modal').modal('show');

                    $('.ui.embed').embed({
                      source      : 'youtube',
                      id          : $id,
                      icon        : 'video', 
                      placeholder : $thumb
                    });

                });                                         

                
            }); 

            function clickCircle(main,line,details,a) {
               var w = $(window).width();
                if(w <= 750) {
                    var func = main.hasClass('active') ? 'addClass' : 'removeClass';            
                        if(a != 'events') {$("#events").removeClass('invisible').removeClass("hide");}
                        if(a != 'print') {$("#print").removeClass('invisible').removeClass("hide");}
                        if(a != 'ooh') {$("#ooh").removeClass('invisible').removeClass("hide");}
                        if(a != 'shopper') {$("#shopper").removeClass('invisible').removeClass("hide");}
                        if(a != 'digital') {$("#digital").removeClass('invisible').removeClass("hide");}
                        if(a != 'activation') {$("#activation").removeClass('invisible').removeClass("hide");}
                        if(a != 'tv') {$("#tv").removeClass('invisible').removeClass("hide");}
                        line.removeClass("invisible");
                        if(a != 'events') {$("#events").removeClass('invisible')[func]("hide"); }
                        if(a != 'print') {$("#print").removeClass('invisible')[func]("hide"); }
                        if(a != 'ooh') {$("#ooh").removeClass('invisible')[func]("hide"); }
                        if(a != 'shopper') {$("#shopper").removeClass('invisible')[func]("hide"); }
                        if(a != 'digital') {$("#digital").removeClass('invisible')[func]("hide"); }
                        if(a != 'activation') {$("#activation").removeClass('invisible')[func]("hide"); }
                        if(a != 'tv') {$("#tv").removeClass('invisible')[func]("hide"); }
                        line[func]("invisible");      

                    var func2 = main.hasClass('active') ? 'removeClass' : 'addClass';
                        details.removeClass("hide");
                        details[func2]("hide"); 

                    if(w > 462 ){
                        if(main.hasClass('active')){ $("#oneLine").addClass("invisible");}else {$("#oneLine").removeClass("invisible");}
                    }
                    else {
                        main.hasClass('active') ? $("#oneLine").removeClass("invisible") : null;
                    }

                }
                else {
                    var func = main.hasClass('active') ? 'addClass' : 'removeClass';
                        if(a != 'events') {$("#events").removeClass('hide').removeClass("invisible");}
                        if(a != 'print') {$("#print").removeClass('hide').removeClass("invisible");}
                        if(a != 'digital') {$("#digital").removeClass('hide').removeClass("invisible");}
                        if(a != 'ooh') {$("#ooh").removeClass('hide').removeClass("invisible");}
                        if(a != 'shopper') {$("#shopper").removeClass('hide').removeClass("invisible");}
                        if(a != 'activation') {$("#activation").removeClass('hide').removeClass("invisible");}
                        if(a != 'tv') { $("#tv").removeClass('hide').removeClass("invisible");}
                        line.removeClass("invisible");
                        if(a != 'events') {$("#events").removeClass('hide')[func]("invisible");}
                        if(a != 'print') {$("#print").removeClass('hide')[func]("invisible"); }
                        if(a != 'digital') {$("#digital").removeClass('hide')[func]("invisible"); }
                        if(a != 'ooh') {$("#ooh").removeClass('hide')[func]("invisible"); }
                        if(a != 'shopper') {$("#shopper").removeClass('hide')[func]("invisible"); }
                        if(a != 'activation') {$("#activation").removeClass('hide')[func]("invisible"); }
                        if(a != 'tv') {$("#tv").removeClass('hide')[func]("invisible"); }
                        line[func]("invisible");
                    var func2 = main.hasClass('active') ? 'removeClass' : 'addClass';
                        details.removeClass("hide");
                        details[func2]("hide"); 

                    var w = $(window).width();
                    if(w > 462 ){
                        if(main.hasClass('active')){ $("#oneLine").addClass("invisible");}else {$("#oneLine").removeClass("invisible");}
                    }
                    else {
                        main.hasClass('active') ? $("#oneLine").removeClass("invisible") : null;
                    }                    
                }              
                                    
            };
            
            window.onload = function () {
                 var eventLine = Snap("#eventLine");
                var printLine = Snap("#printLine");
                var oohLine = Snap("#oohLine");
                var shopLine = Snap("#shopLine");
                var digitalLine = Snap("#digitalLine");
                var actLine = Snap("#actLine");
                var tvLine = Snap("#tvLine");
                var oneLine = Snap("#oneLine");
                var sLine = Snap("#sLine");
                
                eventLine.line(0, '75%', '33%', '24%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'eline-1' });
                digitalLine.line(0, '75%', '68%', '11%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'dline-1' }); 
                printLine.line(0, '75%', '95%', '25%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'pline-1' });               
                oohLine.line(0, '75%', '33%', '58%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'oline-1' });               
                shopLine.line(0, '75%', '65%', '56%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'sline-1' });               
                actLine.line(0, '75%', '49%', '96%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'aline-1' });
                tvLine.line(0, '75%', '93%', '81%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'tline-1' });
                
                eventLine.line(0, '75%', '32%', '25%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'eline-2' });
                digitalLine.line(0, '75%', '67%', '13%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'dline-2' });
                printLine.line(0, '75%', '94%', '30%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'pline-2' });
                oohLine.line(0, '75%', '35%', '58%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'oline-2' });               
                shopLine.line(0, '75%', '65%', '54%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'sline-2' });               
                actLine.line(0, '75%', '48%', '107%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'aline-2' });
                tvLine.line(0, '75%', '90%', '93%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'tline-2' });
                
                eventLine.line(0, '75%', '32%', '23%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'eline-3' });
                digitalLine.line(0, '75%', '68%', '12%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'dline-3' });
                printLine.line(0, '75%', '95%', '24%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'pline-3' });
                oohLine.line(0, '75%', '35%', '54%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'oline-3' });               
                shopLine.line(0, '75%', '65%', '48%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'sline-3' });               
                actLine.line(0, '75%', '47%', '95%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'aline-3' });
                tvLine.line(0, '75%', '93%', '80%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'tline-3' });

                eventLine.line(0, '75%', '32%', '23%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'eline-4' });
                digitalLine.line(0, '75%', '67%', '11%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'dline-4' });
                printLine.line(0, '75%', '95%', '22%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'pline-4' });
                oohLine.line(0, '75%', '34%', '47%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'oline-4' });               
                shopLine.line(0, '75%', '65%', '36%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'sline-4' });               
                actLine.line(0, '75%', '48%', '85%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'aline-4' });
                tvLine.line(0, '75%', '95%', '70%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5}).attr({ id: 'tline-4' });

                oneLine.line('50%', '0', '50%', '100%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5});
                sLine.line(0, '170px', '70%', '8%').attr({ stroke: '#B9B9B9', 'strokeWidth': 1.5});
                
            }
        </script>
@endpush

@section('content')
   <div class="main-content">
                     <!-- Print Details -->
                <div id="print-details" style="display:none;">
                    <div class="print-details-top">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print-details-top">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="print-details-bottom">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print-details-bottom">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print-details-bottom">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print-details-bottom">
                       <div class="port-content">
                            <div class="port-table">
                                <div class="port-table-cell">
                                    <p>Print Ad Sample</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
                <!-- Print Details End -->

                <!-- Portfolio Main -->
                <div id="port-main">
                    <div id="port-lines">
                        <svg width="100%" height="100%" id="eventLine" ></svg>
                        <svg width="100%" height="100%" id="digitalLine" ></svg>
                        <svg width="100%" height="100%" id="printLine" ></svg>
                        <svg width="100%" height="100%" id="oohLine" ></svg>
                        <svg width="100%" height="100%" id="shopLine" ></svg>
                        <svg width="100%" height="100%" id="actLine" ></svg>
                        <svg width="100%" height="100%" id="tvLine" ></svg>
                    </div>

                    <svg width="100%" height="100%" id="sLine" ></svg>
                    <svg width="100%" height="100%" id="oneLine" ></svg>

                 <div id="events">
                        <div class="port-circle-events port-bg">
                            <img src="images/portfolio/events.png" alt="" width="100%">
                            <p>event</p>
                        </div>
                        <!-- Events Details -->
                        <div id="event-details" class="hide">
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >                                                                        
                        </div>
                        <!-- Events Details End-->                    
                    </div> 

                    <div id="digital">
                        <div class="port-circle-digital port-bg">
                            <img src="images/portfolio/digital.png" alt="" width="100%">
                            <p>digital</p>
                        </div>
                        <!-- Digital Details -->
                         <div id="digital-details" class="hide">
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >  
                        </div>
                        <!-- Digital Details End-->                     
                    </div>    

                    <div id="print">
                        <div class="port-circle-print port-bg">
                            <img src="images/portfolio/print.png" alt="" width="100%">
                            <p>print</p>
                        </div>
                    </div>  

                    <div id="ooh">
                        <div class="port-circle-ooh port-bg">
                            <img src="images/portfolio/ooh.png" alt="" width="100%">
                            <p>ooh</p>
                        </div>
                        <!-- tv Ooh -->
                        <div id="ooh-details" class="hide">
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                        </div>
                        <!-- tv Ooh End-->                       
                    </div>   

                    <div id="shopper">
                        <div class="port-circle-shopper port-bg">
                            <img src="images/portfolio/shopper.png" alt="" width="100%">
                            <p>shopper</p>
                            <p>marketing</p>
                        </div>
                        <!-- tv Shopper -->
                        <div id="shopper-details" class="hide">
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                        </div>
                        <!-- tv Shopper End-->                        
                    </div>                             

                    <div id="activation">
                        <div class="port-circle-activation port-bg">
                            <img src="images/portfolio/activations.png" alt="" width="100%">
                            <p>activation</p>
                        </div>
                        <!-- activation Details -->
                        <div id="activation-details" class="hide">
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                            <img src=" images/portfolio/thumb2.png" alt="" >
                            <img src=" images/portfolio/thumb3.png" alt="" >
                            <img src=" images/portfolio/thumb1.png" alt="" >
                        </div>
                        <!-- activation Details End-->                     
                    </div>

                    <div id="tv">
                        <div class="port-circle-tv port-bg">
                            <img src="images/portfolio/tv.png" alt="" width="100%">
                            <p>tv</p>
                        </div>   
                        <!-- tv Details -->
                        <div id="tv-details" class="hide">
                            @foreach($videos as $video)
                                @if($video->page_content_id == 11)
                                    <img src="http://img.youtube.com/vi/<?php 
                                              $query = parse_url($video->video_link,PHP_URL_QUERY);
                                              parse_str($query, $params);
                                              echo $params['v'];
                                              ?>/default.jpg" alt="" class="pop-video" data-id="{{ $params['v'] }}" data-thumb="http://img.youtube.com/vi/{{ $params['v'] }}/sddefault.jpg" >
                                @endif
                            @endforeach
                           
                        </div>
                        <!-- tv Details End-->                                       
                    </div> 
                </div>
                <!-- Portfolio Main End-->   

                </div>  <!-- end port content -->

<div class="ui modal">
  <i class="close icon"></i>
<!--   <div class="header">
    Modal Title
  </div> -->
  <div class="ui embed"></div>
 <!--  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div> -->
</div>

@endsection