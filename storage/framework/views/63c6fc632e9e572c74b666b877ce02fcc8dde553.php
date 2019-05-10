<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(asset('css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register"
            style="background-image:url(<?php echo e(asset('assets/images/background/login-register.jpg')); ?>);">
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger" style="position: absolute;top: 0;width: 100%;" role="alert">
                    <?php echo e(session()->get('error')); ?>

                </div>
            <?php endif; ?>
            <div class="login-box card">
                <div class="card-body">
                    <?php if(session()->has('reset_pass')): ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo e(session()->get('reset_pass')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(['url' => route('post-forget'), 'class'=>'form-horizontal form-material','method'=>'post', 'id'=>'loginform'])); ?>

                    <h3><?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h3>
                    <h3 class="box-title m-b-20">Reset Password</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <?php echo e(Form::text('email','', ['class' => 'form-control', 'placeholder'=>'Enter Email'])); ?>

                            <?php if($errors->has('email')): ?>
                            <div class="help-block">
                                <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Reset</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="<?php echo e(route('get-signup')); ?>" class="text-info m-l-5"><b>Sign Up</b></a></p>
                            <p>Already have an account? <a href="<?php echo e(route('admin.login')); ?>" class="text-info m-l-5"><b>Log In</b></a></p>
                        </div>
                    </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('js/custom.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
</body>

</html><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>