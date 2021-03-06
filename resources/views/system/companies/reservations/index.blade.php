@extends('layouts.site')
@section('title') Company Name Reservation Details @endsection
@section('styles') 
<link href="{{ asset('/assets/plugins/datatables/media/css/css/dataTables.bootstrap.css') }}" rel="stylesheet"> 
@endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Name Reservation Details | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"> Companies </a></li>
                <li class="breadcrumb-item active"> Name Reservations </li>
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
                    <a href="{{ route('reservation.create') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-plus"></i> Add New </a>
                    <h4 class="card-subtitle m-b-40"> Below are the reserved names </h4>
                    <div class="table-responsive">
                        <table id="example23" class="table table-striped table-bordered display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                        <th>NGO</th>
                                        <th>Choice 1</th>
                                        <th>Choice 2</th>
                                        <th>Choice 3</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- <?php $i=0; ?> -->
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $reservation->non_government_org }}</td>
                                        <td>{{ $reservation->name_choice_1 }}</td>
                                        <td>{{ $reservation->name_choice_2 }}</td>
                                        <td>{{ $reservation->name_choice_3 }}</td>
                                        <td>{{ $reservation->status }}</td>
                                        <td style="min-width: 100px; text-align: center;">
                                            <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-xs text-info" title="Reservation Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit Reservation Profile"></i></a>
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