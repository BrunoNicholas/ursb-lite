@extends('layouts.site')
@section('title') Email Messages @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Messaging | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}"> Profile </a></li>
                <li class="breadcrumb-item active"> Mailing </li>
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
                        	<div class="p-15 b-b">
				                <div class="d-flex align-items-center">
				                    <div>
				                        <h4>Your Email Messages </h4>
				                        <span>The <a href="{{ url('/') }}">{{ config('app.name') }}</a> mailing is not diverse platform. Used it for official communication.</span>
				                    </div>
				                    <div class="ml-auto">
				                        <input placeholder="Search Mail" id="search-mail" type="text" class="form-control">
				                    </div>
				                </div>
				            </div>
                            <div class="bg-light p-15 d-flex align-items-center do-block" style="padding-top: 18px;">
				                <div class="btn-group m-t-5 m-b-5">
				                    <div class="custom-control custom-checkbox">
				                        <input type="checkbox" class="custom-control-input sl-all" id="cstall">
				                        @if($type == 'inbox')
				                            <i class="fa fa-envelope text-info"></i> Inboxed E-mail 
				                        @elseif($type == 'draft')
				                            <i class="fa fa-envelope text-primary"></i> Drafted E-mail
				                        @elseif($type == 'trash')
				                            <i class="fa fa-envelope text-danger"></i> Trashed E-mail
				                        @elseif($type == 'spam')
				                            <i class="fa fa-envelope text-warning"></i> Spamed E-mail
				                        @elseif($type == 'sent')
				                            <i class="fa fa-envelope text-success"></i> Sent E-mail
				                        @elseif($type == 'important')
				                            <i class="fa fa-envelope text-danger"></i> Important E-mail
				                        @elseif($type == 'urgent')
				                            <i class="fa fa-envelope text-success"></i> Urgent E-mail
				                        @elseif($type == 'official')
				                            <i class="fa fa-envelope text-warning"></i> Official E-mail
				                        @elseif($type == 'unofficial')
				                            <i class="fa fa-envelope text-info"></i> Unofficial E-mail
				                        @elseif($type == 'normal')
				                            <i class="fa fa-envelope text-dark"></i> Normal E-mail
				                        @elseif($type == 'all')
				                            <i class="fa fa-envelope text-primary"></i> All E-mail
				                        @elseif($type == 'all')
				                            All E-mail
				                        @else
				                            E-mails
				                        @endif
				                    </div>
				                </div>
				                <div class="ml-auto">
				                    <div class="btn-group m-r-10" role="group" aria-label="Button group with nested dropdown">
				                        <button type="button" class="btn btn-xs btn-outline-secondary font-18"><a href=""><i class="mdi mdi-reload"></i></a></button>
				                        <button type="button" class="btn btn-xs btn-outline-secondary font-18"><a href="{{ route('message.index', 'spam') }}"><i class="mdi mdi-alert-octagon"></i></a></button>
				                        <button type="button" class="btn btn-xs btn-outline-secondary font-18"><a href="{{ route('message.index','trash') }}"><i class="mdi mdi-delete"></i></a></button>
				                    </div>
				                    <div class="btn-group m-r-10" role="group" aria-label="Button group with nested dropdown">
				                        <div class="btn-group" role="group">
				                            <button id="btnGroupDrop1" type="button" class="btn btn-xs btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
				                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> 
				                                <a class="dropdown-item" href="{{ route('message.index','inbox') }}">Inbox</a> 
				                                <a class="dropdown-item" href="{{ route('message.index','sent') }}">Sent</a> 
				                                <a class="dropdown-item" href="{{ route('message.index','draft') }}">Draft</a> 
				                                <a class="dropdown-item" href="{{ route('message.index','spam') }}">Spam</a> 
				                                <a class="dropdown-item" href="{{ route('message.index','trash') }}">Trash</a>
				                            </div>
				                        </div>
				                        <div class="btn-group" role="group">
				                            <button id="btnGroupDrop1" type="button" class="btn btn-xs btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
				                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				                                <a class="dropdown-item" href="{{ route('message.index', 'important') }}">Important</a> 
				                                <a class="dropdown-item" href="{{ route('message.index', 'urgent') }}">Urgent</a> 
				                                <a class="dropdown-item" href="{{ route('message.index', 'official') }}">Official</a> 
				                                <a class="dropdown-item" href="{{ route('message.index', 'unofficial') }}">Unofficial</a> 
				                                <a class="dropdown-item" href="{{ route('message.index', 'normal') }}">Normal</a>
				                                <br> 
				                                <a class="dropdown-item" href="{{ route('message.index', 'all') }}">All</a> 
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <tbody>
                                        	@if(sizeof($messages) < 1)
				                                <tr class="unread">
				                                    <td class="max-texts text-info text-center" colspan="3" class="max-texts"> <i> No email found! </i> </td>
				                                </tr>
				                            @endif
                                        	@foreach ($messages as $message)
					                            <tr class="unread">
	                                                <td style="width:40px">
	                                                    <div class="checkbox">
	                                                        <input type="checkbox" id="checkbox{{ $message->id }}" value="check">
	                                                        <label for="checkbox{{ $message->id }}"></label>
	                                                    </div>
	                                                </td>
	                                                <td style="width:30px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
	                                                <td class="hidden-xs-down">
	                                                	@if($message->status == 'inbox')
						                                    @if($message->sender == Auth::user()->id)
						                                    	<td class="user-image">
							                                        <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
							                                    </td>
							                                    <td class="user-name">
							                                        <h6 class="m-b-0"><i>To:</i> <b>{{ (App\User::where('id',$message->receiver)->get()->first())->name }}</b></h6>
							                                    </td>
						                                    @else
						                                    	<td class="user-image">
							                                        <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
							                                    </td>
							                                    <td class="user-name">
							                                        <h6 class="m-b-0"><i>From:</i> <b>{{ (App\User::where('id',$message->sender)->get()->first())->name }}</b></h6>
							                                    </td>
						                                    @endif
						                                @else
						                                    <td class="user-image">
						                                        <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
						                                    </td>
						                                    <td class="user-name">
						                                        <h6 class="m-b-0">({{ $message->status }}) <b>{{ (App\User::where('id',$message->receiver)->get()->first())->name }}</b></h6>
						                                    </td>
						                                @endif 
	                                                </td>
	                                                <td class="max-texts"> 
	                                                	<a href="{{ route('message.show',[$message->id,$message->status]) }}" />
	                                                	@if($message == 'normal' || $message == 'Normal')
	                                                		<span class="btn btn-info btn-xs"> Normal </span> 
	                                                	@elseif($message->folder == 'important')
	                                                		<span class="btn btn-danger btn-xs"> Important </span> 
	                                                	@elseif($message->folder == 'official')
	                                                		<span class="btn btn-warning btn-xs"> Official </span> 
	                                                	@elseif($message->folder == 'unofficial')
	                                                		<span class="btn btn-primary btn-xs"> Unofficial </span> 
	                                                	@elseif($message->folder == 'urgent')
	                                                		<span class="btn btn-success btn-xs"> Urgent </span> 
	                                                	@else
	                                                		<span class="btn btn-default btn-xs">{{ $message->folder }}</span> 
	                                                	@endif
	                                                	@if($message->title)
	                                                		{{ $message->title }}...
	                                                	@else
	                                                		<span class="text-info">No title</span>
	                                                	@endif
	                                                </td>
	                                                <td class="text-right"> {{ $message->created_at }} </td>
	                                            </tr>
	                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-15 m-t-30">
					                <nav aria-label="Page navigation example" style="padding: 10px;">
					                    {{ $messages->links() }}
					                </nav>
					            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
@section('scripts')  

@endsection