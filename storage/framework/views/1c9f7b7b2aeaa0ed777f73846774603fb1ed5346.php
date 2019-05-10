<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
    <?php if(!Auth::user()->email_verified_at): ?>
        <div class="alert alert-danger">Please verify Your email <a href="" class="link resend-mail"><u>click here</u></a>  for resend email verification email.</div>
    <?php endif; ?>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs profile-tab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Basic Information</a>
        </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Password</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Privacy</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#subscription" role="tab">Subscription</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel">
            <div class="card-body">
                <form class="form-horizontal form-material" id="basic_info">
                    <?php echo csrf_field(); ?>
                    <div class="form-group first_name">
                        <label class="col-md-6">First Name</label>
                        <div class="col-md-6">
                            <input type="text" name="first_name" value="<?php echo e(Auth::user()->first_name); ?>"
                                placeholder="Enter First Name" class="form-control form-control-line">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6">Last Name</label>
                        <div class="col-md-6 last_name">
                            <input type="text" name="last_name" value="<?php echo e(Auth::user()->last_name); ?>"
                                placeholder="Enter Last Name" class="form-control form-control-line">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-6">Email</label>
                        <div class="col-md-6 email">
                            <input type="email" value="<?php echo e(Auth::user()->email); ?>" placeholder="Enter Email"
                                class="form-control form-control-line" name="email" id="example-email">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-primary col-md-6">
                                <input value="1" id="checkbox1" <?php if(Auth::user()->is_product_update): ?> checked <?php endif; ?> name="is_product_update" type="checkbox">
                                <label for="checkbox1"> Send me important It'sTMI product updates. </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-primary col-md-6">
                                <input value="1" id="checkbox2" <?php if(Auth::user()->is_promo): ?> checked <?php endif; ?> name="is_promo" type="checkbox">
                                <label for="checkbox2"> Send me It'sTMI tips and promos. </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-success">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--second tab-->
        <div class="tab-pane" id="profile" role="tabpanel">
            <div class="card-body">
                <form class="form-horizontal form-material" id="change-password">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="col-md-6">Password</label>
                        <div class="col-md-6 old_password">
                            <input type="password" placeholder="Enter Current Password"
                                class="form-control form-control-line" name="old_password">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6">New Password</label>
                        <div class="col-md-6 password">
                            <input type="password" placeholder="Enter New Password"
                                class="form-control form-control-line" name="password">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email password_confirmation" class="col-md-6">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" placeholder="Confirm Password" class="form-control form-control-line"
                                name="password_confirmation">
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-success">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane" id="settings" role="tabpanel">
            <div class="card-body">
                <button class="btn csv-download btn-success">Download your information</button>
            </div>
        </div>
        <div class="tab-pane" id="subscription" role="tabpanel">
            <div class="card-body">
                <h3>Comming Soon !</h3>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function(){
        $(document).on('submit','#basic_info',function(e){
            e.preventDefault();
            $.ajax({
                type:'put',
                data:$(this).serialize(),
                url:"<?php echo e(route('user.profile.update')); ?>",
                success:function(data){
                    $(document).find('span.error').empty();
                    $('.header_name').html(data.name);
                    show_FlashMessage(data.message, 'success');
                }
            })

        });
        
        $(document).on('submit','#change-password',function(e){
            e.preventDefault();
            $.ajax({
                type:'put',
                data:$(this).serialize(),
                url:"<?php echo e(route('user.password.update')); ?>",
                success:function(data){
                    $(document).find('span.error').empty();
                    show_FlashMessage(data.message, 'success');
                }
            })

        });
        
        $(document).on('click','.resend-mail',function(e){
            e.preventDefault();
            $.ajax({
                type:'get',
                data:$(this).serialize(),
                url:"<?php echo e(route('verify.email')); ?>",
                success:function(data){
                    $(document).find('span.error').empty();
                    show_FlashMessage(data.message, 'success');
                }
            })

        });
        
        $(document).on('click','.csv-download',function(e){
            rows = [['Email','First Name','Last Name', 'Email Verified On','Date Created'],['<?php echo e(Auth::user()->email); ?>','<?php echo e(Auth::user()->first_name); ?>','<?php echo e(Auth::user()->last_name); ?>','<?php echo e(Auth::user()->email_verified_at); ?>', '<?php echo e(Auth::user()->created_at); ?>']];
            let csvContent = "data:text/csv;charset=utf-8,";
            rows.forEach(function(rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "profile.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/user/profile/index.blade.php ENDPATH**/ ?>