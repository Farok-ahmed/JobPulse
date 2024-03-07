@extends('frontend.layout.app')
@section('contents')
    <!-- Page Title Start -->
    <section class="page-title title-bg23">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>{{$contactInformation->title}}</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Contact Us</li>
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

    <!-- Contact Section Start -->
    <div class="contact-card-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="contact-card">
                                <i class='bx bx-phone-call'></i>
                                <ul>
                                    <li>
                                        <a href="tel:{{$contactInformation->phone}}">
                                            {{$contactInformation->phone}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:{{$contactInformation->phone2}}">
                                            {{$contactInformation->phone2}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="contact-card">
                                <i class='bx bx-mail-send'></i>
                                <ul>
                                    <li>
                                        <a href="mailto:{{$contactInformation->email}}">
                                            {{$contactInformation->email}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:{{$contactInformation->email2}}">
                                            {{$contactInformation->email2}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 offset-sm-3 offset-md-0">
                            <div class="contact-card">
                                <i class='bx bx-location-plus'></i>
                                <ul>
                                    <li>
                                        {{$contactInformation->location}}
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <!-- Contact Form Start -->
    <section class="contact-form-section pb-100">

        <div class="container">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="contact-area">
                <h3>Lets' Talk With Us</h3>
                <form action="{{ route('contactStore') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required
                                    data-error="Please enter your name" placeholder="Your Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required
                                    data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" class="form-control" required
                                    data-error="Please enter your number" placeholder="Phone Number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" required
                                    data-error="Please enter your subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control message-field" id="message" cols="30" rows="7" required
                                    data-error="Please type your message" placeholder="Write Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 text-center">
                            <button type="submit" class="default-btn contact-btn">
                                Send Message
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->

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
