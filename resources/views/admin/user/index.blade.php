@extends('admin.layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Manage Users</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Users</h4>
            <div class="table-responsive m-t-40">
                 <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Laste Name</th>
                            <th>Email Verified</th>
                            <th>Email</th>
                            <th>Get Product Update</th>
                            <th>Get Promo Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    // $(document).ready(function() {
    //     $('#myTable').DataTable();
    // });
     var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.listing') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'is_email', name: 'is_email'},
            {data: 'email', name: 'email'},
            {data: 'is_product', name: 'is_product'},
            {data: 'is_promo', name: 'is_promo'}
        ]
    });
</script>
@endsection