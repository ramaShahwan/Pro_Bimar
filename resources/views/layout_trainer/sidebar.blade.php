<nav class="navbar-default navbar-side" role="navigation" id="navv"style="    height: 480px;
    overflow: auto;">
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
                        <a href="#"><i class="fa-solid fa-address-card"></i>البروفايل  <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('user/emp_edit_profile',$userData->id)}}" style="background: #b3aeae;font-weight: 400;"><i class="fa-solid fa-pen-to-square"></i>تعديل </a>
                            </li>
                            <li>
                                <a href="{{route('changepass',$userData->id)}}" style="background: #b3aeae;font-weight: 400;"><i class="fa-solid fa-lock"></i> تغيير كلمة السر</a>
                            </li>


                        </ul>
                    </li>
                    @endif
                     <li>
                        <a href="#"><i class="fa-solid fa-gear"></i>اعدادات <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('getmycourse') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">كورساتي</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-circle-question"></i>بنكوك الاسئلة <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('bank_trainer/get_prog_trainer') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">بنك الاسئلة </a>
                            </li>


                        </ul>
                    </li>
                    @if(Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check())
    <li>
        <a  href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('user_logout-form').submit();" ><i class="fa fa-sign-in "></i>
            تسجيل الخروج
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
