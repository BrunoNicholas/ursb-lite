@extends('layouts.site')
@section('title') Edit Administration Department @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Edit Department | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> System Users </a></li>
                <li class="breadcrumb-item"><a href="{{ route('department.index') }}"> Departments </a></li>
                <li class="breadcrumb-item active"> Edit Departments </li>
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
                    <a href="{{ route('department.index') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-list"></i> Back </a>
                    <h4 class="card-subtitle m-b-40"> {{ config('app.name') }} Departments </h4>
                    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                        <h6>Basic Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Department Name <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name" value="{{ $department->name }}" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1"> Description :</label>
                                        <textarea name="description" class="form-control" placeholder="Department description details">{{ $department->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1"> Level :</label>
                                        <select class="custom-select form-control" id="gender1" name="level">
                                            <option value="{{ $department->level }}"> Change to update </option>
                                            <option value="1">First (Data)</option>
                                            <option value="2">Second (Records)</option>
                                            <option value="3">Third (Registrar)</option>
                                            <option value="4">Fourth (Dispatch)</option>
                                            <option value="5">Fifth (Review)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Final Step</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Account Status :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="Active" class="custom-control-input" @if($department->status == 'Active')
                                                    checked
                                                @endif >
                                                <label class="custom-control-label" for="customRadio1">Active </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="Busy" class="custom-control-input" @if($department->status == 'Busy')
                                                    checked
                                                @endif >
                                                <label class="custom-control-label" for="customRadio2">Busy</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio4" name="status" value="Blocked" class="custom-control-input" @if($department->status == 'Blocked')
                                                    checked
                                                @endif >
                                                <label class="custom-control-label" for="customRadio4">Blocked</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio5" name="status" value="Away" class="custom-control-input" @if($department->status == 'Away')
                                                    checked
                                                @endif >
                                                <label class="custom-control-label" for="customRadio5">Away</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio6" name="status" value="Pending" class="custom-control-input" @if($department->status == 'Pending')
                                                    checked
                                                @endif >
                                                <label class="custom-control-label" for="customRadio6">Pending</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Update Department</button>
                        </div>
                    </form>


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
@endsection