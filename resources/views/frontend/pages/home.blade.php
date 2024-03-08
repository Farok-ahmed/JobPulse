@extends('frontend.layout.app')
@section('contents')
    		<!-- Banner Section Start -->
		<div class="banner-section">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="banner-content text-center">
							<p>Find Jobs, Employment & Career Opportunities</p>
							<h1>Drop Resume & Get Your Desire Job!</h1>

							<form action="{{route('job')}}" method="GET" class="banner-form">

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="title">Keyword:</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Job Title">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="location">Location:</label>
											<input name="location" type="text" class="form-control" id="location" placeholder="City or State">
										</div>
									</div>

									<div class="col-md-4">
										<button type="submit" class="find-btn">
											Find A Job
											<i class='bx bx-search'></i>
										</button>
									</div>
								</div>
							</form>

							<ul class="keyword">
								<li>Trending Keywords:</li>
								<li><a href="#">Automotive,</a></li>
								<li><a href="#">Education,</a></li>
								<li><a href="#">Health</a></li>
								<li>and</li>
								<li><a href="#">Care Engineering</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Banner Section End -->

		<!-- Category Section Start -->
		<section class="categories-section pt-100 pb-70">
			<div class="container">
				<div class="section-title text-center">
					<h2>Choose Your Category</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
				</div>

				<div class="row">
                    @foreach ($jobCategories as $category )
					<div class="col-lg-3 col-md-4 col-sm-6">
						<a href="job-list.html">
							<div class="category-card">
								<i class='flaticon-accounting'></i>
								<h3>{{$category->name}}</h3>
								<p>{{$jobCountCategories}} open position</p>
							</div>
						</a>
					</div>
                    @endforeach

				</div>
			</div>
		</section>
		<!-- Category Section End -->

		<!-- Jobs Section Start -->
		<section class="job-section pb-70">
			<div class="container">
				<div class="section-title text-center">
					<h2>Jobs You May Be Interested In</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
				</div>

				<div class="row">
                    @foreach ($jobs as $job )
                    <div class="col-sm-6">
						<div class="job-card">
							<div class="row align-items-center">
								<div class="col-lg-3">
									<div class="thumb-img">
										<a href="{{route('jobDetail',$job->id)}}">
											<img src="{{asset('/'.$job->job_image.'')}}" alt="company logo">
										</a>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="job-info">
										<h3>
											<a href="{{route('jobDetail',$job->id)}}">{{$job->title}}</a>
										</h3>
										<ul>

											<li>
												<i class='bx bx-location-plus'></i>
												{{$job->location}}
											</li>
											<li>
												<i class='bx bx-dollar' ></i>
												{{$job->salary}}k
											</li>
											<li>
												<i class='bx bx-briefcase' ></i>
												{{$job->vacancy}}
											</li>
										</ul>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="job-save">
										<span>{{$job->jobType->name}}</span>
										<a href="#">
											<i class='bx bx-heart'></i>
										</a>
										<p>
											<i class='bx bx-stopwatch' ></i>
                                            {{$job->created_at->diffForHumans()}}

										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</section>
		<!-- Jobs Section End -->

		<!-- Way To Use Section Start -->
		<section class="use-section pt-100 pb-70">
			<div class="container">
				<div class="section-title text-center">
					<h2>Easiest Way To Use</h2>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="use-text">
							<span>1</span>
							<i class='flaticon-website'></i>
							<h3>Browse Job</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
						</div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="use-text">
							<span>2</span>
							<i class='flaticon-recruitment'></i>
							<h3>Find Your Vaccancy</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
						</div>
					</div>

					<div class="col-md-4 col-sm-6 offset-sm-3 offset-md-0">
						<div class="use-text">
							<span>3</span>
							<i class='flaticon-login'></i>
							<h3>Submit Resume</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Way To Use Section End -->

		<!-- Companies Section Start -->
		<section class="company-section pt-100 pb-70">
			<div class="container">
				<div class="section-title text-center">
					<h2>Top Companies</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
				</div>

				<div class="row">
                    @foreach ($jobs as $job )
					<div class="col-lg-3 col-sm-6">
						<div class="company-card">
							<div class="company-logo">
								<a href="">
									<img src="{{asset('/'.$job->image.'')}}" alt="company logo">
								</a>
							</div>
							<div class="company-text">
								<h3>{{$job->name}}</h3>
								<p>
									{{-- <i class='bx bx-location-plus'></i> --}}
									{{-- {{$company->job->benefits}} --}}
								</p>

							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
		</section>
		<!-- Companies Section End -->

		<!-- Why Choose Section Start -->
		<section class="why-choose">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-7 p-0">
						<div class="why-choose-text pt-100 pb-70">
							<div class="section-title text-center">
								<h2>Why You Choose Jovie?</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolorei.</p>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="media">
										<i class="flaticon-group align-self-center mr-3"></i>
										<div class="media-body">
											<h5 class="mt-0">Best Talented People</h5>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="media">
										<i class="flaticon-research align-self-center mr-3"></i>
										<div class="media-body">
											<h5 class="mt-0">Easy To Find Canditate</h5>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="media">
										<i class="flaticon-discussion align-self-center mr-3"></i>
										<div class="media-body">
											<h5 class="mt-0">Easy To Communicate</h5>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="media">
										<i class="flaticon-recruitment align-self-center mr-3"></i>
										<div class="media-body">
											<h5 class="mt-0">Global Recruitment Option</h5>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										</div>
									</div>
								</div>
							</div>

							<div class="row counter-area">
								<div class="col-md-3 col-6">
										<div class="counter-text">
										<h2><span>127</span></h2>
										<p>Job Posted</p>
									</div>
								</div>

								<div class="col-md-3 col-6">
									<div class="counter-text">
										<h2><span>137</span></h2>
										<p>Job Filed</p>
									</div>
								</div>

								<div class="col-md-3 col-6">
									<div class="counter-text">
										<h2><span>180</span></h2>
										<p>Company</p>
									</div>
								</div>

								<div class="col-md-3 col-6">
									<div class="counter-text">
										<h2><span>144</span></h2>
										<p>Members</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-5 p-0">
						<div class="why-choose-img">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Why Choose Section End -->

		<!-- Job Info Section Start -->
		<div class="job-info pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="looking-job">
							<div class="media">
								<i class='flaticon-group align-self-start mr-3'></i>
								<div class="media-body">
									<h5 class="mt-0">Looking For a Job</h5>
									<p>Your next role could be with one of these top leading organizations</p>

									<a href="job-list.html">
										Apply Now
										<i class='bx bx-chevrons-right'></i>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="recruiting-card">
							<div class="media">
								<i class='flaticon-resume align-self-start mr-3'></i>
								<div class="media-body">
									<h5 class="mt-0">Are You Recruiting?</h5>
									<p>Your next role could be with one of these top leading organizations</p>

									<a href="post-job.html">
										Apply Now
										<i class='bx bx-chevrons-right'></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Job Info Section End -->


		<!-- Testimonial Section Start -->
		<section class="testimonial-section ptb-100">
			<div class="container">
				<div class="section-title text-center">
					<h2>What Client’s Say About Us</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
				</div>

				<div class="row">
					<div class="testimonial-slider owl-carousel owl-theme">
						<div class="testimonial-items">
							<div class="row align-items-center">
								<div class="col-lg-5 col-md-6 offset-md-3 offset-lg-0 p-0">
									<div class="testimonial-img">
										<img src="{{asset('frontend/assets/')}}/img/testimonial-img.jpg" alt="testimonial image">
									</div>
									<div class="testimonial-img-text">
										<h3>Alisa Meair</h3>
										<p>CEO of  Company</p>
									</div>
								</div>
								<div class="col-lg-7 p-0">
									<div class="testimonial-text">
										<i class='flaticon-left-quotes-sign'></i>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
									</div>
								</div>
							</div>
						</div>

						<div class="testimonial-items">
							<div class="row align-items-center">
								<div class="col-lg-5 col-md-6 offset-md-3 offset-lg-0 p-0">
									<div class="testimonial-img">
										<img src="{{asset('frontend/assets/')}}/img/testimonial-img-2.jpg" alt="testimonial image">
									</div>
									<div class="testimonial-img-text">
										<h3>John Doe</h3>
										<p>Web Designer</p>
									</div>
								</div>
								<div class="col-lg-7 p-0">
									<div class="testimonial-text">
										<i class='flaticon-left-quotes-sign'></i>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Section End -->

		<!-- Blog Section Start -->
		<section class="blog-section pt-100 pb-70">
			<div class="container">
				<div class="section-title text-center">
					<h2>News, Tips & Articles</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
				</div>

				<div class="row">
                    @foreach ($blogList as $blog)
                    <div class="col-lg-4 col-sm-6">
						<div class="blog-card">
							<div class="blog-img">
								<a href="blog-details.html">
									<img src="{{asset('/'.$blog->image.'')}}" alt="blog image">
								</a>
							</div>
							<div class="blog-text">
								<ul>
									<li>
										<i class='bx bxs-user'></i>
										{{$blog->user->name}}
									</li>
									<li>
										<i class='bx bx-calendar'></i>
										{{$blog->created_at->diffForHumans()}}
									</li>
								</ul>

								<h3>
									<a href="blog-details.html">
										{{$blog->title}}
									</a>
								</h3>
								<p>{{$blog->excerpt}}</p>

								<a href="{{route('blogSingle',$blog->id)}}" class="blog-btn">
									Read More
									<i class='bx bx-plus bx-spin'></i>
								</a>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</section>
@endsection
