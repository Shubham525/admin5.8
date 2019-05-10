<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form class="form-horizontal form-material" action="<?php echo e(route('user.change.password')); ?>" id="change-password">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($id); ?>" />
            <div class="form-group">
                <label class="col-md-12">New Password</label>
                <div class="col-md-12 password">
                    <input type="password" placeholder="Enter New Password" class="form-control form-control-line"
                        name="password">
                    <?php if($errors->has('password')): ?>
                        <div class="help-block">
                            <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="example-email password_confirmation" class="col-md-12">Confirm Password</label>
                <div class="col-md-12">
                    <input type="password" placeholder="Confirm Password" class="form-control form-control-line"
                        name="password_confirmation">
                    <?php if($errors->has('password_confirmation')): ?>
                        <div class="help-block">
                            <strong class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/user/profile/recover_password.blade.php ENDPATH**/ ?>