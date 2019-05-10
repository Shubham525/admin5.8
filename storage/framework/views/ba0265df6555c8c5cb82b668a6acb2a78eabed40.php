<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer"> <?php echo e(env('APP_NAME')); ?> &copy; Copyright <?php echo e(date('Y')); ?>, All rights
	reserved </footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
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
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="<?php echo e(asset('assets/plugins/d3/d3.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/c3-master/c3.min.js')); ?>"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?php echo e(asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>

<?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/admin/layouts/footer.blade.php ENDPATH**/ ?>