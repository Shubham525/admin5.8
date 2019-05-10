<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <style>
        table {border-collapse:collapse; table-layout:fixed;}
        table td {word-wrap:break-word;}
    </style>
<?php $__env->stopSection(); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Manage Query</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Manage Query</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Queries</h4>
            <div class="table-responsive m-t-40">
                 <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Query Detail</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td class="name_td"></td>
            </tr><tr>
                <td>Email</td>
                <td class="email_td"></td>
            </tr><tr>
                <td>Subject</td>
                <td class="subject_td"></td>
            </tr>
            <tr>
                <td>Message</td>
                <td class="message_td"></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end model -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script>
    // $(document).ready(function() {
    //     $('#myTable').DataTable();
    // });
     var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('query.listing')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'subject', name: 'subject'},
            {data: 'action', name: 'action'},
        ]
    });
    $(document).on('click','.view-btn',function(){
        obj = JSON.parse($(this).attr('data-query'));
        $('.email_td').html(obj.email);
        $('.name_td').html(obj.name);
        $('.subject_td').html(obj.subject);
        $('.message_td').html(obj.message);
        $('#myModal').modal();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Chrome-Plugin/resources/views/admin/query/index.blade.php ENDPATH**/ ?>