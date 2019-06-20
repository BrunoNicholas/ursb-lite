@extends('layouts.site')
@section('title') Add Role @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Add Role | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}"> User Roles </a></li>
                <li class="breadcrumb-item active"> Add Role </li>
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
        <div class="col-9">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">Add New Role | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('roles.store') }}" method="POST" class="tab-wizard wizard-circle">
                        
                        @csrf

                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                                
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <!-- Step 1 -->
                        <hr>
                        <h6 class="text-center" style="text-transform: uppercase;">Required Information</h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Names">Database Name <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="display">Display Name :</label>
                                        <input type="text" name="display_name" class="form-control" id="display" placeholder="Role display name"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="display">Description :</label>
                                        <textarea name="description" class="form-control" id="display" placeholder="Role description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="display">Attach Permissions :</label>
                                        <div class="row">
                                            <div class="col-4"> </div>
                                            <div class="col-8" style="max-height: 300px; overflow-y: auto;">
                                                @foreach($permissions as $permission)
                                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permckbx{{ $permission->id }}"> 
                                                    <label for="permckbx{{ $permission->id }}">{{ $permission->display_name }} </label> <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Add User Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection