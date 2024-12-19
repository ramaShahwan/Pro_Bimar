<nav class="navbar-default navbar-side" role="navigation" id="navv">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                @if(session('user_data'))
    @php
        $userData = session('user_data');
    @endphp
                <li>

                        <div class="user-img-div">
                            <img src="{{URL::asset('img/user/'.$userData->tr_user_personal_img)}}"  class="img-thumbnail" style="transform: translate(60px, 0px);
                            width: 100px;
                            max-height: 100px;
                            border-radius: 50%;" />

                            <!-- <div class="inner-text">
                                Jhon Deo Alex
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div> -->
                        </div>


                    </li>
                    <!-- <li>
                        <a class="" href="{{url('trainer/emp_edit',$userData->id)}}" style="background-color: #6c857b;"><i class="fa fa-dashboard " ></i>profile</a>
                    </li> -->

                    <li>
                        <a class="active-menu" href="{{ route('home') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>

                    <!-- <li>
                        <a href="#"><i class="fa fa-desktop "></i>UI Elements <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Tabs & Panels</a>
                            </li>
                            <li>
                                <a href="notification.html"><i class="fa fa-bell "></i>Notifications</a>
                            </li>
                             <li>
                                <a href="progress.html"><i class="fa fa-circle-o "></i>Progressbars</a>
                            </li>
                             <li>
                                <a href="buttons.html"><i class="fa fa-code "></i>Buttons</a>
                            </li>
                             <li>
                                <a href="icons.html"><i class="fa fa-bug "></i>Icons</a>
                            </li>
                             <li>
                                <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                            </li>
                             <li>
                                <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                            </li>
                             <li>
                                <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                            </li>


                        </ul>
                    </li> -->
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>profile  <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('user/emp_edit_profile',$userData->id)}}" ><i class="fa fa-coffee"></i>edit</a>
                            </li>
                            <li>
                                <a href="{{route('changepass',$userData->id)}}"><i class="fa fa-flash "></i>change password</a>
                            </li>


                        </ul>
                    </li>
                    @endif
                    <!-- <li>
                        <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>

                    </li> -->
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Settings <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">

                             <!-- <li>
                                <a href="{{ route('form') }}"><i class="fa fa-desktop "></i>form </a>
                            </li>
                             <li>
                                <a href="{{ route('table') }}"><i class="fa fa-code "></i>table</a>
                            </li> -->
                            <li>
                                <a href="{{ route('trainer_home') }}"><i class="fa fa-code "></i>year</a>
                            </li>






                        </ul>
                    </li>


                      <!-- <li>
                        <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
                    </li> -->
                     <!-- <li>
                        <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
                    </li> -->
                    <!-- <li>
                        <a href="{{ url('jj') }}"><i class="fa fa-sign-in "></i>Login Page</a>
                    </li> -->
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


                    <!-- <li>
                        <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
                    </li> -->
                </ul>

            </div>

        </nav>
