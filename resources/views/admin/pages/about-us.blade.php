<form action="" method="POST" >
{{ csrf_field() }}
<input type="hidden" name="page_name" value="1" />
<input type="hidden" name="method" value="_PUT" />
<!--about us profile -->
<div class="row">
  <div class="x_title">
    <h2><span class="fa fa-users"></span> Directors</h2>
    <button type="submit" class="btn btn-success pull-right">Save</button>
    <div class="clearfix"></div>
  </div>
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="aboutUsTab" class="nav nav-tabs bar_tabs" role="tablist">
      <li role="presentation" class="active"><a href="#leftProfile1" id="left-profiles" role="tab" data-toggle="tab"  aria-expanded="true"><span class="fa fa-users"></span> Left Directors</a>
      </li>
      <li role="presentation" class=""><a href="#rightProfile2" id="right-profiles" role="tab" data-toggle="tab" aria-expanded="false"><span class="fa fa-users"></span> Right Directors</a>
      </li>
    </ul>
    <div id="aboutUsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="leftProfile1" aria-labelledby="">
         <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              @foreach($directors as $key => $director)
              @if($key < 4)
              <article class="well directors">
                <div class="form-group">
                    <label class="control-label col-md-2">Name:</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="directors[]" placeholder="John Doe" value="{{ $director->director_name }}">
                    </div>
                     <label class="control-label col-md-2">Position:</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="directors_position[]" placeholder="John Doe" value="{{ $director->director_position }}">
                    </div>
                </div><br /><br />
                <div class="form-group">    
                    <label class="control-label col-md-2">Description:</label>
                    <div class="col-md-4">
                    <textarea class="form-control" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry." name="directors_desc[]" >{{ $director->director_desc}} </textarea>
                  </div>
                  <label class="control-label col-md-2">Link:</label>
                  <div class="col-md-4">
                      <input type="text" class="form-control" name="director_link[]" placeholder="http://linkedin.com/john-doe" value="{{ $director->url }}">
                    </div>
                </div>
              </article>
              @else
                @break;
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="rightProfile2" aria-labelledby="">
         <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              @foreach($directors as $key => $director)
              @if($key > 3)
              <article class="well directors">
                <div class="form-group">
                    <label class="control-label col-md-2">Name:</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="directors[]" placeholder="John Doe" value="{{ $director->director_name }}">
                    </div>
                     <label class="control-label col-md-2">Position:</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="directors_position[]" placeholder="John Doe" value="{{ $director->director_position }}">
                    </div>
                </div><br /><br />
                <div class="form-group">    
                    <label class="control-label col-md-2">Description:</label>
                    <div class="col-md-4">
                    <textarea class="form-control" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry." name="directors_desc[]" >{{ $director->director_desc}} </textarea>
                  </div>
                  <label class="control-label col-md-2">Link:</label>
                  <div class="col-md-4">
                      <input type="text" class="form-control" name="director_link[]" placeholder="http://linkedin.com/john-doe" value="{{ $director->url }}">
                    </div>
                </div>
              </article>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>
<!--end about us profile -->

<!--about us image & seo -->
<div class="row">
 <div class="col-md-4">
    <div class="x_panel">
      <div class="x_title">
        <h2><span class="fa fa-file-image-o"></span> Image</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <input type="file" name="aboutUs_image" /> <br />
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
        <div class="form-group">
            <label class="">Meta Description (150 max):</label>
            <textarea class="form-control" rows="2" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry." name="meta_description" >{{ $aboutInfo->meta_description}}</textarea>
        </div> 
        <div class="form-group">
            <label class="">Meta Keywords (Separate with comma):</label>
            <textarea class="form-control" rows="2" placeholder="Lorem, Ipsum, is, simply, dummy, text, of" name="meta_keywords" >{{ $aboutInfo->meta_keywords }}</textarea>
        </div>
    </div>
  </div>
</div>
</div>
<!--end about us image & seo -->		
</form>
