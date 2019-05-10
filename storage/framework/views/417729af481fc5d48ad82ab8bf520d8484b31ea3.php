<?php $__env->startSection('support','active'); ?>
<?php $__env->startSection('content'); ?>
<!---->
<div class="banner banner-in">
		 <div class="container">
			<div class="col-md-6 banner-matter-in">
				<h1>CONTACT US</h1>
			</div>
				<div class="col-md-6 banner-side side-banner">
					<div class="col-md-6 side">
						<img class="img-responsive" src="images/se1.jpg" alt="">
					</div>
					<div class="col-md-6 side">
						<img class="img-responsive" src="images/se.jpg" alt="">
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>	
	</div>
	<!---->
	<!---->
	<div class="content">
		<div class="container">
			<div class="contact">				
					<div class="contact-grids">
						<div class="contact-form">
							<?php echo e(Form::open(['url' => route('query.submit'),'method'=>'post'])); ?>

								<div class="contact-form-row">
									<div>
										<span>Name :</span>
										<?php echo e(Form::text('name','', ['class' => 'text', 'placeholder'=>'Enter Your Name'])); ?>

										<?php if($errors->has('name')): ?>
					                        <span class="help-block">
                                				<strong class="text-danger"><?php echo e($errors->first('name')); ?></strong>
					                        </span>
					                    <?php endif; ?>
									</div>
									<div>
										<span>Email :</span>
										<?php echo e(Form::text('email','', ['class' => 'text', 'placeholder'=>'Enter Your Email'])); ?>

										<?php if($errors->has('email')): ?>
					                        <span class="help-block">
                                				<strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
					                        </span>
					                    <?php endif; ?>
									</div>
									<div>
										<span>Subject :</span>
										<?php echo e(Form::text('subject','', ['class' => 'text', 'placeholder'=>'Enter Subject'])); ?>

										<?php if($errors->has('subject')): ?>
					                        <span class="help-block">
                                				<strong class="text-danger"><?php echo e($errors->first('subject')); ?></strong>
					                        </span>
					                    <?php endif; ?>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Message :</span>
									<textarea name="message"> </textarea>
									<?php if($errors->has('message')): ?>
					                    <span class="help-block">
                                			<strong class="text-danger"><?php echo e($errors->first('message')); ?></strong>
					                    </span>
					                <?php endif; ?>
								</div>
								<input type="submit" value="send">
							<?php echo e(Form::close()); ?>

						</div>						
					</div>
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
	<!---->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landing.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/landing/support.blade.php ENDPATH**/ ?>