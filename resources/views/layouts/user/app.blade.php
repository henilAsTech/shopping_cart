<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title') | {{ config('app.name') }}</title>
		<link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}?w=16&h=16" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
		@stack('after-css')
	</head>
	<body>
		<div class="wrapper">
			@include('layouts.user.sidebar')
			@include('layouts.user.header')
			@yield('content')
		</div>
		@include('layouts.footer')
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
		<script src="{{ asset('assets/js/countdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
		<script src="{{ asset('assets/js/slick.min.js') }}"></script>
		<script src="{{ asset('assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/js/lottie.js') }}"></script>
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>

		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$("#myForm").on("submit", function (e) {
				$(this).find("button[type='submit']").prop("disabled", true);
				$(this).find("button[type='submit'] .spinner-border").removeClass("d-none");
			});
		</script>
		@include('layouts.notification')
		@stack('after-js')
	</body>
</html>
