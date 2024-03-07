@extends('frontend.layout.app')
@section('contents')
    <!-- Page Title Start -->
    <section class="page-title title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job List</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Job List</li>
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

    <!-- Job Section End -->
    <section class="job-style-two job-list-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Jobs You May Be Interested In</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
            </div>

            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-lg-12">
                        <div class="job-card-two">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <div class="company-logo">
                                        <a href="{{route('jobDetail',$job->id)}}"></a>
                                        <img src="{{ asset('/'. $job->image.'') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="job-info">
                                        <h3>
                                            <a href="{{route('jobDetail',$job->id)}}">{{$job->title}}</a>
                                        </h3>
                                        <ul>
                                            <li>
                                                <i class='bx bx-briefcase'></i>
                                                {{$job->JobCategory->name}}
                                            </li>
                                            <li>
                                                <i class='bx bx-dollar'></i>
                                                {{$job->salary}}k
                                            </li>
                                            <li>
                                                <i class='bx bx-location-plus'></i>
                                                {{$job->location}}
                                            </li>
                                            <li>
                                                <i class='bx bx-stopwatch'></i>
                                                {{$job->created_at->diffForHumans()}}
                                            </li>
                                        </ul>

                                        <span>{{$job->jobType->name}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="theme-btn text-end">
                                        <a href="{{route('jobDetail',$job->id)}}" class="default-btn">
                                            Browse Job
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <nav aria-label="Page navigation example">
                {{ $jobs->links() }}
            </nav>
        </div>
    </section>
    <!-- Job Section End -->

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

                <div class="col-md-6">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required
                            autocomplete="off">

                        <button class="default-btn sub-btn" type="submit">
                            Subscribe
                        </button>

                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->
@endsection
