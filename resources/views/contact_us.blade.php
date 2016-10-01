@extends('_master')
@section('title', 'About Us')
@push('scripts')
 <script>
            window.onload = function() {
                var cu_linkedinLine = Snap("#cu-linkedin-line");
                cu_linkedinLine.line('15%', '100%', '75%', '0%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
                var cu_fbLine = Snap("#cu-fb-line");
                cu_fbLine.line('5%', '100%', '100%', '0%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
                var cu_careerLine = Snap("#cu-career-line");
                var cu_inquiryLine = Snap("#cu-inquiry-line");

                //for responsive purposes
                var cu_linkedinLine2 = Snap("#cu-linkedin-line2");
                cu_linkedinLine2.line('15%', '100%', '100%', '0%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
                var cu_careerLine2 = Snap("#cu-career-line2");
                cu_careerLine2.line('0', '100%', '100%', '10%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});

                if ($(window).width() >= 758) { //Media 1
                    cu_careerLine.line('0', '100%', '100%', '25%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
                    cu_inquiryLine.line('0', '100%', '100%', '45%').attr({ stroke: '#B9B9B9', 'strokeWidth': 2});
                }    
            }
            $( document ).ready(function() {
                $('#cu-form').hide();
                $('#cu-form-message').hide();
                $('#cu-form-msg-inquiry').hide();
                $('#cu-circle-fb').show();
                $('#cu-circle-linkein').show();
                $('#cu-circle-inquiry').show();
                $('#cu-circle-career').show();
                $('#cu-img-career').click(function(){
                    $('#cu-form').toggle(300);
                    $('#cu-form-message').toggle(300);
                    $('#cu-circle-fb').toggle(300);
                    $('#cu-circle-linkein').toggle(300);
                    $('#cu-circle-inquiry').toggle(300);
                    $(this).parent().toggleClass('cu-active-career');
                });
                $('#cu-img-inquiry').click(function(){
                    $('#cu-form-inquiry').toggle(300);
                    $('#cu-form-msg-inquiry').toggle(300);
                    $('#cu-circle-fb').toggle(300);
                    $('#cu-circle-linkein').toggle(300);
                    $('#cu-circle-career').toggle(300);
                });
            });
        </script>
@endpush

@section('content')
  <div class="main-content">    
    <div id="cu-container">
        <svg width="100%" height="100%" id="line" class=""></svg>
        <div class="cu-img-container" id="cu-circle-linkein">
            <svg width="100%" height="100%" id="cu-linkedin-line" class="cu-line"></svg>
            <svg width="100%" height="100%" id="cu-linkedin-line2" class="cu-line"></svg>
             <a href="{{ $content->linkedin }}" target="_blank"><img src="{{ asset('images/contactus/linkedIn.png') }}" alt="Linked In" class="cu-img"/></a>
        </div>
        <div class="cu-img-container" id="cu-circle-fb">
            <svg width="100%" height="100%" id="cu-fb-line" class="cu-line"></svg>
            <a href="{{ $content->fb_link }}" target="_blank"><img src="{{ asset('images/contactus/fb-logo.png') }}" alt="Fb" class="cu-img"/></a>
        </div>
        <div class="cu-img-container" id="cu-circle-career">
            <svg width="100%" height="100%" id="cu-career-line" class="cu-line"></svg>
            <svg width="100%" height="100%" id="cu-career-line2" class="cu-line"></svg>
            <a href="#" id="cu-img-career"><img src="{{ asset('images/contactus/career.png') }}" alt="Career" class="cu-img" /></a>
        </div>
        <div class="cu-img-container" id="cu-circle-inquiry">
            <svg width="100%" height="100%" id="cu-inquiry-line" class="cu-line"></svg>
            <a href="#" id="cu-img-inquiry"><img src="{{ asset('images/contactus/inquiry.png') }} " alt="Inquiry" class="cu-img"/></a>
            
        </div>
    </div>
    <!-- Career form -->
    <p id="cu-form-message">Interested in joining our team? Fill out the form below.</p>
    <div id="cu-form">
        <form method="">
        <div class="cu-form-field">
            <label>NAME:</label>
            <input type="text" placeholder="Full Name" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>EMAIL ADDRESS:</label>
            <input type="text" placeholder="Email" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>MOBILE NUMBER:</label>
            <input type="text" placeholder="Mobile Number" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field cu-message">
            <label>MESSAGE:</label>
        </div>
        <div class="cu-form-field">
            <textarea name=""></textarea>
        </div>
        <div class="cu-form-field cu-button">
            <input type="submit" name="" value="UPLOAD"/>                           
            <label for="cu-file-upload" class="cu-attach-icon">
                <img src="{{ asset('images/contactus/attachment-icon.png') }}" alt="Attach File" />
            </label>
            <input id= "cu-file-upload" type="file" name="" alt="Attach File"/>
            
        </div>
        </form>
    </div>
    <!-- Inquiry form -->
    <p id="cu-form-msg-inquiry">If your interested in our service and how we can help you, feel free to reach us by filling out form below.</p>
    <div id="cu-form-inquiry">
        <form method="">
        <div class="cu-form-field">
            <label>NAME:</label>
            <input type="text" placeholder="Full Name" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>EMAIL ADDRESS:</label>
            <input type="text" placeholder="Email" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>MOBILE NUMBER:</label>
            <input type="text" placeholder="Mobile Number" name=""/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field cu-message">
            <label>MESSAGE:</label>
        </div>
        <div class="cu-form-field">
            <textarea name=""></textarea>
        </div>
        <div class="cu-form-field cu-button">
            <input type="submit" name="" value="UPLOAD"/>                           
            <label for="cu-file-upload" class="cu-attach-icon">
                <img src="{{ asset('images/contactus/attachment-icon.png') }}" alt="Attach File" />
            </label>
            <input id= "cu-file-upload" type="file" name="" alt="Attach File"/>
            
        </div>
        </form>
    </div>
</div>  
@endsection