<!--about us profile -->
<div class="row">
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="aboutUsTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#left-profiles" id="left-profiles" role="tab" data-toggle="tab"  aria-expanded="true"><span class="fa fa-users"></span> Left Profiles</a>
    </li>
    <li role="presentation" class=""><a href="#right-profiles" id="right-profiles" role="tab" data-toggle="tab" aria-expanded="false"><span class="fa fa-users"></span> Right Profiles</a>
    </li>
  </ul>
</div>
</div>
<!--end about us profile -->

<!--about us image & seo -->
<div class="row">
 <div class="col-md-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Image</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <input type="file" /> <br />
        <img src="{{ asset('image.png') }}" />
      </div>
    </div>
  </div>
<div class="col-md-8">
  <div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-star"></span> Search Engine Optimization (SEO)</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="">Meta Description (150 max):</label>
            <textarea class="form-control" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry."></textarea>
        </div> 
        <div class="form-group">
            <label class="">Meta Keywords (Separate with comma):</label>
            <textarea class="form-control" rows="2" placeholder="Lorem, Ipsum, is, simply, dummy, text, of"></textarea>
        </div>    
      </form>
    </div>
  </div>
</div>
<!--end about us image & seo -->		