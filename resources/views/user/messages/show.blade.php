@extends('layouts.site')
@section('title') Email Message Details @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> Message Details | {{ Auth::user()->name }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}"> Profile </a></li>
                <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}"> Emailing </a></li>
                <li class="breadcrumb-item active"> Email Details </li>
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

                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-secondary btn-xs font-18"><a href="{{ route('message.index','inbox') }}"><i class="mdi mdi-inbox-arrow-down"></i></a></button>
                                <button type="button" class="btn btn-secondary btn-xs font-18"><a href="{{ route('message.index','spam') }}"><i class="mdi mdi-alert-octagon"></i></a></button>
                                <button type="button" class="btn btn-secondary btn-xs font-18"><i class="mdi mdi-delete"></i></button>
                            </div>
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> 
                                        <a class="dropdown-item" href="#">Send to Spam</a> 
                                        <a class="dropdown-item" href="#">Send to Trash</a> 
                                        <a class="dropdown-item" href="#">
                                            <form action="{{ route('messages.destroy',[$message->id,'delete']) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="dropdown-item btn btn-danger" onclick="return confirm('You are about to delete thus mail!\nThis is not reversible!')" title="This lets you delete email completely.">Delete Mail</button>
                                            </form> 
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <form action="{{ route('messages.update',[$message->id,'updated']) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <input type="hidden" name="sender" value="{{ $message->sender }}">
                                            <input type="hidden" name="receiver" value="{{ $message->receiver }}">
                                            <input type="hidden" name="message" value="{{ $message->message }}">

                                            <div class="demo-radio-button btn-success dropdown-item">
                                                <input type="radio" name="folder" value="important" @if ($message->folder == 'important')
                                                    checked="checked" @endif id="radio_1"> 
                                                <label for="radio_1">Make Important</label>
                                            </div>
                                            <div class="demo-radio-button btn-success dropdown-item">
                                                <input type="radio" name="folder" value="urgent" @if ($message->folder == 'urgent')
                                                    checked="checked" @endif id="radio_2"> 
                                                <label for="radio_2">Make Urgent</label>
                                            </div>
                                            <div class="demo-radio-button btn-success dropdown-item">
                                                <input type="radio" name="folder" value="official" @if ($message->folder == 'official')
                                                    checked="checked" @endif id="radio_3"> 
                                                <label for="radio_3">Make Official</label>
                                            </div>
                                            <div class="demo-radio-button btn-success dropdown-item">
                                                <input type="radio" name="folder" value="unofficial" @if ($message->folder == 'unofficial')
                                                    checked="checked" @endif id="radio_4"> 
                                                <label for="radio_4">Make Unofficial</label>
                                            </div>
                                            <div class="demo-radio-button btn-success dropdown-item">
                                                <input type="radio" name="folder" value="normal" @if ($message->folder == 'normal')
                                                    checked="checked" @endif id="radio_5"> 
                                                <label for="radio_5">Make Normal</label>
                                            </div>
                                            <div class="demo-radio-button btn-success dropdown-item ">
                                                <input type="radio" name="folder" value="" @if ($message->folder == '')
                                                    checked="checked" @endif id="radio_6"> 
                                                <label for="radio_6">Remove Label</label>
                                            </div>
                                            <button type="submit" class="dropdown-item btn-info text-white" title="href='{{ route('messages.update',[$message->id,'edit']) }}'">Make Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="button " class="btn btn-secondary btn-xs m-r-10 m-b-10"><a href=""><i class="mdi mdi-reload font-18"></i></a></button>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="card-body">
                                    <h3 class="card-title m-b-0"> {{ $message->title }} </h3>
                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex m-b-40">
                                        <div>
                                            <a href="javascript:void(0)"><img src="{{ asset('files/profile/images/'. App\User::where('id',$message->sender)->get()->first()->profile_image) }}" alt="user" width="40" class="img-circle" /></a>
                                        </div>
                                        <div class="p-l-10">
                                            @if($message->sender == Auth::user()->id)
                                                <h4 class="m-b-0">{{ App\User::where('id',$message->receiver)->get()->first()->name }}</h4>
                                                <small class="text-muted">From: Me</small>
                                            @else
                                                <h4 class="m-b-0">To: Me <small> ( {{ $message->status . ', ' . $message->folder }} )</small></h4>
                                                <small class="text-muted">From: {{ App\User::where('id',$message->sender)->get()->first()->email . ' ( ' . App\User::where('id',$message->sender)->get()->first()->name . ' )' }}</small>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" disabled rows="10" style="background: #fff">{{ $message->message }}</textarea>
                                    </div>
                                </div>
                                @if($message->attachment)
                                    <div class="card-body">
                                        <h4><i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments <span>(3)</span></h4>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="../assets/images/big/img1.jpg"> </a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="../assets/images/big/img2.jpg"> </a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="../assets/images/big/img3.jpg"> </a>
                                            </div>
                                        </div>
                                        <div class="b-all m-t-20 p-20">
                                            <p class="p-b-20">click here to <a href="#">Reply</a> or <a href="#">Forward</a></p>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <span>Date Sent: {{ $message->created_at }}</span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection