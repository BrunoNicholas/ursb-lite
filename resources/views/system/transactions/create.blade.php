@extends('layouts.site')
@section('title') Add Company Transaction @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Create Transaction | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"> Companies </a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}"> Transactions </a></li>
                <li class="breadcrumb-item active"> Add Transaction </li>
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
        <div class="col-md-8">
            
        </div>
        <div class="col-md" id="pay">
            <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
            <script>paypal.Buttons().render('#pay');</script>
        </div>
    </div>
@endsection
@section('scripts')
@endsection