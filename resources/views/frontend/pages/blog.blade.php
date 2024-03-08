@extends('frontend.layout.app')
@section('contents')
            <!-- Page Title Start -->
            <section class="page-title title-bg21">
                <div class="d-table">
                    <div class="d-table-cell">
                        <h2>Blog</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Blog</li>
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

            <!-- Blog Section Start -->
            <section class="blog-section blog-style-two pt-100 pb-70">
                <div class="container">
                    <div class="section-title text-center">
                        <h2>News, Tips & Articles</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
                    </div>

                    <div class="row">
                        @foreach ($blogList as $blog )
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
                                            {{\Carbon\Carbon::parse($blog->created_at)->format('d M,Y')}}
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

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $blogList->links() }}
                        </ul>
                    </nav>
                </div>
            </section>
            <!-- Blog Section End -->

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
                                <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required autocomplete="off">

                                <button class="default-btn sub-btn" type="submit">
                                    Subscribe
                                </button>

                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
@endsection
