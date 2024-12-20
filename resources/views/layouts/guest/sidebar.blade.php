<div class="iq-sidebar">
	<div class="iq-sidebar-logo d-flex justify-content-between">
		<a href="{{ route('product') }}">
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
				<li class="{{ navbar('product') }}">
					<a href="{{ route('product') }}" class="iq-waves-effect">
						<i class="fas fa-cube"></i>
						<span>Product</span>
					</a>
				</li>
			</ul>
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('viewCart') }}">
					<a href="{{ route('viewCart') }}" class="iq-waves-effect">
						<i class="fas fa-shopping-cart"></i>
						<span>My Cart</span>
					</a>
				</li>
			</ul>
		</nav>
		<div class="p-3"></div>
	</div>
 </div>