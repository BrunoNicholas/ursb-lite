@section('title') Admin @endsection
@section('styles')

@endsection
@extends('layouts.site')
@section('title') Admin Dashboard @endsection
@section('locator')
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ Auth::user()->name }} | Administrator's Dashboard</h4>
            <div class="d-flex align-items-center">

            </div> 
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection



@endsection
@section('content')
    @include('layouts.includes.notifications')
    


@endsection
@section('scripts')  
@endsection