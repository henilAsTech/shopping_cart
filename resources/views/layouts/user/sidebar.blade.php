<div class="iq-sidebar">
	<div class="iq-sidebar-logo d-flex justify-content-between">
		<a href="{{ route('user.dashboard') }}">
			<img src="{{ asset('assets/images/logo.png') }}?w=66&h=73" class="img-fluid" alt="">
		</a>
		<div class="iq-menu-bt align-self-center">
			<div class="wrapper-menu">
				<div class="line-menu half start"></div>
				<div class="line-menu"></div>
				<div class="line-menu half end"></div>
			</div>
		</div>
	</div>
	<div id="sidebar-scrollbar">
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('user.dashboard') }}">
					<a href="{{ route('user.dashboard') }}" class="iq-waves-effect">
						<i class="fas fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</li>
			</ul>
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('user.product') }}">
					<a href="{{ route('user.product') }}" class="iq-waves-effect">
						<i class="fas fa-shopping-cart"></i>
						<span>Product</span>
					</a>
				</li>
			</ul>
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('user.userCart') }}">
					<a href="{{ route('user.userCart') }}" class="iq-waves-effect">
						<i class="fas fa-shopping-cart"></i>
						<span>Cart</span>
					</a>
				</li>
			</ul>
		</nav>
		<div class="p-3"></div>
	</div>
 </div>