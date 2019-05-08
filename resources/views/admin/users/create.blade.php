@extends('layouts.site')
@section('title') Add New User @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Add User | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> System Users </a></li>
                <li class="breadcrumb-item active"> Add User </li>
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
                    <h4 class="card-title">Add New User Profile | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('users.store') }}" method="POST" class="tab-wizard wizard-circle">
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
                        <h6>Personal Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Full Names <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name" class="form-control" id="Names" autofocus required> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Email Address <span class="text-danger">*</span> :</label>
                                        <input type="email" name="email" class="form-control" id="emailAddress1" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Phone Number :</label>
                                        <input type="tel" name="telephone" class="form-control" id="phoneNumber1" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1">Select Gender :</label>
                                        <select class="custom-select form-control" id="gender1" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date1">Date of Birth :</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date1"> </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Work Status</h6>
                        <section>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="jobTitle1">Occupation :</label>
                                        <input type="text" name="occupation" class="form-control" id="jobTitle1"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="location1">Location :</label>
                                        <input type="text" name="location" class="form-control" id="location1"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="nationality1">Nationality :</label>
                                        <input type="text" name="nationality" class="form-control" id="nationality1"> </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="role1">System Role :</label>
                                        <select class="custom-select form-control" id="role1" name="role" required>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" title="{{ $role->description }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </section>
                        <input type="hidden" name="level" value="1">
                        <h6>Final Step</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year_enrolled1">Campus Start</label>
                                        <select class="custom-select form-control" id="year_enrolled1" name="year_enrolled">
                                            @for($x = date('Y'); $x>1980; $x--)
                                                <option value="{{ $x }}">{{ $x }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Account Status :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="Active" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Active </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="Busy" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Busy</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio4" name="status" value="Blocked" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Blocked</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio5" name="status" value="Away" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio5">Away</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio6" name="status" value="Pending" class="custom-control-input" checked="checked">
                                                <label class="custom-control-label" for="customRadio6">Pending</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection