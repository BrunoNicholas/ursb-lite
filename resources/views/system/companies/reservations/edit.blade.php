@extends('layouts.site')
@section('title') Edit Company Reservation @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Edit Company Reservation | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"> Companies </a></li>
                <li class="breadcrumb-item"><a href="{{ route('reservation.index') }}"> Company Reservation </a></li>
                <li class="breadcrumb-item active"> Edit Company Reservation </li>
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
                    <a href="{{ route('reservation.index') }}" class="btn btn-xs btn-info float-right"><i class="fa fa-list"></i> Back </a>
                    <h4 class="card-subtitle m-b-40"> Edit Reservation Details | {{ config('app.name') }} </h4>
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                        <input type="hidden" name="created_by" value="{{ $reservation->created_by }}">
                        <h6><b>Basic Info</b></h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Names"> Received From <span class="text-danger">*</span> :</label>
                                        <input type="text" name="from_name" value="{{ $reservation->from_name }}" class="form-control" id="Names" > 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Email"> Email <span class="text-danger">*</span> :</label>
                                        <input type="email" name="from_email" value="{{ $reservation->from_email }}" class="form-control" id="Email" > 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Phone"> Phone Number <span class="text-danger">*</span> :</label>
                                        <input type="text" name="from_telephone" value="{{ $reservation->from_telephone }}" class="form-control" id="Phone" > 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Phone"> Signature Proof <span class="text-danger">*</span> :</label>
                                        <input type="file" name="signature_proof" value="{{ $reservation->signature_proof }}" class="form-control" > 
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6><b>More Info</b></h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shared"> Shared Ltd Company :</label>
                                        <input type="text" name="shared_limited_company" value="{{ $reservation->shared_limited_company }}" class="form-control" id="shared" placeholder="Any shared limited company!"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="guarantee"> Guarantee Ltd Company :</label>
                                        <input type="text" name="guarantee_limited_company" value="{{ $reservation->guarantee_limited_company }}" class="form-control" id="guarantee" placeholder="Guarantee to limited company!"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ngo"> Non Government Organisation :</label>
                                        <input type="text" name="non_government_org" value="{{ $reservation->non_government_org }}" class="form-control" id="ngo" placeholder="Guarantee to limited company!"> 
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6><b>Final Step (Names) </b></h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shared"> Name Choice 1 :</label>
                                        <input type="text" name="name_choice_1" value="{{ $reservation->name_choice_1 }}" class="form-control" id="shared" placeholder="Choice of name one"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shared"> Name Choice 2 :</label>
                                        <input type="text" name="name_choice_2" value="{{ $reservation->name_choice_2 }}" class="form-control" id="shared" placeholder="Choice of name two"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shared"> Name Choice 3 :</label>
                                        <input type="text" name="name_choice_3" value="{{ $reservation->name_choice_3 }}" class="form-control" id="shared" placeholder="Choice of name three"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shared"> Received Date :</label>
                                        <input type="date" name="date" value="{{ $reservation->date }}" class="form-control" id="shared" placeholder="Date"> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Account Status :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="1" class="custom-control-input" @if ($reservation->status == 1)
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio1" >Taken </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="2" class="custom-control-input" @if ($reservation->status == 2)
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio2">Open</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="status" value="3" class="custom-control-input" @if ($reservation->status == 3)
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio2">Not Available</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Update Reservation</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-subtitle m-b-40"> Notice </h4>


                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
@endsection