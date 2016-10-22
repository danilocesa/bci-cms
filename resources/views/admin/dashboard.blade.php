@extends('admin.shared._master')
@section('title', 'Dashboard')
@section('styles')
<style>
	.widget-chart {height: 70px; min-width: 160px;}
	.widget-text {float: left;}
	.widget-text span {line-height:2em; font-size:0.8em;}
	.widget-text p {margin-bottom: 0; font-size: 2.5em; line-height: 1em; }
	.widget-icon {float: right;}
	.widget-icon i {font-size: 4em; color: #E6E9ED;}
	.widget-title {color: white; padding: 3px 10px; font-size: 0.85em; margin-top: 5px;}
	.first {background: #1abc9c;}
	.second {background: #3498db;}
	.third {background: #e74c3c;}
	.fourth {background: #9b59b6;}
	
	.title_activity {margin-left: 1em;}
	.title_activity h3 {font-size: 1.1em; font-weight:bold;}
	.activity {width: 100%; display: flex; align-items: center;}
	.activity .act-img {width: 12%;}
	.activity .act-content {width: 68%;}
	.activity .act-date {width: 20%; text-align: right;}
	.activity .act-img img { border-radius: 50%;  width: 30px; height: 30px;}
</style>
@endsection
@section('main-content')
 <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>

            <!--   <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>
			
			<div class="row">
	
			<!-- Widget 1 -->
				<!-- <div class="col-md-3 col-sm-3 col-xs-3">
					<div class="x_panel">
						<div class="widget-chart">
							<div class="widget-text">	
								<span>TODAYS VISITS</span>					
								<p>1,000</p>
							</div>
							<div class="widget-icon">						
								<i class="fa fa-eye"></i>
							</div>
						</div>
						<div class="widget-title first">
							<span>32% higher than yesterday</span>
						</div>
					</div>
				</div> -->
			<!-- End Widget 1 -->
			
			<!-- Widget 2 -->
				<!-- <div class="col-md-3 col-sm-3 col-xs-3">
					<div class="x_panel">
						<div class="widget-chart">
							<div class="widget-text">	
								<span>TODAYS USERS</span>					
								<p>1,000</p>
							</div>
							<div class="widget-icon">						
								<i class="fa fa-users"></i>
							</div>
						</div>
						<div class="widget-title second">
							<span>32% higher than yesterday</span>
						</div>
					</div>
				</div> -->
			<!-- End Widget 2 -->
			
			<!-- Widget 3 -->
				<!-- <div class="col-md-3 col-sm-3 col-xs-3">
					<div class="x_panel">
						<div class="widget-chart">
							<div class="widget-text">	
								<span>TODAYS SALES</span>					
								<p>1M</p>
							</div>
							<div class="widget-icon">						
								<i class="fa fa-money"></i>
							</div>
						</div>
						<div class="widget-title third">
							<span>32% higher than yesterday</span>
						</div>
					</div>
				</div> -->
			<!-- End Widget 3 -->
			
			<!-- Widget 4 -->
				<!-- <div class="col-md-3 col-sm-3 col-xs-3">
					<div class="x_panel">
						<div class="widget-chart">
							<div class="widget-text">	
								<span>TODAYS VISIT</span>					
								<p>1,000</p>
							</div>
							<div class="widget-icon">						
								<i class="fa fa-users"></i>
							</div>
						</div>
						<div class="widget-title fourth">
							<span>32% higher than yesterday</span>
						</div>
					</div>
				</div> -->
			<!-- End Widget 4 -->
			
			</div>
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            Under Construction
          </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
                  </div>
                </div>
              </div>
            </div>
						
            <div class="row">
			
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
                  </div>
                </div>
              </div>				
				
				<div class="row col-md-6 col-sm-6 col-xs-6">
					<div class="title_activity">
						<h3>ACTIVITY</h3>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="activity">
								<div class="act-img">
								  <img src="../images/avatar/jenny.jpg">
								</div>
								<div class="act-content">
								  <div class="summary">
									You added Jenny Hessa to your coworker group.
								  </div>
								</div>
								<div class="act-date">
								  3 days ago
								</div>	
							</div>				
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="activity">
								<div class="act-img">
								  <img src="../images/avatar/jenny.jpg">
								</div>
								<div class="act-content">
								  <div class="summary">
									You added Jenny Hessa to your coworker group.
								  </div>
								</div>
								<div class="act-date">
								  3 days ago
								</div>	
							</div>				
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="activity">
								<div class="act-img">
								  <img src="../images/avatar/jenny.jpg">
								</div>
								<div class="act-content">
								  <div class="summary">
									You added Jenny Hessa to your coworker group.
								  </div>
								</div>
								<div class="act-date">
								  3 days ago
								</div>	
							</div>				
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="activity">
								<div class="act-img">
								  <img src="../images/avatar/jenny.jpg">
								</div>
								<div class="act-content">
								  <div class="summary">
									You added Jenny Hessa to your coworker group.
								  </div>
								</div>
								<div class="act-date">
								  3 days ago
								</div>	
							</div>				
						</div>
					</div>
				</div>
				
            </div>
								
	</div>
@endsection          