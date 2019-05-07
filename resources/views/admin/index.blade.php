@section('title') Admin @endsection
@section('styles')

@endsection
@extends('layouts.site')
@section('title') Admin Dashboard @endsection
@section('navogator')
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ Auth::user()->name }} | Administrator's Dashboard</h4>
            <div class="d-flex align-items-center">

            </div> 
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('navigator')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"> Administrator Dashboard </h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-danger"></i></button>
    </div>
</div>
@endsection
@section('content')
    @include('layouts.includes.notify_admin')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-subtitle m-b-40">User Management And Administration</h4>
                    <ul class="nav nav-tabs customtab2" id="myTab" role="tablist">
                        <li class="nav-item"> 
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span> 
                                <span class="hidden-xs-down">Users</span>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="ti-timer"></i></span> 
                                <span class="hidden-xs-down">User Roles</span>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" id="accounts-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="ti-envelope"></i></span> 
                                <span class="hidden-xs-down">Departments</span>
                            </a> 
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="hidden-sm-up"><i class="ti-list"></i></span> <span class="hidden-xs-down"> Dropdown</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">
                                    More
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content tabcontent-border p-20" id="myTabContent">
                        <div role="tabpanel" class="tab-pane active" id="home5" aria-labelledby="home-tab">
                            <h4 style="max-width: 50%; float: left">System Users</h4>
                            <a href="{{ route('users.create') }}" title="Add New User" style="float: right;">
                                <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                            </a> 
                            <a href="{{ route('users.index') }}" itle="View All Users" style="float: right;">
                                <button class="btn btn-sm btn-success">All Users</button>
                            </a>
                            <div class="table-responsive" style="overflow-x: auto;">
                                <table class="table">
                                    <thead class="bg-success text-white">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>User Names</th>
                                            <th>System Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $i=0; ?> -->
                                    <tbody>
                                        @foreach($users as $user)
                                            @if($i < 5)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td> {{ $user->name }} - <img src="{{ asset('files/profile/images/'.$user->profile_image) }}" style="max-width: 25px; border-radius: 40%;" alt="{{ $user->profile_image }}">  {{ $user->name }}</td>
                                                <td> {{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }} </td>
                                                <td>
                                                    @if($user->status == 'Active')
                                                        <span class="btn-xs btn-rounded label label-success">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Away')
                                                        <span class="btn-xs btn-rounded label label-warning">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Busy')
                                                        <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Blocked')
                                                        <span class="btn-xs btn-rounded label label-primary">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Inactive')
                                                        <span class="btn-xs btn-rounded label label-info">{{ $user->status }}</span>
                                                    @else
                                                        <span class="btn-xs btn-rounded label label-default">{{ $user->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" style="max-width: 100px;">
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs text-info" title="User Details" style="float: left;"><i class="fa fa-info-circle"></i></a>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit User Profile"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="roles" aria-labelledby="roles-tab">
                            <h4 style="max-width: 50%; float: left">System Users</h4>
                            <a href="{{ route('roles.create') }}" title="Add New User" style="float: right;">
                                <button class="btn btn-sm btn-danger pull-right"><i class="fa fa-plus"></i></button>
                            </a>
                            <a href="{{ route('roles.index') }}" title="All Roles" style="float: right;">
                                <button class="btn btn-sm btn-danger pull-right">All User Roles</button>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-danger text-white">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Role Name</th>
                                            <th>Display Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $a=0; ?> -->
                                    <tbody>
                                        @foreach($roles as $role)
                                            @if($a < 5)
                                                <tr>
                                                    <td>{{ ++$a }}</td>
                                                    <td style="min-width: 150px;">{{ $role->name }}</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td style="">{{ $role->description }}</td>
                                                    <td class="text-center" style="min-width: 100px;">
                                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-xs text-info" title="Role Details" style="float: left;"><i class="fa fa-info-circle"></i></a>
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs text-primary"><i class="fa fa-edit" title="Edit Role Details"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="accounts" aria-labelledby="accounts-tab">
                            <h4 style="max-width: 50%; float: left">Fellowship Departments</h4>
                            <a href="javascript:void(0)" title="Add New Department" style="float: right;">
                                <button class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i></button>
                            </a>
                            <a href="javascript:void(0)" title="All Committee Departments" style="float: right;">
                                <button class="btn btn-sm btn-info pull-right">All Departments</button>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info text-white">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th style="max-width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $p=0; ?> -->
                                    <tbody>
                                       <tr>
                                           <td>{{ ++$p }}</td>
                                           <td><i>null</i></td>
                                           <td><i>null</i></td>
                                           <td><i>null</i></td>
                                           <td class="text-center" style="min-width: 100px;">
                                               <i>null</i>
                                           </td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">
                            <p>More Activity</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')  
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morrisjs/morris.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/dashboard1.js') }}"></script>
@endsection