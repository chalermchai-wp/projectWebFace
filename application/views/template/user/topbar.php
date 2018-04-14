<header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">

<div class="logo-area">
	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
			<span class="icon-bg">
				<i class="ti ti-menu"></i>
			</span>
		</a>
	</span>
	
	<a class="navbar-brand" href="<?php echo base_url('index.php/User/');?>">Avenxo</a>

	

</div><!-- logo-area -->

<ul class="nav navbar-nav toolbar pull-right">

	<li class="toolbar-icon-bg visible-xs-block" id="trigger-toolbar-search">
		<a href="#"><span class="icon-bg"><i class="ti ti-search"></i></span></a>
	</li>
	
	<li class="dropdown toolbar-icon-bg">
		<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
		<div class="dropdown-menu notifications arrow">
			<div class="topnav-dropdown-header">
				<span>Notifications</span>
			</div>
			<div class="scroll-pane">
				<ul class="media-list scroll-content">
					<li class="media notification-success">
						<a href="#">
							<div class="media-left">
								<span class="notification-icon"><i class="ti ti-check"></i></span>
							</div>
							<div class="media-body">
								<h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
								<span class="notification-time">8 mins ago</span>
							</div>
						</a>
					</li>
					<li class="media notification-info">
						<a href="#">
							<div class="media-left">
								<span class="notification-icon"><i class="ti ti-check"></i></span>
							</div>
							<div class="media-body">
								<h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
								<span class="notification-time">24 mins ago</span>
							</div>
						</a>
					</li>
					<li class="media notification-teal">
						<a href="#">
							<div class="media-left">
								<span class="notification-icon"><i class="ti ti-check"></i></span>
							</div>
							<div class="media-body">
								<h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
								<span class="notification-time">16 hours ago</span>
							</div>
						</a>
					</li>
					<li class="media notification-indigo">
						<a href="#">
							<div class="media-left">
								<span class="notification-icon"><i class="ti ti-check"></i></span>
							</div>
							<div class="media-body">
								<h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
								<span class="notification-time">2 days ago</span>
							</div>
						</a>
					</li>
					<li class="media notification-danger">
						<a href="#">
							<div class="media-left">
								<span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
							</div>
							<div class="media-body">
								<h4 class="notification-heading">Initial Release 1.0</h4>
								<span class="notification-time">4 days ago</span>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="topnav-dropdown-footer">
				<a href="#">See all notifications</a>
			</div>
		</div>
	</li>

	<li class="dropdown toolbar-icon-bg">
		<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
			<img class="img-circle" src="http://placehold.it/300&text=Placeholder" alt="" />
		</a>
		<ul class="dropdown-menu userinfo arrow">
			<li><a href="#/"><i class="ti ti-user"></i><span>Profile</span><span class="badge badge-info pull-right">80%</span></a></li>
			<li><a href="#/"><i class="ti ti-panel"></i><span>Account</span></a></li>
			<li><a href="#/"><i class="ti ti-settings"></i><span>Settings</span></a></li>
			<li class="divider"></li>
			<li><a href="#/"><i class="ti ti-stats-up"></i><span>Earnings</span></a></li>
			<li class="divider"></li>
			<li><a href="<?php echo site_url('Login/logout'); ?>"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
		</ul>
	</li>

</ul>

</header>
