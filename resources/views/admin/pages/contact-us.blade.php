<form method="POST" id="contactUs-form" data-parsley-validate>
{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="hidden" name="page_category" value="2" />
<!--contact-us page & seo-->
@if (session('success'))
   <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    Page updated successfully!
  </div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
   <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
   <div class="x_title">
       <button type="submit" class="btn btn-success pull-right" data-type="contact-us">Save</button>
      <div class="clearfix"></div>
    </div>
<div class="col-md-4">
<div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-link"></span>  Links</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="form-horizontal form-label-left">
        <input type="hidden" name="page_content_id" value="{{ $contactContent->page_content_id}} " />
        <div class="form-group">
            <label class=""><span class="fa fa-facebook-square"></span> Facebook link:</label>
            <input type="text" name="facebook_link" class="form-control" placeholder="http://facebook.com/bci-enav" value="{{ $contactContent->fb_link }}" />
        </div> 
        <div class="form-group">
            <label class=""><span class="fa fa-linkedin-square"></span> Linkedin link:</label>
            <input type="text" name="linkedin_link" class="form-control" placeholder="http://linkedin.com/bci-enav" value="{{ $contactContent->linkedin }}" />
        </div>
          <div class="form-group">
            <label class=""><span class="fa fa-send"></span> Career email:</label>
            <input type="text" name="career_email" class="form-control" placeholder="career@bci-enav.com" value="{{ $contactContent->career_email }}" />
        </div> 
          <div class="form-group">
            <label class=""><span class="fa fa-send"></span> Inquiry email:</label>
            <input type="text" name="inquiry_email" class="form-control" placeholder="inquiry@bci-enav.com" value="{{ $contactContent->inquiry_email }}" />
        </div>     
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
<div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-file"></span>  Page Description</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="">Description:</label>
            <textarea class="form-control" name="page_description" rows="6" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.">{{ $contactInfo->page_description }}</textarea>
        </div> 
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-star"></span> Search Engine Optimization (SEO)</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="">Meta Description (150 max):</label>
            <textarea class="form-control" name="meta_description" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.">{{ $contactInfo->meta_description }}</textarea>
        </div> 
        <div class="form-group">
            <label class="">Meta Keywords (Separate with comma):</label>
            <textarea class="form-control" name="meta_keywords" rows="2" placeholder="Lorem, Ipsum, is, simply, dummy, text, of">{{ $contactInfo->meta_keywords }}</textarea>
        </div>    
      </div>
    </div>
  </div>
</div>
<!--end contact-us page & seo -->		
</form>