@extends('_master')
@section('title', 'BCI. eNav')
@push('scripts')
<script>
  window.onload = function(){
        var auLine = Snap("#auLine");
        console.log($(window).width());
        if ($(window).width() >= 758) { //Media 1
            auLine.line('20%', '15%', '80%', '40%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        }
        else if($(window).width() >= 465 && $(window).width() < 758){
            auLine.line('0', '10%', '80%', '40%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
        }
      }
</script>
@endpush

@section('content')
   <div class="main-content">
    <div id="img-container-aboutus">
        <svg id="auLine"  width="100%" height="100%"></svg>
        <img src="img/about-us.png" alt="About-Us" />
        <div class="director-content">
            <div id="left">
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      gemma g. alcantara
                      <div class="sub header">managing director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      joey server
                      <div class="sub header">chief creative director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      rey tolentino
                      <div class="sub header">creative director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      lita marte
                      <div class="sub header">finance director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
            </div>
            <div id="right">
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      tiger jimenez
                      <div class="sub header">senior art director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      igine jose
                      <div class="sub header">technical director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      paul salapantan
                      <div class="sub header">strategic planning director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      vanessa julian
                      <div class="sub header">account director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
                <a class="profile-name" href="#">
                    <h2 class="ui header">
                      jessica salas
                      <div class="sub header">event director</div>
                    </h2>
                    <p>Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. </p>
                </a>
            </div>
        </div>
    </div>
</div>  

@endsection