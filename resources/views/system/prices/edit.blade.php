@extends('layouts.site')
@section('title') Edit Registration Price @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Edit Registration Prices | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"> Companies </a></li>
                <li class="breadcrumb-item"><a href="{{ route('reg.index') }}"> Company Notices </a></li>
                <li class="breadcrumb-item"><a href="{{ route('price.index') }}"> Prices </a></li>
                <li class="breadcrumb-item active"> Edit Prices </li>
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
                    <a href="{{ route('price.create') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-plus"></i> Add New </a>
                    <h4 class="card-subtitle m-b-40"> Edit Price Details </h4>
                    <form action="{{ route('prices.update', $price->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                                        <label for="Names">Item Name <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name" value="{{ $price->name }}" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1"> Quantity :</label>
                                        <input type="number" name="quantity" id="gender1" value="{{ $price->quantity }}" class="form-control" placeholder="Item quantity">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1"> Description (Comment) :</label>
                                        <textarea name="comment" class="form-control" placeholder="Description or comment on this item price">{{ $price->comment }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="px1"> Previous Price : </label>
                                        <input type="number" name="previous_price" placeholder="0.00 USD" value="{{ $price->previous_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="px2"> Current Price : </label>
                                        <input type="number" id="px2" name="current_price" placeholder="0.00 USD" value="{{ $price->current_price }}">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success"> Update Price Item </button>
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