<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/bootstrap.min.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/owl.carousel.min.css">
        <!-- Owl Carousel Theme Default CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/owl.theme.default.min.css">
        <!-- Box Icon CSS-->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/boxicon.min.css">
        <!-- Flaticon CSS-->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/fonts/flaticon/flaticon.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/meanmenu.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/style.css">
		<!-- Dark CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/dark.css">
		<!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/')}}/css/responsive.css">
        <!-- Title CSS -->
        <title>JobPulse - Job Board</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{asset('frontend/assets/')}}/img/favicon.png">
	</head>

  	<body>

		<!-- Pre-loader Start -->
		<div class="loader-content">
            <div class="d-table">
                <div class="d-table-cell">
					<div class="sk-circle">
						<div class="sk-circle1 sk-child"></div>
						<div class="sk-circle2 sk-child"></div>
						<div class="sk-circle3 sk-child"></div>
						<div class="sk-circle4 sk-child"></div>
						<div class="sk-circle5 sk-child"></div>
						<div class="sk-circle6 sk-child"></div>
						<div class="sk-circle7 sk-child"></div>
						<div class="sk-circle8 sk-child"></div>
						<div class="sk-circle9 sk-child"></div>
						<div class="sk-circle10 sk-child"></div>
						<div class="sk-circle11 sk-child"></div>
						<div class="sk-circle12 sk-child"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pre-loader End -->

		<!-- Navbar Area Start -->
		@include('frontend.components.header')
		<!-- Navbar Area End -->

        @yield('contents')
		<!-- Blog Section End -->

		<!-- Footer Section Start -->
		@include('frontend.components.footer')
		<!-- Footer Section End -->

		<!-- Back To Top Start -->
		<div class="top-btn">
			<i class='bx bx-chevrons-up bx-fade-up'></i>
		</div>
		<!-- Back To Top End -->

		<!-- jQuery first, then Bootstrap JS -->
		<script src="{{asset('frontend/assets/')}}/js/jquery.min.js"></script>
		<script src="{{asset('frontend/assets/')}}/js/bootstrap.bundle.min.js"></script>
		<!-- Owl Carousel JS -->
		<script src="{{asset('frontend/assets/')}}/js/owl.carousel.min.js"></script>
		<!-- Nice Select JS -->
		<script src="{{asset('frontend/assets/')}}/js/jquery.nice-select.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="{{asset('frontend/assets/')}}/js/jquery.magnific-popup.min.js"></script>
		<!-- Subscriber Form JS -->
		<script src="{{asset('frontend/assets/')}}/js/jquery.ajaxchimp.min.js"></script>
		<!-- Form Velidation JS -->
		<script src="{{asset('frontend/assets/')}}/js/form-validator.min.js"></script>
		<!-- Contact Form -->
		<script src="{{asset('frontend/assets/')}}/js/contact-form-script.js"></script>
		<!-- Meanmenu JS -->
		<script src="{{asset('frontend/assets/')}}/js/meanmenu.js"></script>
		<!-- Custom JS -->
		<script src="{{asset('frontend/assets/')}}/js/custom.js"></script>
  	</body>
</html>
