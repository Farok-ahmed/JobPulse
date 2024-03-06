@extends('frontend.layout.app')
@section('contents')
    <!-- Page Title Start -->
    <section class="page-title title-bg6">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job Details</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Job Details</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Job Details Section Start -->
    <section class="job-details ptb-100">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-details-text">
                                <div class="job-card">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="company-logo">
                                                <img src="{{ asset('/' . $jobs->image . '') }}" alt="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="job-info">
                                                <h3>{{ $jobs->title }}</h3>
                                                <ul>
                                                    <li>
                                                        <i class='bx bx-location-plus'></i>
                                                        {{ $jobs->location }}
                                                    </li>
                                                    <li>
                                                        <i class='bx bx-filter-alt'></i>
                                                        Vacancy {{ $jobs->vacancy }}

                                                    </li>
                                                    <li>
                                                        <i class='bx bx-briefcase'></i>

                                                        {{ $jobs->jobType->name }}
                                                    </li>
                                                </ul>

                                                <span>
                                                    <i class='bx bx-paper-plane'></i>
                                                    Apply Before: {{ $jobs->apply_before }}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="details-text">
                                    <h3>Description</h3>
                                    <p>{{ $jobs->description }}</p>
                                </div>

                                <div class="details-text">
                                    <h3>Responsibility</h3>
                                    <p>
                                    <p>{{ $jobs->responsibility }}</p>
                                    </p>
                                </div>

                                <div class="details-text">
                                    <h3>Requirements</h3>
                                    <p>{{ $jobs->qualifications }}</p>
                                </div>

                                <div class="details-text">
                                    <h3>Benefits</h1>
                                        <p>{{ $jobs->benefits }}</p>
                                </div>

                               <div class="d-flex">
                                <div class="theme-btn">
                                    @if (Auth::check())
                                        <div>
                                            <form method="POST" action="{{ route('applyJob',$jobs->id) }}">@csrf
                                                <input type="hidden" name="job_id" value="{{ $jobs->id }}">
                                                <input type="hidden" name="employer_id" value="{{ $jobs->user_id }}">
                                                <button class="default-btn" type="submit">Apply Now</button>
                                            </form>
                                        </div>
                                        @else
                                        <a href="{{ route('login') }}" class="default-btn">Login to Apply</a>
                                    @endif
                                </div>
                                <div class="theme-btn">
                                    @if (Auth::check())
                                        <div>
                                            <form method="POST" action="{{ route('saveJob',$jobs->id) }}">@csrf
                                                <input type="hidden" name="job_id" value="{{ $jobs->id }}">
                                                <input type="hidden" name="employer_id" value="{{ $jobs->user_id }}">
                                                <button class="default-btn" type="submit">Save Now</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                               </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <div class="details-text">
                            <h3>Job Summery</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><span>Experince</span></td>
                                                <td>{{ $jobs->experience }} Years</td>

                                            </tr>
                                            <tr>
                                                <td><span>Location</span></td>
                                                <td> {{ $jobs->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Job Type </span></td>
                                                <td> {{ $jobs->jobType->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Salary</span></td>
                                                <td>$ {{ $jobs->salary }}k</td>

                                            </tr>
                                            <tr>
                                                <td><span>Language</span></td>
                                                <td>English</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="job-sidebar">
                        <h3>Company Details</h3>
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><span>Company</span></td>
                                        <td>{{ $jobs->name }}</td>
                                    </tr>

                                    <tr>
                                        <td><span>Email</span></td>
                                        <td><a href="mailto:{{ $jobs->User->email }}">{{ $jobs->User->email }}</a></td>
                                    </tr>
                                    <tr>
                                        <td><span>Website</span></td>
                                        <td><a href="#">{{ $jobs->website }}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="job-sidebar social-share">
                        <h3>Share In</h3>
                        <ul>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Details Section End -->



    <!-- Subscribe Section Start -->
    <section class="subscribe-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Get New Job Notifications</h2>
                        <p>Subscribe & get all related jobs notification</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->
@endsection
