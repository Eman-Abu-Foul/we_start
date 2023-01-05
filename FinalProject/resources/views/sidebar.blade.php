
<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>

				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">
                        @auth('user')
                        <ul data-submenu-title="Settings">
                            <li><a href="{{route('account')}}"><i class="icon-material-outline-account-circle"></i> Account</a></li>
                            <li><a href=""><i class="icon-material-outline-person-pin"></i> Profile</a></li>
                        </ul>
                        @endauth
                        <ul data-submenu-title="Start">
                            @auth('admin')
                                <li class="active"><a href="{{route('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                            @endauth
							<li><a href=""><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>
							<li><a href=""><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
							<li><a href=""><i class="icon-material-outline-rate-review"></i> Reviews</a></li>
						</ul>
						@auth('admin')
						<ul data-submenu-title="Organize and Manage">
							<li><a href="#"><i class="icon-material-outline-assignment"></i> Category </a>
								<ul>
									<li><a href="{{ route('categories.index') }}">All Categories</a></li>
									<li><a href="{{ route('categories.create') }}">Create New Category</a></li>
								</ul>
							</li>
							<li><a href="#"><i class="icon-material-outline-description"></i> Skills</a>
								<ul>
									<li><a href="{{ route('skills.index') }}">All Skills</a></li>
									<li><a href="{{ route('skills.create') }}">Create New Skill</a></li>
								</ul>
							</li>
						</ul>
						@endauth



					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->
