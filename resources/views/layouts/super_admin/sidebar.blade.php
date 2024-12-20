<div class="iq-sidebar">
	<div class="iq-sidebar-logo d-flex justify-content-between">
		<a href="{{ route('superadmin.dashboard') }}">
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
				<li class="{{ navbar('superadmin.dashboard') }}">
					<a href="{{ route('superadmin.dashboard') }}" class="iq-waves-effect">
						<i class="fas fa-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
			</ul>
		</nav>
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('superadmin.admins.*') }}">
					<a href="{{ route('superadmin.admins.index') }}" class="iq-waves-effect">
						<i class="fas fa-cogs"></i>
						<span>Admin</span>
					</a>
				</li>
			</ul>
		</nav>
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('superadmin.users.*') }}">
					<a href="{{ route('superadmin.users.index') }}" class="iq-waves-effect">
						<i class="fas fa-users"></i>
						<span>User</span>
					</a>
				</li>
			</ul>
		</nav>
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('superadmin.categories.*') }}">
					<a href="{{ route('superadmin.categories.index') }}" class="iq-waves-effect">
						<i class="fas fa-list-alt"></i>
						<span>Category</span>
					</a>
				</li>
			</ul>
		</nav>
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('superadmin.products.*') }}">
					<a href="{{ route('superadmin.products.index') }}" class="iq-waves-effect">
						<i class="fas fa-cube"></i>
						<span>Product</span>
					</a>
				</li>
			</ul>
		</nav>
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="{{ navbar('superadmin.orders.*') }}">
					<a href="{{ route('superadmin.orders.index') }}" class="iq-waves-effect">
						<i class="fas fa-shopping-cart"></i>
						<span>Order</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
 </div>