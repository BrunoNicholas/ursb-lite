@extends('layouts.site')
@section('title') New Certificate @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Create Certificates | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"> Companies </a></li>
                <li class="breadcrumb-item"><a href="{{ route('certificate.index') }}"> Certificates </a></li>
                <li class="breadcrumb-item active"> New Certificate </li>
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
                    <a href="{{ route('certificate.index') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-book"></i> Back </a>
                    <h4 class="card-subtitle m-b-40"> Company Certificates </h4>



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