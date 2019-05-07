@extends('layouts.site')
@section('title') Edit Mail Message @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Edit Message | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}"> Profile </a></li>
                <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}"> Emailing </a></li>
                <li class="breadcrumb-item active"> Edit Email </li>
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
                    







                </div>
            </div>
        </div>
    </div>
@endsection