<div class="iq-top-navbar">
	<div class="iq-navbar-custom">
		<div class="iq-sidebar-logo">
			<div class="top-logo">
				<a href="{{ route('user.dashboard') }}" class="logo">
					<img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="">
				</a>
			</div>
		</div>
		@include('layouts.user.breadcrumb')
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
					<a href="#" class="text-white search-toggle iq-waves-effect bg-primary"><img src="{{ asset('assets/images/logo.png') }}" class="rounded img-fluid" alt="user"></a>
					<div class="iq-sub-dropdown iq-user-dropdown">
						<div class="m-0 shadow-none iq-card iq-card-block iq-card-stretch iq-card-height">
							<div class="p-0 iq-card-body ">
								<div class="p-3 bg-primary">
									<h5 class="mb-0 text-white line-height">Hello {{ auth()->user()->name }}</h5>
									<span class="text-white font-size-12">Available</span>
								</div>
								<div class="p-3 text-center d-inline-block w-100">
									<form method="POST" action="{{ route('user.logout') }}">
										@csrf
										<a class="iq-bg-danger iq-sign-btn" href="{{ route('user.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" role="button">
											Sign out
											<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 91.839 122.88" enable-background="new 0 0 91.839 122.88" xml:space="preserve">
												<g>
												  <path fill="#FFFFFF" d="M81.75,64.617H41.365c-1.738,0-3.147-1.423-3.147-3.178c0-1.756,1.409-3.179,3.147-3.179h40.383L68.559,43.155 c-1.146-1.31-1.025-3.311,0.271-4.469c1.297-1.159,3.278-1.037,4.425,0.273l17.798,20.383c1.065,1.216,1.037,3.029-0.011,4.21 L73.254,83.92c-1.146,1.311-3.128,1.433-4.425,0.273c-1.296-1.158-1.417-3.16-0.271-4.47L81.75,64.617L81.75,64.617z M70.841,99.629c0-1.756,1.423-3.179,3.178-3.179c1.756,0,3.179,1.423,3.179,3.179v14.242c0,2.475-1.017,4.729-2.648,6.36 c-1.633,1.632-3.887,2.648-6.36,2.648H9.009c-2.475,0-4.73-1.014-6.363-2.646C1.016,118.603,0,116.352,0,113.871V9.009 c0-2.48,1.013-4.733,2.644-6.365C4.275,1.013,6.528,0,9.009,0h59.18c2.479,0,4.731,1.016,6.362,2.646 c1.633,1.633,2.646,3.889,2.646,6.363V23.25c0,1.755-1.423,3.178-3.179,3.178c-1.755,0-3.178-1.423-3.178-3.178V9.009 c0-0.722-0.301-1.385-0.785-1.869c-0.482-0.482-1.144-0.783-1.867-0.783H9.009c-0.726,0-1.389,0.3-1.87,0.782 C6.656,7.62,6.357,8.283,6.357,9.009v104.862c0,0.724,0.301,1.385,0.783,1.867c0.484,0.484,1.147,0.785,1.869,0.785h59.18 c0.72,0,1.381-0.302,1.865-0.786c0.485-0.484,0.787-1.146,0.787-1.866V99.629L70.841,99.629z"/>
												</g>
											</svg>
										</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</nav>
	</div>
</div>