<!DOCTYPE html>
<html>
<head>
<title>{{env('APP_NAME')}} </title>
<link href="{{asset('landing/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('landing/js/jquery.min.js')}}"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{{asset('landing/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mobile App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{asset('landing/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('landing/js/easing.js')}}"></script>
<!-- slide -->
</head>
<body>
<!--header-->
	<div class="header">
		<div class="container">	
			<div class="logo">
				<a href=""><img src="{{asset('landing/images/log.png')}}" alt=""></a>
			</div>
				<div class="top-nav">
					<span class="menu"><img src="{{asset('landing/images/menu.png')}}" alt=""> </span>
					<ul >
						<li class="@yield('index')" ><a href="{{route('index')}}" >HOME PAGE</a></li>
						<li class="@yield('service')"><a href="{{route('services')}}" > SERVICES</a></li>
						<li class="@yield('support')"><a href="{{route('support')}}" >  CONTACT US  </a></li>
						<li class="@yield('faq')"><a href="{{route('faq')}}" >  FAQs  </a></li>
						<li class="@yield('blog')"><a href="{{route('blog')}}" >  Blogs  </a></li>
						<li class="@yield('about')"><a href="{{route('about')}}"" > ABOUT US </a></li>
						<li><a style="background: #4fa7d1;color: white" href="{{route('login')}}" >Sign In</a></li>
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
		@if(session()->has('error'))
            <div class="alert alert-danger" style="position: absolute;top: 0;width: 100%;" role="alert">
                {{session()->get('error')}}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success" style="position: absolute;top: 0;width: 100%;" role="alert">
                {{session()->get('success')}}
            </div>
        @endif
<!---->
			@yield('content')
<!---->
	<div class="footer">
		<div class="container">
			<p class="footer-class">{{ env('APP_NAME') }} &copy; Copyright {{ date('Y') }}, All rights
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
</html>