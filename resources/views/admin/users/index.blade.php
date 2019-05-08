@extends('layouts.site')
@section('title') System Users @endsection
@section('styles') 
<link href="{{ asset('/assets/plugins/datatables/media/css/css/dataTables.bootstrap.css') }}" rel="stylesheet"> 
@endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> System Users | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item active"> System Users </li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> All System Users | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle">
                        This is the list of all users visible to administrators only. You can export the data in this table with the links below.
                        <a href="{{ route('user.create') }}" title="Add New User" class="pull-right">
                            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                        </a> 
                    </h6>
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Full Names</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>System Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- <?php $i=0; ?> -->
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td style="min-width: 150px;"> <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 25px; border-radius: 40%;">  {{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}</td>
                                        <td>
                                            @if($user->status == 'Active')
                                                <span class="btn-xs btn-rounded label label-success">{{ $user->status }}</span>
                                            @elseif($user->status == 'Away')
                                                <span class="btn-xs btn-rounded label label-primary">{{ $user->status }}</span>
                                            @elseif($user->status == 'Busy')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                            @elseif($user->status == 'Blocked')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                            @elseif($user->status == 'Inactive')
                                                <span class="btn-xs btn-rounded label label-info">{{ $user->status }}</span>
                                            @else
                                                <span class="btn-xs btn-rounded label label-warning">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td style="min-width: 100px; text-align: center;">
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-xs text-info" title="User Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit User Profile"></i></a>
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
@endsection