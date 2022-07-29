@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="pl-0">
                                <div class="main-profile-overview">
                                    <div class="main-img-user profile-user">
                                        <img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                    </div>
                                    <div class="d-flex justify-content-between mg-b-20">
                                        <div>
                                            <h5 class="main-profile-name">Petey Cruiser</h5>
                                            <p class="main-profile-name-text">Web Designer</p>
                                        </div>
                                    </div>
                                    <h6>Bio</h6>
                                    <div class="main-profile-bio">
                                        pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure.. <a href="">More</a>
                                    </div><!-- main-profile-bio -->
                                    <div class="row">
                                        <div class="col-md-4 col mb20">
                                            <h5>947</h5>
                                            <h6 class="text-small text-muted mb-0">Followers</h6>
                                        </div>
                                        <div class="col-md-4 col mb20">
                                            <h5>583</h5>
                                            <h6 class="text-small text-muted mb-0">Tweets</h6>
                                        </div>
                                        <div class="col-md-4 col mb20">
                                            <h5>48</h5>
                                            <h6 class="text-small text-muted mb-0">Posts</h6>
                                        </div>
                                    </div>
                                    <hr class="mg-y-30">
                                    <label class="main-content-label tx-13 mg-b-20">Social</label>
                                    <div class="main-profile-social-list">
                                        <div class="media">
                                            <div class="media-icon bg-primary-transparent text-primary">
                                                <i class="icon ion-logo-github"></i>
                                            </div>
                                            <div class="media-body">
                                                <span>Github</span> <a href="">github.com/spruko</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-icon bg-success-transparent text-success">
                                                <i class="icon ion-logo-twitter"></i>
                                            </div>
                                            <div class="media-body">
                                                <span>Twitter</span> <a href="">twitter.com/spruko.me</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-icon bg-info-transparent text-info">
                                                <i class="icon ion-logo-linkedin"></i>
                                            </div>
                                            <div class="media-body">
                                                <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-icon bg-danger-transparent text-danger">
                                                <i class="icon ion-md-link"></i>
                                            </div>
                                            <div class="media-body">
                                                <span>My Portfolio</span> <a href="">spruko.com/</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mg-y-30">
                                    <h6>Skills</h6>
                                    <div class="skill-bar mb-4 clearfix mt-3">
                                        <span>HTML5 / CSS3</span>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <!--skill bar-->
                                    <div class="skill-bar mb-4 clearfix">
                                        <span>Javascript</span>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 89%"></div>
                                        </div>
                                    </div>
                                    <!--skill bar-->
                                    <div class="skill-bar mb-4 clearfix">
                                        <span>Bootstrap</span>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!--skill bar-->
                                    <div class="skill-bar clearfix">
                                        <span>Coffee</span>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <!--skill bar-->
                                </div><!-- main-profile-overview -->
                            </div>
                        </div>
                    </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
