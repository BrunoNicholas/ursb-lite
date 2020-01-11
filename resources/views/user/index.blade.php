@extends('layouts.site')
@section('title') Settings @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Settings And Updates | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-home fa"></i> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}"><i class="fa-user fa"></i> My Profile </a></li>
                <li class="breadcrumb-item active"><i class="fa-gear fa"></i> Settings</li>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-subtitle m-b-40 text-center"><i class="ti-wallet"></i> Balance &amp; Payments</h4>

                    <!-- navigation tables -->
                    <div class="vtabs customvtab" style="width: 100%;">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">







                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-subtitle m-b-40 text-center">Previous Transactions</h4>

                    <!-- navigation tables -->
                    <div class="vtabs customvtab" style="width: 100%;">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">







                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('js/dashboard4.js') }}"></script>
@endsection