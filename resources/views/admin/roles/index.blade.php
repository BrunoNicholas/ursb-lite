@extends('layouts.site')
@section('title') User Roles &amp; Privileges @endsection
@section('styles') 
<link href="{{ asset('/assets/plugins/datatables/media/css/css/dataTables.bootstrap.css') }}" rel="stylesheet">  
@endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> User Roles &amp; Privileges | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item active"> User Roles &amp; Privileges </li>
            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
            	<i class="ti-settings text-white"></i>
            </button>
        </div>
    </div>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All User Roles | {{ config('app.name') }}</h4>
                    <h6 class="card-subtitle">
                        This is list of all users visible to administrators only, mostly the top admins. You can export the data in this table with the links below.
                        <a href="{{ route('role.create') }}" title="Add New User" class="pull-right">
                            <button class="btn btn-sm btn-danger"><i class="fa fa-plus"></i></button>
                        </a> 
                    </h6>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $a=0; ?> -->
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="text-center">{{ ++$a }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td style="max-width: 150px;">{{ $role->description }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('role.show', $role->id) }}" class="btn btn-xs text-info" title="Role Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit Role Details"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/app/extra-libs/DataTables/datatables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('/app/js/pages/datatable/datatable-advanced.init.js') }}"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
@endsection