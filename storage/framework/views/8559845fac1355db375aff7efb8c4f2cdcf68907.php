<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- User profile -->
		<div class="user-profile"
			style="background: url(<?php echo e(asset('assets/images/background/user-info.jpg')); ?>) no-repeat;">
			<!-- User profile image -->
			<div class="profile-img"> <img src="<?php echo e(asset('assets/images/users/profile.png')); ?>" alt="user" /> </div>
			<!-- User profile text-->
			<div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
					role="button" aria-haspopup="true" aria-expanded="true"><?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?></a>
				<div class="dropdown-menu animated flipInY">
					<a href="<?php echo e(route('logout')); ?>" class="dropdown-item"><i
							class="fa fa-power-off"></i> Logout</a>
				</div>
			</div>
		</div>
		<!-- End User profile text-->
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li>
					<li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="mdi mdi-gauge"> </i><span class="hide-menu">Dashboard</span></a></li>
					<li><a href="<?php echo e(route('user.listing')); ?>"><i class="mdi mdi-account"></i><span class="hide-menu">User Listnig</span></a></li>
					<li><a href="<?php echo e(route('query.listing')); ?>"><i class="mdi mdi-help"></i><span class="hide-menu">Query Listnig</span></a></li>
				</li>


			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
	<!-- Bottom points-->
	<div class="sidebar-footer">
		<a href="<?php echo e(route('logout')); ?>" class="link" data-toggle="tooltip" title="Logout"><i
				class="mdi mdi-power"></i></a>
	</div>
	<!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid"><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>