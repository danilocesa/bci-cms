@extends('_master')
@section('title', 'Contact Us')
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
    var progress_bar_id     = '#progress-wrp';
    var progress_port_id    = '#progress-port';
    $(progress_bar_id).hide();
    $(progress_port_id).hide();

    $('#cu-form').hide();
    $('#cu-form-message').hide();
    $('#cu-form-msg-inquiry').hide();
    $('#cu-circle-fb').show();
    $('#cu-circle-linkein').show();
    $('#cu-circle-inquiry').show();
    $('#cu-circle-career').show();
    $('#cu-img-career').on('click',function(){
        $('#cu-form').toggle(300);
        $('#cu-form-message').toggle(300);
        $('#cu-circle-fb').toggle(300);
        $('#cu-circle-linkein').toggle(300);
        $('#cu-circle-inquiry').toggle(300);
        $('.form-err').hide();
        $(progress_bar_id).hide();
        $(progress_port_id).hide();
        $(this).parent().toggleClass('cu-active-career');
    });
    $('#cu-img-inquiry').on('click',function(){
        $('#cu-form-inquiry').toggle(300);
        $('#cu-form-msg-inquiry').toggle(300);
        $('#cu-circle-fb').toggle(300);
        $('#cu-circle-linkein').toggle(300);
        $('#cu-circle-career').toggle(300);
        $('.form-err').hide();
        $(progress_bar_id).hide();
        $(progress_port_id).hide();
    });
    //Validating forms
    $("form").on('submit',function(e){
        var $self = $(this);
        var $file = $('input:file');
        var file,validcheck = 1,myFormData = new FormData();

        $(progress_bar_id).hide();
        $(progress_port_id).hide();


        if($self.data('formtype') == 1){
            var $check = validateForm(1);
            if(!$check){
                validcheck = 0;
                $('.form-err').show();
                return false;
            }else {
                $('.form-err').hide();
            }
            file = $file[0].files[0];
            $(progress_port_id).css({'top':'363px','z-index':'50','left':'-37px'});
        }
        else{
            var $check = validateForm(2);
            if(!$check){
                validcheck = 0;
                $('.form-err').show();
                 return false;
            }else {
                $('.form-err').hide();
            }
            file = $file[1].files[0];
            $(progress_port_id).css({'top':'363px','z-index':'50','left':'12px'});
        }

        //Check if file has value
        if($file.val()){
            $('.form-show').hide();
            if(file.type.match('image.*') == null){
              $('.form-err').show();
              $('.form-err').html('<div class="header">Please select image only </div>');
              return false;
            }  
            //Check image size
            if(file.size > 3145728){
                $('.form-err').show();
                $('.form-err').html('<div class="header">Maximum of 3MB only</div>');
                return false;
            } 

            $(progress_bar_id).show();
            $(progress_port_id).show();
        }

        console.log('go');

        e.preventDefault();
        return false;
    });
    //If uploading file
    // $("input:file").change(function (event){
    //     var $self = $(this);
    //     var input = $(event.currentTarget);
    //     var file = input[0].files[0];
    //     //Check for valid image
        
         

        

    //     $.ajax({
    //       url: '{{ url("web-admin/page-uploads") }}' ,
    //       type: 'POST',
    //       processData: false, // important
    //       contentType: false, // important
    //       dataType : 'json',
    //       data: myFormData,
    //       success:function(result){
    //         console.log(result);
    //       },
    //       xhr: function(){
    //         var xhr = $.ajaxSettings.xhr();
    //         if (xhr.upload) {
    //             xhr.upload.addEventListener('progress', function(event) {
    //                 var percent = 0;
    //                 var position = event.loaded || event.position;
    //                 var total = event.total;
    //                 if (event.lengthComputable) {
    //                     percent = Math.ceil(position / total * 100);
    //                 }
    //                 $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
    //                 $(progress_bar_id + " .status").text(percent +"%");
    //             }, true);
    //         }
    //         return xhr;
    //       },
    //       mimeType:"multipart/form-data"
    //     }).done(function(res){
    //       $(progress_bar_id).hide();
    //     });
    // });

});

function validateForm(field) {
    var isValid = true;
    if(field == 1){
        $('.car-field').each(function() {
        if ($(this).val() === '' )
            isValid = false;
        });
    }
    else{
        $('.con-field').each(function() {
        if ($(this).val() === '' )
            isValid = false;
        });
    }
    
    return isValid;
}
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
    <div id="progress-port"><div class="progress-bar"></div ><div class="status">0%</div></div>
    <!-- Career form -->
    <p id="cu-form-message">Interested in joining our team? Fill out the form below.</p>
    <div id="cu-form">
        <form method="post" enctype="multipart/form-data" action="{{ url('contact-submit') }}" data-formtype="1">
            {{ csrf_field() }}
            <div class="ui small negative message form-err">
              <div class="header">
                Please complete all the fields.
              </div>
            </div>
            <input type="hidden" name="form_type" value="1" />
            <div class="cu-form-field">
                <label>NAME:</label>
                <input type="text" placeholder="Full Name" name="fullname" class="car-field" />
                <span class="cu-error"></span>
            </div>
            <div class="cu-form-field">
                <label>EMAIL ADDRESS:</label>
                <input type="text" placeholder="Email" name="email" class="car-field" />
                <span class="cu-error"></span>
            </div>
            <div class="cu-form-field">
                <label>MOBILE NUMBER:</label>
                <input type="text" placeholder="Mobile Number" name="mobile" class="car-field" />
                <span class="cu-error"></span>
            </div>
            <div class="cu-form-field cu-message">
                <label>MESSAGE:</label>
            </div>
            <div class="cu-form-field">
                <textarea name="message" class="car-field" ></textarea>
            </div>
            <div class="cu-form-field cu-button">
                
                <input type="submit" value="SUBMIT" data-subtype="1" class="con-form" />                           
                <label for="cu-file-upload" class="cu-attach-icon">
                    <img src="{{ asset('images/contactus/attachment-icon.png') }}" alt="Attach File" />
                </label>
                <input id="cu-file-upload" type="file" name="file" alt="Attach File"/>
                
            </div>
        </form>
    </div>
    <!-- Inquiry form -->
    <p id="cu-form-msg-inquiry">If your interested in our service and how we can help you, feel free to reach us by filling out form below.</p>
    <div id="cu-form-inquiry">
        <form method="" data-formtype="2">
        {{ csrf_field() }}
         <div class="ui small negative message form-err">
              <div class="header">
                Please complete all the fields.
              </div>
            </div>
         <input type="hidden" name="form_type" value="2" />
        <div class="cu-form-field">
            <label>NAME:</label>
            <input type="text" placeholder="Full Name" name="" class="con-field"/>
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>EMAIL ADDRESS:</label>
            <input type="text" placeholder="Email" name="" class="con-field" />
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field">
            <label>MOBILE NUMBER:</label>
            <input type="text" placeholder="Mobile Number" name="" class="con-field" />
            <span class="cu-error"></span>
        </div>
        <div class="cu-form-field cu-message">
            <label>MESSAGE:</label>
        </div>
        <div class="cu-form-field">
            <textarea name="" class="con-field" ></textarea>
        </div>
        <div class="cu-form-field cu-button">
            <input type="submit" name="" value="SUBMIT" data-subtype="2" class="con-form"/>                           
            <label for="cu-file-upload" class="cu-attach-icon">
                <img src="{{ asset('images/contactus/attachment-icon.png') }}" alt="Attach File" />
            </label>
            <input id= "cu-file-upload" type="file" name="" alt="Attach File"/>
            
        </div>
        </form>
    </div>
</div>  
@endsection