<?php echo $__env->make('user.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</div>
<!-- END CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
	<?php echo $__env->make('user.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/user/layouts/app.blade.php ENDPATH**/ ?>