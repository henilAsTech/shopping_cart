<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>@yield('title') | {{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}?w=16&h=16" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	</head>
	<body>
		{{-- @include('layouts.loader') --}}
		<section class="sign-in-page bg-white">
			<div class="container-fluid p-0">
				<div class="no-gutters m-static-layout">
					@yield('content')
				</div>
			</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
		<script>
			$("#myForm").on("submit", function (e) {
				$(this).find("button[type='submit']").prop("disabled", true);
				$(this).find("button[type='submit'] .spinner-border").removeClass("d-none");
			});
		</script>
		@include('layouts.notification')
	</body>
</html>
