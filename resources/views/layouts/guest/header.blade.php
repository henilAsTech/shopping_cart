<div class="iq-top-navbar">
	<div class="iq-navbar-custom">
		<div class="iq-sidebar-logo">
			<div class="top-logo">
				<a href="{{ route('product') }}" class="logo">
					<img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="">
				</a>
			</div>
		</div>
		@include('layouts.admin.breadcrumb')
		<nav class="p-0 navbar navbar-expand-lg navbar-light">
			<div class="iq-menu-bt align-self-center">
				<div class="wrapper-menu">
					<div class="line-menu half start"></div>
					<div class="line-menu"></div>
					<div class="line-menu half end"></div>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			</div>
			<ul class="navbar-list">
				<li>
					<a href="{{ route('login') }}">Login</a>
				</li>
			</ul>
		</nav>
	</div>
</div>