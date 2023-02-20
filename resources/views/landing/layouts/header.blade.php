<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') - Mochammad Ikhsan Nawawi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('sanbray/css/animate.css')}}">
	
	<link rel="stylesheet" href="{{asset('sanbray/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('sanbray/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('sanbray/css/magnific-popup.css')}}">
	
	<link rel="stylesheet" href="{{asset('sanbray/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('sanbray/css/style.css')}}">

	{{-- toastr CSS --}}
	<link href="{{asset('toastr/build/toastr.min.css')}}" rel="stylesheet"/>

	{{-- sweetalert CSS --}}
	<link href="{{asset("sweetalert2/dist/sweetalert2.css")}}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="/">Ikhsannawawi<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
					<li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	@yield('content')

	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Lets talk about</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<p><a href="#" class="btn btn-primary">Learn more</a></p>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Links</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="http://sanbray.epizy.com" target="_blank"><span class="fa fa-chevron-right mr-2"></span>Sanbray Company</a></li>
							<li><a href="http://eskull.smkn.itzbenz.online" target="_blank"><span class="fa fa-chevron-right mr-2"></span>Website Ekstrakulikuler SMK Negeri 1 Garut</a></li>
							<li><a href="#" target="_blank"><span class="fa fa-chevron-right mr-2"></span>Business Strategy</a></li>
							<li><a href="#" target="_blank"><span class="fa fa-chevron-right mr-2"></span>Data Analysis</a></li>
							<li><a href="#" target="_blank"><span class="fa fa-chevron-right mr-2"></span>Graphic Design</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text">Kp Babakan Kalapa 715 Desa Pataruman, Kec Tarogong Kidul, Garut, Jawabarat</span></li>
								<li><a href="https://wa.me/6287798889924" target="_blank"><span class="icon fa fa-phone"></span><span class="text">+62 877 9888 9924</span></a></li>
								<li><a href="mail:mochammadikhsannawawi@gmail.com"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">mochammadikhsannawawi@gmail.com</span></a></li>
							</ul>
						</div>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-linkedin" target="_blank"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook "target="_blank"></span></a></li>
							<li class="ftco-animate"><a href="https://instagram.com/sanbray_" target="_blank"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy; 2023 - {{date('Y')}} All rights reserved | Mochammad Ikhsan Nawawi
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</footer>
		
		

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script src="{{asset("jquery/dist/jquery.js")}}" ></script>

		<script src="{{asset('sanbray/js/jquery.min.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('sanbray/js/popper.min.js')}}"></script>
		<script src="{{asset('sanbray/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('sanbray/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('sanbray/js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('sanbray/js/scrollax.min.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{asset('sanbray/js/google-map.js')}}"></script>
		
		<script src="{{asset('sanbray/js/main.js')}}"></script>

		{{-- toastr JS --}}
		<script src="{{asset('toastr/build/toastr.min.js')}}"></script>

		{{-- sweetalert JS --}}
		<script src="{{asset("sweetalert2/dist/sweetalert2.min.js")}}"></script>

		@stack('script')
		
	</body>
	</html>