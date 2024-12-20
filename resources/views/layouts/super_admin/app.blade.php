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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

		{{-- Yajra datatable --}}
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
		@stack('after-css')
	</head>
	<body>
		<div class="wrapper">
			@include('layouts.super_admin.sidebar')
			@include('layouts.super_admin.header')
			@yield('content')
		</div>
		@include('layouts.footer')
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
		
		{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
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
