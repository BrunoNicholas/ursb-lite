@extends('layouts.site')
@section('title') Home @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Home | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <!-- {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li> --}} -->
                <li class="breadcrumb-item active"> Home </li>
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
    @include('layouts.includes.notify_user')
    <div class="row">



    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('js/dashboard4.js') }}"></script>
@endsection