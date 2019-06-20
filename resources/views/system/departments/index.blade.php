@extends('layouts.site')
@section('title') Departments @endsection
@section('styles') 
<link href="{{ asset('/assets/plugins/datatables/media/css/css/dataTables.bootstrap.css') }}" rel="stylesheet"> 
@endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Departments | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> System Users </a></li>
                <!--<li class="breadcrumb-item"><a href="{{ route('department.index') }}"> Departments </a></li>-->
                <li class="breadcrumb-item active"> Departments </li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
            	<i class="ti-settings text-white"></i>
            </button>
        </div>
    </div>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('department.create') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-plus"></i> Add New </a>
                    <h4 class="card-subtitle m-b-40"> {{ config('app.name') }} Departments </h4>
                    <h6 class="card-subtitle">
                        The list of all {{ config('app.name') }} departments as they operate.
                    </h6>
                    <div class="table-responsive">
                        <table id="example23" class="table table-striped table-bordered display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- <?php $i=0; ?> -->
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->description }}</td>
                                        <td>{{ $department->level }}</td>
                                        <td>
                                            @if($department->status == 'Active')
                                                <span class="btn-xs btn-rounded label label-success">{{ $department->status }}</span>
                                            @elseif($department->status == 'Away')
                                                <span class="btn-xs btn-rounded label label-primary">{{ $department->status }}</span>
                                            @elseif($department->status == 'Busy')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $department->status }}</span>
                                            @elseif($department->status == 'Blocked')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $department->status }}</span>
                                            @elseif($department->status == 'Inactive')
                                                <span class="btn-xs btn-rounded label label-info">{{ $department->status }}</span>
                                            @else
                                                <span class="btn-xs btn-rounded label label-warning">{{ $department->status }}</span>
                                            @endif
                                        </td>
                                        <td style="min-width: 100px; text-align: center;">
                                            <a href="{{ route('department.show', $department->id) }}" class="btn btn-xs text-info" title="Department Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('department.edit', $department->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit Department Profile"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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