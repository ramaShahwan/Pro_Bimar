<nav class="navbar-default navbar-side" role="navigation" id="navv" style="    height: 500px;
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
                                <a href="{{url('user/emp_edit_profile',$userData->id)}}" style="background: #b3aeae;font-weight: 400;"><i class="fa-solid fa-pen-to-square"></i>تعديل البروفيل</a>
                            </li>
                            <li>
                                <a href="{{route('changepass',$userData->id)}}" style="background: #b3aeae;font-weight: 400;"><i class="fa-solid fa-lock"></i>تغيير كلمة السر</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                     <li>
                        <a href="#"><i class="fa-solid fa-gear"></i>الاعدادات <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('year') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">السنوات التدريبية</a>
                            </li>
                            <li>
                                <a href="{{ route('programs') }}" style="background: #b3aeae;font-weight: 400; text-align: center;     border-bottom: 1px solid #9a999b;">البرامج التدريبية</a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" style="background: #b3aeae;font-weight: 400; text-align: center;     border-bottom: 1px solid #9a999b;">الكورسات التدريبية</a>
                            </li>
                            <li>
                                <a href="{{ route('training_type') }}" style="background: #b3aeae;font-weight: 400; text-align: center;     border-bottom: 1px solid #9a999b;">أنواع التدريب</a>
                            </li>
                            <li>
                                <a href="{{ route('course_enrollments') }}" style="background: #b3aeae;font-weight: 400; text-align: center;     border-bottom: 1px solid #9a999b;">التسجيل على الكورس</a>
                            </li>
                            <li>
                                <a href="{{ route('role') }}" style="background: #b3aeae;font-weight: 400; text-align: center;     border-bottom: 1px solid #9a999b;">الأدوار</a>
                            </li>
                            <li>
                                <a href="{{ route('gender') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">الجنس</a>
                            </li>
                            <li>
                                <a href="{{ route('grade') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">الدرجة العلمية</a>
                            </li>
                            <li>
                                <a href="{{ route('status') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">حالات المستخدم</a>
                            </li>
                            <li>
                                <a href="{{ route('trainee') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">المتدربين</a>
                            </li>
                            <li>
                                <a href="{{ route('user') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">الموظفين</a>
                            </li>
                            <li>
                                <a href="{{ route('bank') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">البنوك</a>
                            </li>
                            <li>
                                <a href="{{ route('currency') }}" style="background: #b3aeae;font-weight: 400;text-align: center;    border-bottom: 1px solid #9a999b;">العملات</a>
                            </li>
                            <li>
                                <a href="{{ route('pay_status') }}" style="background: #b3aeae;font-weight: 400;text-align: center;    border-bottom: 1px solid #9a999b;">حالات الدفع</a>
                            </li>
                            <li>
                                <a href="{{ route('profile_status') }}" style="background: #b3aeae;font-weight: 400;text-align: center;    border-bottom: 1px solid #9a999b;">حالات الملف التدريبي</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-money-bill "></i>المالية <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('bill/all') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">الفواتير</a>
                            </li>
                             <li>
                                <a href="{{ route('search') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">البحث</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-circle-question"></i>بنك الاسئلة <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('bank_ques/get_programs') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">بنك الاسئلة</a>
                            </li>
                            <li>
                                <a href="{{ url('ques_type/index') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">حالات الاسئلة</a>
                            </li>
                            <li>
                                <a href="{{ url('assessment_type/index') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">أنواع الامتحان</a>
                            </li>
                            <li>
                                <a href="{{ url('assessment_status/index') }}" style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">حالات الامتحان</a>
                            </li>




                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>الصفوف <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('class_status') }}"style="background: #b3aeae;font-weight: 400; text-align: center;    border-bottom: 1px solid #9a999b;">حالات الصف</a>
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
