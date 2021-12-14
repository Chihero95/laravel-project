
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Acme|Alegreya|Alegreya+Sans|Anton|Archivo|Archivo+Black|Archivo+Narrow|Arimo|Arvo|Asap|Asap+Condensed|Bitter|Bowlby+One+SC|Bree+Serif|Cabin|Cairo|Catamaran|Crete+Round|Crimson+Text|Cuprum|Dancing+Script|Dosis|Droid+Sans|Droid+Serif|EB+Garamond|Exo|Exo+2|Faustina|Fira+Sans|Fjalla+One|Francois+One|Gloria+Hallelujah|Hind|Inconsolata|Indie+Flower|Josefin+Sans|Julee|Karla|Lato|Libre+Baskerville|Libre+Franklin|Lobster|Lora|Mada|Manuale|Maven+Pro|Merriweather|Merriweather+Sans|Montserrat|Montserrat+Subrayada|Mukta+Vaani|Muli|Noto+Sans|Noto+Serif|Nunito|Open+Sans|Open+Sans+Condensed:300|Oswald|Oxygen|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Pacifico|Passion+One|Pathway+Gothic+One|Play|Playfair+Display|Poppins|Questrial|Quicksand|Raleway|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Ropa+Sans|Rubik|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Sedgwick+Ave|Sedgwick+Ave+Display|Shadows+Into+Light|Signika|Slabo+27px|Source+Code+Pro|Source+Sans+Pro|Spectral|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Work+Sans|Yanone+Kaffeesatz|Zilla+Slab|Zilla+Slab+Highlight" rel="stylesheet">
	
	<!-- StyleSheet -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('home/css/bootstrap.css')}}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.min.css')}}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('home/css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('home/css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/niceselect.css')}}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/animate.css')}}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('home/css/owl-carousel.css')}}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('home/css/slicknav.min.css')}}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('home/css/reset.css')}}">
	<link rel="stylesheet" href="{{ asset('home/style.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css')}}">
	<link rel="stylesheet" href="{{ asset('home/css/bootstrap-datepicker.min.css')}}">
	<script src="{{ asset('home/js/jquery.min.js')}}"></script>

	@toastr_css
	@toastr_js

</head>
<body class="js">
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		@include('Home.includes.header')
	</header>
	<!--/ End Header -->
	@if(Request::route()->getName() == 'home')
	<!-- Slider Area -->
	
	<section class="hero-slider">
		@include('Home.includes.slider')
	</section>
	<!--/ End Slider Area -->
	
	<!-- Start Small Banner  -->
	<section class="small-banner section">
		@include('Home.includes.small-banner')
	</section>
	<!-- End Small Banner -->
	@endif

	@yield('breadrumbs')
	<!-- Start Product Area -->
    <div class="product-area section">
		<div class="container">
			@yield('content')
		</div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Midium Banner  -->
	<section class="midium-banner">
		@include('Home.includes.small-banner')
	</section>
	<!-- End Midium Banner -->
	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        @include('Home.includes.product-hot')
    </div>
	<!-- End Most Popular Area -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		@include('Home.includes.service')
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		@include('Home.includes.newsletter')
	</section>
	<!-- End Shop Newsletter -->
	
	
	<!-- Start Footer Area -->
	<footer class="footer">
		@include('Home.includes.footer')
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{ asset('home/js/jquery.min.js')}}"></script>
    <script src="{{ asset('home/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{ asset('home/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{ asset('home/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('home/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{ asset('home/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('home/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('home/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('home/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('home/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('home/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset('home/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('home/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('home/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('home/js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('home/js/easing.js')}}"></script>
	<!-- Active JS -->
	<script src="{{ asset('home/js/active.js')}}"></script>
	<script src="{{ asset('home/js/bootstrap-datepicker.min.js')}}"></script>

	@toastr_js
	@toastr_render

</body>
</html>