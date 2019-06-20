@extends('layouts.site')
@section('title') Add Role @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> User Role Details | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}"> User Roles </a></li>
                <li class="breadcrumb-item active"> User Role Details </li>
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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> {{ $role->display_name }}'s Details | {{ config('app.name') }}</h4>
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Attribute</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Relevance</th>
                                </tr>
                            </thead>
                            <?php $i=0; ?>
                            <tbody>
                                @if($role->name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Database Names</td>
                                        <td class="text-danger">{{ $role->name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($role->display_name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Display Names</td>
                                        <td class="text-danger">{{ $role->display_name }}</td>
                                        <td>Required for display</td>
                                    </tr>
                                @endif
                                @if($role->description)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Description</td>
                                        <td class="text-danger">{{ $role->description }}</td>
                                        <td>Required for proper description</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">  User Role Operations </h4>
                    <div class="table-responsive">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('role.index') }}" class="btn btn-primary btn-rounded btn-block" style="margin: 10px;"> Back </a>
                                    </div>
                                    <div class="col-6">
                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="tools" style="margin: 10px;">
                                                <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                    @if(Auth::user()->role != 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete this role item"> Delete </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection