<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
            <ul class="m-t-20 chatonline">
                <li><b>Logged In User</b></li>
                <li>
                    <a href="javascript:void(0)"><img src="{{ asset('files/profile/images/'. Auth::user()->profile_image) }}" alt="user-img" class="img-circle"> <span> {{ Auth::user()->name }} <small class="text-success">online</small></span></a>
                </li>
                <li> {{ Auth::user()->email }} </li>
                <li>
                    {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }}
                </li>
            </ul>
        </div>
    </div>
</div>