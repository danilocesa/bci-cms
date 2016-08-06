@extends('admin.shared._master')
@section('title','Page Mangement')
@section('main-content')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pages</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="pagesTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="{{ url('web-admin/page-management') }}" id="aboutUsTab" role="tab" aria-expanded="true">About Us</a>
                        </li>
                        <li role="presentation" class=""><a href="{{ url('web-admin/page-management/clients') }}" role="tab" id="clientsTab" data-toggle="tab" aria-expanded="false">Clients</a>
                        </li>
                        <li role="presentation" class=""><a href="#portfolioTab1" role="tab" id="portfolioTab" data-toggle="tab" aria-expanded="false">Portfolio</a>
                        </li>
                        <!-- <li role="presentation" class=""><a href="#whatsNewTab1" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">What's New</a>
                        </li> -->
                        <li role="presentation" class=""><a href="#contactUsTab1" role="tab" id="contactUsTab" data-toggle="tab" aria-expanded="false">Contact Us</a>
                        </li>
                      </ul>
                      <div id="pagesTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="aboutUsTab1" aria-labelledby="aboutUsTab">
                          @include('admin.pages.about-us')
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="clientsTab1" aria-labelledby="clientsTab">dsfsdf
                          @include('admin.pages.clients')
                        
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="portfolioTab1" aria-labelledby="portfolioTab">
                          <p>xxFood truck fixi beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                       <!--  <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <p>xxn four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div> -->
                        <div role="tabpanel" class="tab-pane fade" id="contactUsTab1" aria-labelledby="contactUsTab">
                          <p>eer mlkshk </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
 	
@endsection