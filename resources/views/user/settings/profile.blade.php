@extends('layouts.site')
@section('title') {{ Auth::user()->name }} Profile @endsection
@section('styles')  @endsection
@section('navigator')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"> {{ Auth::user()->name }} Profile | {{ config('app.name') }} </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                <li class="breadcrumb-item active"> My Profile </li>
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
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" class="rounded-circle" width="150" alt="Profile Image" />
                        <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                        <h6 class="card-subtitle">{{ (App\Models\Role::where('name',Auth::user()->role)->get()->first())->display_name }}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">{{ Auth::user()->church }}</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">{{ Auth::user()->occupation }}</font></a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{ Auth::user()->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ Auth::user()->telephone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ Auth::user()->location . ' | ' . Auth::user()->nationality }}</h6>
                    <hr>
                    <small class="text-muted p-t-30 db">{{ config('app.name') }} | Social Profile</small>
                    <br/>
                    <a href="#"><button class="btn btn-circle btn-secondary"><i class="fa fa-facebook-f"></i></button></a>
                    <a href="#"><button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button></a>
                    <a href="#"><button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button></a>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Your Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#change-password" role="tab" aria-controls="pills-setting" aria-selected="false">Change Password</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <div class="profiletimeline m-t-0">
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" alt="user" class="rounded-circle" /> </div>
                                    <div class="sl-right">
                                        <div><a href="javascript:void(0)" class="link">{{ Auth::user()->name }}</a> - <span class="sl-date">{{ Auth::user()->created_at }}</span>
                                        	<hr>
                                            <p class="m-t-10"> Thank you for using {{ config('app.name') }}, we hope you are served well! </p>
                                        </div>
                                        <!--
                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div> -->
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->telephone }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->location }}</p>
                                </div>
                            </div>
                            <hr>
                            <h4 class="font-medium m-t-30 text-center"> Update Profile Image </h4>
                                <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 text-center" style=" padding: 5px;">
                                                <input type="file" name="profile_image" accept=".jpg, .png, .jpeg" class="pull-left">
                                            </div>
                                            <div class="col-md-6 text-right" style="padding: 5px;">
                                                <button type="submit" class="btn btn-sm btn-success btn-rounded pull-right" >UPDATE IMAGE</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <hr>
                            <p class="m-t-30">
                                {{ Auth::user()->bio }}
                            </p>
                            <h4 class="font-medium m-t-30"> Activities </h4>
                            <hr>
                            <h5 class="m-t-30">System  Record</h5>
                            <div class="">
                                <div class="text-center">
                                    <p>
                                        You last updated your profile on {{ Auth::user()->updated_at }}
                                    </p>
                                    <p class="text-success">
                                        You joined the {{ config('app.name') }} on {{ Auth::user()->created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="{{ route('users.update', $user->id) }}" method="POST">
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
                                <div class="form-group">
                                    <label class="col-md-12">Full Name <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Full names" name="name" class="form-control form-control-line" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"> Preferred Username </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Choose Username" name="username" class="form-control form-control-line" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Working Email" class="form-control form-control-line" value="{{ $user->email }}" id="example-email" disabled title="Email can not be changed while logged in.">
                                    </div>
                                </div>
                                <input type="hidden" name="router" value="profile">
                                <div class="form-group">
                                    <label class="col-md-12">Gender</label>
                                    <div class="col-md-12">
                                        <input type="radio" id="gender1" value="Male" name="gender" @if ($user->gender == 'Male')
                                            checked="checked" 
                                        @endif>  <label for="gender1"> Male </label>
                                        <input type="radio" id="gender2" value="Female" name="gender" @if ($user->gender == 'Female')
                                            checked="checked" 
                                        @endif> <label for="gender2">Female</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone Number <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" name="telephone" placeholder="Working phone number" class="form-control form-control-line" value="{{ $user->telephone }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date Of Birth </label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="Your date of birth" name="date_of_birth" class="form-control form-control-line" value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Location </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="where you stay Currently" name="location" class="form-control form-control-line" value="{{ $user->location }}">
                                    </div>
                                </div>
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                <div class="form-group">
                                    <label class="col-md-12">Nationality </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="The country where you're from" name="nationality" class="form-control form-control-line" value="{{ $user->nationality }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Occupation </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="What you do for a living" name="occupation" class="form-control form-control-line" value="{{ $user->occupation }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Account Status </label>
                                    <div class="col-md-12">
                                        <input type="radio" name="status" value="Active" id="status1" @if ($user->status == 'Active')
                                            checked="checked" 
                                        @endif> <label for="status1">Active</label>
                                        <input type="radio" name="status" value="Busy" id="status2" @if ($user->status == 'Busy')
                                            checked="checked" 
                                        @endif> <label for="status2">Busy</label>
                                        <input type="radio" name="status" value="Inactive" id="status3" @if ($user->status == 'Inactive')
                                            checked="checked" 
                                        @endif> <label for="status3">Inactive</label>
                                        <input type="radio" name="status" value="Blocked" id="status4" @if ($user->status == 'Blocked')
                                            checked="checked" 
                                        @endif> <label for="status4">Blocked</label>
                                        <input type="radio" name="status" value="Away" id="status5" @if ($user->status == 'Away')
                                            checked="checked" 
                                        @endif> <label for="status5">Away</label>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="change-password" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                {{-- method_field('PATCH') --}}
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" id="prev-password" placeholder="Previously used password" name="previous_password" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Enter new password" name="password" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-danger">Update Account Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
@section('scripts')
@endsection