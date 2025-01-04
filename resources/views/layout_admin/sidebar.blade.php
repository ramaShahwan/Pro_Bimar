<nav class="navbar-default navbar-side" role="navigation" id="navv">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                @if(session('user_data'))
    @php
        $userData = session('user_data');
    @endphp
                <li>
                        <div class="user-img-div">
                            <img src="{{URL::asset('img/user/'.$userData->tr_user_personal_img)}}"  class="img-thumbnail" style="transform: translate(30px, 0px);width: 150px;max-height: 150px;border-radius: 50%;border-radius: 50%;" />
                        </div>
                    </li>
                    <li>
                        <a class="active-menu" href="{{ route('home') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa-solid fa-address-card"></i>profile  <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('user/emp_edit_profile',$userData->id)}}" ><i class="fa-solid fa-pen-to-square"></i>edit</a>
                            </li>
                            <li>
                                <a href="{{route('changepass',$userData->id)}}"><i class="fa-solid fa-lock"></i>change password</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                     <li>
                        <a href="#"><i class="fa-solid fa-gear"></i>Settings <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('year') }}"><i class="fa-solid fa-calendar-days"></i>year</a>
                            </li>
                            <li>
                                <a href="{{ route('programs') }}"><i class="fa fa-code "></i>programs</a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}"><i class="fa fa-code "></i>courses</a>
                            </li>
                            <li>
                                <a href="{{ route('training_type') }}"><i class="fa fa-code "></i>training_type</a>
                            </li>
                            <li>
                                <a href="{{ route('course_enrollments') }}"><i class="fa fa-code "></i>course_enrollments</a>
                            </li>
                            <li>
                                <a href="{{ route('role') }}"><i class="fa fa-code "></i>roles</a>
                            </li>
                            <li>
                                <a href="{{ route('gender') }}"><i class="fa fa-code "></i>genders</a>
                            </li>
                            <li>
                                <a href="{{ route('grade') }}"><i class="fa fa-code "></i>academic_degrees</a>
                            </li>
                            <li>
                                <a href="{{ route('status') }}"><i class="fa fa-code "></i>status</a>
                            </li>
                            <li>
                                <a href="{{ route('trainee') }}"><i class="fa fa-code "></i>trainee</a>
                            </li>
                            <li>
                                <a href="{{ route('user') }}"><i class="fa fa-code "></i>emp</a>
                            </li>
                            <li>
                                <a href="{{ route('bank') }}"><i class="fa fa-code "></i>bank</a>
                            </li>
                            <li>
                                <a href="{{ route('currency') }}"><i class="fa fa-code "></i>currency</a>
                            </li>
                            <li>
                                <a href="{{ route('pay_status') }}"><i class="fa fa-code "></i>pay_status</a>
                            </li>
                            <li>
                                <a href="{{ route('profile_status') }}"><i class="fa fa-code "></i>profile_status</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-money-bill "></i>Financial <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('bill/all') }}"><i class="fa-solid fa-file-invoice"></i>bill</a>
                            </li>
                             <li>
                                <a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass"></i>search</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Classes <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('class_status') }}"><i class="fa fa-bicycle "></i>status_class</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check())
    <li>
        <a  href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('user_logout-form').submit();" ><i class="fa fa-sign-in "></i>
            Logout
        </a>
    </li>
    <form id="user_logout-form" action="{{ route('user_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <li><a href="{{ route('login_user') }}" class="gg" style="display:none;">تسجيل دخول</a></li>
@endif
                </ul>
            </div>
        </nav>
