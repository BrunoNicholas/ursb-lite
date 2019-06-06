<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('files/profile/images/'. Auth::user()->profile_image) }}" alt="user" /> 
                     <!-- this is blinking heartbit-->
                    <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>
            <!-- User profile text-->
            <div class="profile-text"> 
                <h5> {{ Auth::user()->name }} </h5>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="{{ route('message.index',['type'=>'inbox']) }}" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout">
                	<i class="mdi mdi-power"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <div class="dropdown-menu animated flipInY">
                <!-- text--> 
                <a href="{{ route('profile') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                <!-- text-->  
                <a href="{{ route('message.index',['type'=>'inbox']) }}" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                <!-- text--> 
                <div class="dropdown-divider"></div>
                <!-- text-->  
                <a href="{{ route('admin') }}" class="dropdown-item"><i class="ti-settings"></i> More Setting</a>
                <!-- text--> 
                <div class="dropdown-divider"></div>
                <!-- text-->  
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> {{ __('Logout') }} </a>
                <!-- text-->  
                </div>
            </div>
        </div>
        <!-- End User profile text-->

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                 <li class="nav-devider"></li>
                <li class="nav-small-cap">PERSONAL SECTION</li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboards</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @role(['super-admin','admin'])
                        <li><a href="{{ route('admin') }}">Admin Dashboard</a></li>
                        @endrole
                    </ul>
                </li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="{{ route('message.index', ['type'=>'inbox']) }}" aria-expanded="false">
                        <i class="mdi mdi-email"></i>
                        <span class="hide-menu">Messaging</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('message.index',['type'=>'inbox']) }}"> Inbox </a></li>
                        <li><a href="{{ route('message.create','inbox') }}"> Compose Mail </a></li>
                    </ul>
                </li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span class="hide-menu"> Other Links </span> <!-- <span class="label label-rouded label-danger pull-right">25</span> -->
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('profile') }}">My Profile</a></li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a></li>
                    </ul>
                </li>
                
                <li class="nav-small-cap"> COMPANY DETAILS &amp; OPERATIONS </li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-widgets"></i>
                        <span class="hide-menu"> Companies </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('company.index') }}"> Companies </a></li>
                        <li><a href="{{ route('company.create') }}"> Add New Company </a></li>
                        
                    </ul>
                </li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-file"></i><span class="hide-menu"> Name Reservations </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('reservation.index') }}"> Available Reservations </a></li>
                        <li><a href="{{ route('reservation.create') }}"> Add Reservation </a></li>
                    </ul>
                </li>
                <!--
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">

                    </ul>
                </li> -->
                <!--
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-map-marker"></i>
                        <span class="hide-menu">  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">

                    </ul>
                </li> -->
                <!--
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-file-chart"></i>
                        <span class="hide-menu">  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">

                    </ul>
                </li> -->
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu"> Company Registration </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('reg.index') }}"> All Registrations </a></li>
                        <li><a href="{{ route('reg.create') }}"></a> Add Registration</li>
                    </ul>
                </li>
                
                <li class="nav-small-cap">OTHER SECTIONS</li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span class="hide-menu"> Transactions </span>
                    </a> <!-- <span class="label label-rouded label-success pull-right">25</span> -->
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('transaction.index') }}"> View All Transactions </a></li>
                        <li><a href="{{ route('transaction.create') }}"> Add Transaction </a></li>
                        <li>
                            <a href="#" class="has-arrow"> Price Operations </a>
                            <!-- <span class="label label-rounded label-success">0</span> -->
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('price.index') }}"> View All Prices </a></li>
                                <li><a href="{{ route('price.create') }}"> Add Price Equipement </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-brush"></i>
                        <span class="hide-menu">Company Board</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('board.index') }}"> View Board </a></li>
                        <li><a href="{{ route('board.create') }}"> Add Board Members </a></li>
                    </ul>
                </li>
                <hr>
                <li class="text-center"> 
                    <a class="waves-effect waves-dark" aria-expanded="false" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        <span class="hide-menu"> Logout </span>
                    </a>
                </li>
                <hr>                 
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>