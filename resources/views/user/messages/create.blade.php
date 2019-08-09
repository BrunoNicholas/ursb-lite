@extends('layouts.site')
@section('title') Create Message @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />
    <link href="{{ asset('assets/plugins/dropzone-master/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Create Message | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}"> Profile </a></li>
                <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}"> Emailing </a></li>
                <li class="breadcrumb-item active"> Create Email </li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    @include('layouts.includes.right_email')

                    <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                        <div class="card-body">
                        	<form action="{{ route('messages.store','inbox') }}" method="POST">
                        		@csrf
			                    @foreach ($errors->all() as $error)
			                        <p class="alert alert-danger">{{ $error }}</p>
			                    @endforeach

			                    @if (session('success'))
			                        <div class="alert alert-success">
			                            {{ session('success') }}
			                        </div>
			                    @endif
			                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
	                            <h3 class="card-title">Compose New Message</h3>
	                            <div class="form-group">
	                                <select class="custom-select form-control" name="receiver" placeholder="To:">
	                                	<option value="{{ Auth::user()->id }}"> Send to: </option>
	                                	@foreach($users as $user)
	                                		@if($user->id != Auth::user()->id)
	                                		<option value="{{ $user->id }}">{{ $user->email . ' (' . $user->name . ', '. $user->status . ') - ' . $user->telephone}}</option>
	                                		@endif
	                                	@endforeach
	                                </select>
	                            </div>
			                    <div class="form-group">
			                        <div class="row">
			                            <div class="col">
			                                <input type="text" id="title" name="title" class="form-control" placeholder="Subject">
			                            </div>
			                            <div class="col">
			                                <select class="custom-select form-control" name="folder">
			                                    <option value="normal">Select priority</option>
			                                    <option value="important">Important</option>
			                                    <option value="urgent">Urgent</option>
			                                    <option value="official">Official</option>
			                                    <option value="unofficial">Unofficial</option>
			                                    <option value="normal">Normal</option>
			                                    <option value="">None</option>
			                                </select>
			                            </div>
			                        </div>
			                    </div>
	                            <div class="form-group">
	                                <textarea class="textarea_editor form-control" name="message" rows="10" placeholder="Enter text ..."></textarea>
	                            </div>
	                            <div class="form-group">
	                            	<div class="row">
	                            		<div class="demo-radio-button">
	                            			<input type="radio" name="status" id="radio_1" value="inbox" checked> <label for="radio_1">Send Mail </label>
	                            			<input type="radio" name="status" id="radio_2" value="draft"> <label for="radio_2">Save As Draft </label>
	                            		</div>
	                            	</div>
	                            </div>

	                            <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
	                            <a href="{{ route('message.index','inbox') }}" class="btn btn-inverse m-t-20"><i class="fa fa-times"></i> Discard</a>
	                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('assets/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone-master/dist/dropzone.js') }}"></script>
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();

    });
    </script>
@endsection