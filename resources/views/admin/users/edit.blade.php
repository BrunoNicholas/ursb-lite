@extends('layouts.site')
@section('title') Edit User Details @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Edit User Details | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> System Users </a></li>
                <li class="breadcrumb-item active"> Edit User </li>
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
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="tab-wizard wizard-circle">
                        
                        @csrf
                        {{ method_field('PATCH') }}

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
                        <h6 class="text-center">Personal Info</h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Full Names <span class="text-danger">*</span> :</label>
                                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Email Address <span class="text-danger">*</span> :</label>
                                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="emailAddress1" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Phone Number :</label>
                                        <input type="tel" value="{{ $user->telephone }}" name="telephone" class="form-control" id="phoneNumber1" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1">Select Gender :</label>
                                        <select class="custom-select form-control" id="gender1" name="gender">
                                            <option value="{{ $user->gender }}">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date1">Date of Birth :</label>
                                        <input type="date" class="form-control" value="{{ $user->date_of_birth }}" name="date_of_birth" id="date1">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr>
                        <h6 class="text-center"> More </h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="jobTitle1">Occupation :</label>
                                        <input type="text" name="occupation" value="{{ $user->occupation }}" class="form-control" id="jobTitle1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="location1">Location :</label>
                                        <input type="text" name="location" value="{{ $user->location }}" class="form-control" id="location1">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="church1">Company Level :</label>
                                        <input type="number" name="level" class="form-control" value="{{ $user->level }}" id="church1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality1">Nationality :</label>
                                        <input type="text" name="nationality" value="{{ $user->nationality }}" class="form-control" id="nationality1"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role1">System Role :</label>
                                        <select class="custom-select form-control" id="role1" name="role" required>
                                            <option value="{{ $user->role }}">Chose to update user role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" title="{{ $role->description }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr>
                        <h6 class="text-center">Final Step</h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Account Status :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="Active" class="custom-control-input" @if($user->status == 'Active') checked="checked" @endif>
                                                <label class="custom-control-label" for="customRadio1">Active </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="Busy" class="custom-control-input" @if($user->status == 'Busy') checked="checked" @endif>
                                                <label class="custom-control-label" for="customRadio2">Busy</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio4" name="status" value="Blocked" class="custom-control-input" @if($user->status == 'Blocked') checked="checked" @endif>
                                                <label class="custom-control-label" for="customRadio4">Blocked</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio5" name="status" value="Away" class="custom-control-input" @if($user->status == 'Away') checked="checked" @endif>
                                                <label class="custom-control-label" for="customRadio5">Away</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio6" name="status" value="Pending" class="custom-control-input" @if($user->status == 'Pending') checked="checked" @endif>
                                                <label class="custom-control-label" for="customRadio6">Pending</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection