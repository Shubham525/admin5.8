<?php $__env->startSection('content'); ?>
<div class="alert alert-success" role="alert">
  your email <?php echo e($user->email); ?> is verified successfully !
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/user/email_verified.blade.php ENDPATH**/ ?>