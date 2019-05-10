<!DOCTYPE html>
<html>
<head>
<title><?php echo e(env('APP_NAME')); ?> </title>
<link href="<?php echo e(asset('landing/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo e(asset('landing/js/jquery.min.js')); ?>"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?php echo e(asset('landing/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mobile App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo e(asset('landing/js/move-top.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('landing/js/easing.js')); ?>"></script>
<!-- slide -->
</head>
<body>
<!--header-->
	<div class="header">
		<div class="container">	
			<div class="logo">
				<a href=""><img src="<?php echo e(asset('landing/images/log.png')); ?>" alt=""></a>
			</div>
				<div class="top-nav">
					<span class="menu"><img src="<?php echo e(asset('landing/images/menu.png')); ?>" alt=""> </span>
					<ul >
						<li class="<?php echo $__env->yieldContent('index'); ?>" ><a href="<?php echo e(route('index')); ?>" >HOME PAGE</a></li>
						<li class="<?php echo $__env->yieldContent('service'); ?>"><a href="<?php echo e(route('services')); ?>" > SERVICES</a></li>
						<li class="<?php echo $__env->yieldContent('support'); ?>"><a href="<?php echo e(route('support')); ?>" >  CONTACT US  </a></li>
						<li class="<?php echo $__env->yieldContent('faq'); ?>"><a href="<?php echo e(route('faq')); ?>" >  FAQs  </a></li>
						<li class="<?php echo $__env->yieldContent('blog'); ?>"><a href="<?php echo e(route('blog')); ?>" >  Blogs  </a></li>
						<li class="<?php echo $__env->yieldContent('about'); ?>"><a href="<?php echo e(route('about')); ?>"" > ABOUT US </a></li>
						<li><a style="background: #4fa7d1;color: white" href="<?php echo e(route('login')); ?>" >Sign In</a></li>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<?php if(session()->has('error')): ?>
            <div class="alert alert-danger" style="position: absolute;top: 0;width: 100%;" role="alert">
                <?php echo e(session()->get('error')); ?>

            </div>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success" style="position: absolute;top: 0;width: 100%;" role="alert">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
<!---->
			<?php echo $__env->yieldContent('content'); ?>
<!---->
	<div class="footer">
		<div class="container">
			<p class="footer-class"><?php echo e(env('APP_NAME')); ?> &copy; Copyright <?php echo e(date('Y')); ?>, All rights
	reserved</p>
		</div>
		<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

	</div>
</body>
</html><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/landing/app.blade.php ENDPATH**/ ?>