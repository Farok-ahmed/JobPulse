@extends('frontend.layout.app')
@section('contents')
     <!-- Page Title Start -->
     <section class="page-title title-bg22">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Blog Details</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Blog Details</li>
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

    <!-- Blog Details Section Start -->
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-widget blog-search">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <button>
                                    <i class='bx bx-search-alt-2'></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="blog-widget">
                        <h3>Popular Post</h3>
                        @foreach ($latestBlogs as $latestBlog )
                        <article class="popular-post">
                            <a href="{{route('blogSingle',$latestBlog->id)}}" class="blog-thumb">
                                <img src="{{asset('/'.$latestBlog->image.'')}}" alt="blog image">
                            </a>

                            <div class="info">
                                <time datetime="2021-04-08">{{\Carbon\Carbon::parse($latestBlog->created_at)->format('d M,Y')}}</time>
                                <h4>
                                    <a href="{{route('blogSingle',$latestBlog->id)}}">{{$latestBlog->title}}</a>
                                </h4>
                            </div>
                        </article>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="blog-dedails-text">
                        <div class="blog-details-img">
                            <img src="{{asset('/'.$blogSingle->image.'')}}" alt="blog details image">
                        </div>

                        <div class="blog-meta">
                            <ul>
                                <li>
                                    <i class='bx bxs-user'></i>
                                    {{$blogSingle->user->name}}
                                </li>
                                <li>
                                    <i class='bx bx-calendar'></i>
                                    {{\Carbon\Carbon::parse($blogSingle->created_at)->format('d M,Y')}}
                                </li>
                            </ul>
                        </div>

                        <h3 class="post-title">{{$blogSingle->title}}</h3>

                        {{$blogSingle->description}}

                       <form class="comment-form">
                           <h3>Leave a Reply</h3>

                           <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Your Name" >
                                    </div>
                               </div>

                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Your Name">
                                    </div>
                               </div>

                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control comment-box" cols="30" rows="6" placeholder="Your Comment"></textarea>
                                    </div>
                               </div>
                           </div>

                            <button type="submit" class="comment-btn">
                                Post a Comment
                            </button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

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
    <!-- Subscribe Section End -->

@endsection
