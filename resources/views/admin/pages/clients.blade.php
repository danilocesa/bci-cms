<form method="POST" id="clients-form" data-parsley-validate>
{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="hidden" name="page_category" value="2" />
<!--clients page-->
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
  <div class="col-md-12">
    <div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-file-image-o"></span> Images</h2>
       <button type="submit" class="btn btn-success pull-right">Save</button>
      <div class="clearfix"></div>
    </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>

           <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
               <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
          <div class="col-md-55">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                <div class="mask no-caption">
                  <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-link"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="text" placeholder="http://example.com">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end clients page -->

<!--clients seo -->
<div class="row">
<div class="col-md-6">
  <div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-star"></span> Page Description</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="">Page Description:</label>
            <textarea class="form-control" name="page_description" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.">{{ $pageInfo->page_description }}</textarea>
        </div>    
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="x_panel">
    <div class="x_title">
      <h2><span class="fa fa-star"></span> Search Engine Optimization (SEO)</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="">Meta Description (150 max):</label>
            <textarea class="form-control" name="meta_description" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.">{{ $pageInfo->meta_description }}</textarea>
        </div> 
        <div class="form-group">
            <label class="">Meta Keywords (Separate with comma):</label>
            <textarea class="form-control" name="meta_keywords" rows="2" placeholder="Lorem, Ipsum, is, simply, dummy, text, of">{{ $pageInfo->meta_keywords }}</textarea>
        </div>    
      </div>
    </div>
  </div>
</div>
</div>
<!--end clients seo -->		
</form>