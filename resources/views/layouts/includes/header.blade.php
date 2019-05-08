<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="{{ config('app.name') }}" class="dark-logo" sizes="32x32" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="{{ config('app.name') }}" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                 <!-- dark Logo text -->
                 <img src="{{ asset('assets/images/logo-text.png') }}" alt="{{ config('app.name') }}" class="dark-logo" />
                 <!-- Light Logo text -->    
                 <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo" alt="{{ config('app.name') }}" /></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong> Check all </strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                        <ul>
                            <!-- {{ $messages = App\Models\Message::where([['receiver',Auth::user()->id],['status', 'inbox']])->latest()->paginate() }} -->
                            <li>
                                <div class="drop-title">You have {{ $messages->count() }} new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- <?php $c=0; ?> -->
                                    @foreach($messages as $message)
                                        @if($c < 3)
                                        <!-- Message -->
                                        <a href="{{ route('message.show',[$message->id,'inbox']) }}">
                                            <div class="user-img"> <img src="{{ asset('files/profile/images/'. App\User::where('id',$message->sender)->get()->first()->profile_image) }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>{{ App\User::where('id',$message->sender)->get()->first()->name }}</h5> <span class="mail-desc">{{ $message->title }}</span> <span class="time">{{ $message->created_at }}</span> </div>
                                        </a>
                                        @endif
                                        <!-- {{ ++$c }} -->
                                    @endforeach

                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="{{ route('message.index','inbox') }}"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <li class="nav-item" style="min-width: 265px;">
                	<span class="nav-link text-white waves-effect waves-dark">
	                	<i class="fa fa-clock font-18 text-danger"></i> 
	                	<b id="MyClockDisplay"></b> 
	                	<b>|</b> 
	                	<i class="fa fa-calendar-alt text-primary"></i> 
						<b>{{ date('d / m / Y') }}</b>
					</span>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box"> 
                    @if(URL::previous() != Request::fullUrl())
                        <a href="{{ URL::previous() }}" class="nav-link dropdown-toggle text-muted waves-effect waves-dark"> Back </a>
                    @endif
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box"> 
                    <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> 
                    </form>
                </li>
                
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-ug"></i> Uganda </a>
                </li>
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('files/profile/images/'. Auth::user()->profile_image) }}" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('files/profile/images/'. Auth::user()->profile_image) }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4> {{ Auth::user()->name }} </h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{ route('profile') }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('profile') }}"><i class="ti-user"></i> My Profile</a></li>
                            <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li> -->
                            <li><a href="{{ route('messages.index',['type'=>'inbox']) }}"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>

                            <li>
                            	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            		<i class="fa fa-power-off"></i> 
	                            	{{ __('Logout') }}
	                            </a>
	                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
	                        </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>