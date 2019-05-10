<?php $__env->startSection('index','active'); ?>
<?php $__env->startSection('content'); ?>
<div class="banner">
	 <div class="container">
		<div class="col-md-6 banner-matter">
			<!-- requried-jsfiles-for owl -->
			<link href="<?php echo e(asset('landing/css/owl.carousel.css')); ?>" rel="stylesheet">
			<script src="<?php echo e(asset('landing/js/owl.carousel.js')); ?>"></script>
						        <script>
								    $(document).ready(function() {
								      $("#owl-demo1").owlCarousel({
								        items : 1,
								        lazyLoad : true,
								        autoPlay : true,
								        navigation : true,
								        navigationText :  true,
								        pagination : false,
								      });
								    });
								  </script>
						 <!-- //requried-jsfiles-for owl -->
						 <!-- start content_slider -->
					<div id="owl-demo1" class="owl-carousel">
						<div class="item-bottom">
				            <div class="item-right">
								<h1>Best Chrome Extension</h1>
								<span>Download this cool extension for free</span>
								<p><?php echo e(env('APP_NAME')); ?> helps you browse smarter by giving you control over ads and tracking technologies to speed up page loads, eliminate clutter, and protect your data. </p>
								<a href="#"><i> </i>Download </a>
							</div>
						</div>
						<div class="item-bottom">
				            <div class="item-right">
								<h1>Best Chrome Extension</h1>
								<span>Download this cool extension for free</span>
								<p><?php echo e(env('APP_NAME')); ?> helps you browse smarter by giving you control over ads and tracking technologies to speed up page loads, eliminate clutter, and protect your data.</p>
								<a href="#"><i> </i>Download </a>
							</div>
						</div>
						<div class="item-bottom">
				            <div class="item-right">
								<h1>Best Chrome Extension</h1>
								<span>Download this cool extension for free</span>
								<p><?php echo e(env('APP_NAME')); ?> helps you browse smarter by giving you control over ads and tracking technologies to speed up page loads, eliminate clutter, and protect your data. </p>
								<a href="#"><i> </i>Download </a>
							</div>
						</div>								
					</div>
			</div>
			<div class="col-md-6 banner-side">
					<div class="col-md-12 side">
						<img class="img-responsive" src="<?php echo e(asset('landing/images/ba.png')); ?>" alt="">
					</div>
					<div class="clearfix"> </div>
				</div>
			<div class="clearfix"> </div>
		</div>	
</div>
<!---->
<div class="content">
	<div class="container">
		<div class="content-top">
			<div class="col-md-4 grid">
				<h3><i></i> Smart Blocking</h3>
				<p>automatically optimizes page performance as you browse.</p>
				<a href="#" class="just-do-in">Just do it </a>
			</div>
			<div class="col-md-4 grid">
				<h3><i class="mid"></i>Dynamic UI</h3>
				<p>includes multiple displays and detailed tracker dashboard.</p>
				<a href="#" class="just-do-in">Just do it </a>
			</div>
			<div class="col-md-4 grid">
				<h3><i class="just"></i> Enhanced Anti-Tracking</h3>
				<p>anonymizes your data to further protect your privacy.</p>
				<a href="#" class="just-do-in">Just do it </a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="content-grid">
			<h2>IS IT TURE? EVERYDAY IS RAINY DAY. I HATE AUTUMN!</h2>
			<p>Blandit ad vel adipiscing nostrud consequat, te quis euismod dolor nisl nostrud consequat ex blandit hendrerit ad et dolor. Nostrud, suscipit eu ipsum ullamcorper dolore in augue ullamcorper nulla. Eros velit esse nostrud qui, adipiscing esse luptatum at vel praesent erat, diam feugait luptatum sit lorem vel illum dignissim luptatum diam illum, duis ut, in. Lobortis at tincidunt ut augue elit amet feugiat laoreet luptatum nisl tincidunt aliquip eu minim veniam feugait accumsan dolore eros, feugait in dolor aliquam erat augue. Hendrerit, illum commodo facilisis, exerci, tation consequat, iriure, feugiat et facilisis molestie vulputate.</p>
		</div>
	</div>
	<div class="content-bottom">
		<div class="container">
			<h3>DO YOU HATE WITH ME?</h3>
			<p>we are the biggest haters on planet, fella.</p>
		</div>
		<i> </i>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landing.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/landing/index.blade.php ENDPATH**/ ?>