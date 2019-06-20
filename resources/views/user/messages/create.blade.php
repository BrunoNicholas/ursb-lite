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
                    <div class="col-xlg-2 col-lg-3 col-md-4">
                        <div class="card-body inbox-panel"><a href="{{ route('message.create',['inbox']) }}" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light"> Compose </a>
                            <ul class="list-group list-group-full">
                                <li class="list-group-item @if ($type == 'inbox')
                                	active
                                @endif"> 
                                	<a href="{{ route('message.index', 'inbox') }}"> <i class="mdi mdi-gmail"></i> Inbox </a>
                                	<span class="badge badge-info ml-auto">{{ $inboxCount }}</span>
                                </li>
                                <li class="list-group-item @if ($type == 'draft')
                                	active
                                @endif">
                                    <a href="{{ route('message.index', 'draft') }}"> <i class="mdi mdi-file-document-box"></i> Draft </a>
                                    <span class="badge badge-primary ml-auto">{{ $draftCount }}</span>
                                </li>
                                <li class="list-group-item @if ($type == 'sent')
                                	active
                                @endif">
                                    <a href="{{ route('message.index', 'sent') }}"> <i class="mdi mdi-send"></i> Sent Mail </a>
                                    <span class="badge badge-success ml-auto">{{ $sentCount }}</span>
                                </li>
                                <li class="list-group-item @if ($type == 'all')
                                	active
                                @endif">
                                    <a href="{{ route('message.index', 'spam') }}"> <i class="mdi mdi-bug"></i> Spam </a>
                                    <span class="badge badge-warning ml-auto">{{ $spamCount }}</span>
                                </li>
                                <li class="list-group-item @if ($type == 'trash')
                                	active
                                @endif">
                                    <a href="{{ route('message.index', 'trash') }}"> <i class="mdi mdi-delete"></i> Trash </a>
                                    <span class="badge badge-danger ml-auto">{{ $trashCount }}</span>
                                </li>
                            </ul>
                            <h3 class="card-title m-t-40">Labels</h3>
                            <div class="list-group b-0 mail-list"> 
                            	<a href="{{ route('message.index', 'important') }}" class="list-group-item"> 
                            		<span class="fa fa-circle text-danger m-r-10"></span> Important 
	                            		<span class="label label-default float-right text-info">
	                                {{ $impCount }}
	                            </span>
                            	</a>
                            	<a href="{{ route('message.index', 'normal') }}" class="list-group-item"> 
                            		<span class="fa fa-circle text-info m-r-10"></span> Normal 
                            		<span class="label label-default float-right text-info">
		                                {{ $normalCount }}
		                            </span>
                            	</a>
                            	<a href="{{ route('message.index', 'official') }}" class="list-group-item"> 
                            		<span class="fa fa-circle text-warning m-r-10"></span> Official 
                            		<span class="label label-default float-right text-info">
		                                {{ $offCount }}
		                            </span>
                            	</a>
                            	<a href="{{ route('message.index', 'unofficial') }}" class="list-group-item"> 
                            		<span class="fa fa-circle text-purple m-r-10"></span> Unofficial 
                            		<span class="label label-default float-right text-info">
		                                {{ $unoffCount }}
		                            </span>
                            	</a>
                            	<a href="{{ route('message.index', 'urgent') }}" class="list-group-item">
                            		<span class="fa fa-circle text-success m-r-10"></span> Urgent 
                            		<span class="label label-default float-right text-info">
		                                {{ $urgCount }}
		                            </span>
                            	</a>
                            	<a href="{{ route('message.index', 'all') }}" class="list-group-item"> 
                            		<span class="fa fa-circle text-secondary m-r-10"></span> All 
                            		<span class="label label-default float-right text-info">
		                                {{ $allCount }}
		                            </span>
                            	</a>
                            </div>
                        </div>
                    </div>

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
	                            @role(['super-admin'])
	                            <h4><i class="ti-link"></i> Attachment </h4>
	                            <div action="#" class="dropzone">
	                                <div class="fallback">
	                                    <input name="file" type="file" multiple />
	                                </div>
	                            </div>
	                            @endrole
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