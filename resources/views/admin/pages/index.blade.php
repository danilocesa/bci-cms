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
                        <li role="presentation" class=""><a href="{{ url('web-admin/page-management/clients') }}" role="tab" id="clientsTab" aria-expanded="false">Clients</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Portfolio</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">What's New</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contact Us</a>
                        </li>
                      </ul>
                      <div id="pagesTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="aboutUsTab1" aria-labelledby="aboutUsTab">
                          @include('admin.pages.about-us')
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="clientstab" aria-labelledby="clientsTab">
                          @include('admin.pages.clients')
                        
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
 	
@endsection