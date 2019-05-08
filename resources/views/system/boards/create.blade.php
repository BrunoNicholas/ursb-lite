@extends('layouts.site')
@section('title') Add Board @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Add Admin Board | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Administrator </a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles </a></li>
                <li class="breadcrumb-item"><a href="{{ route('board.index') }}"> Administration Boards </a></li>
                <li class="breadcrumb-item active"> Add Board </li>
            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
            	<i class="ti-settings text-white"></i>
            </button>
        </div>
    </div>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">



    </div>
@endsection
@section('scripts')
@endsection