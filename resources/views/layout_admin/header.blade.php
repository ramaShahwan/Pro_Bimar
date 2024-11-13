<style>
    ul{
        list-style: none;
    background: white;

    border-radius: 20px;
    padding-right: 8px;
    }
    .header-right{
        display: flex;
    flex-direction: row-reverse;
    align-items: baseline;
    padding: 0px 50px 0px 50px;
    }
</style>
 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0" id="yuy">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"> BIMAR COMPANY</a>
            </div>

            <div class="header-right">

                <a href="#" class="btn btn-info"  style="    background-color: #f0fbff;
    border-color: #bfeffd;border-radius: 50%;"  title="New Message"><img src="{{asset('assetss/re.png')}}" alt="Fables Template" class="fables-logo" style="    width: 60px;"></a>
                <!-- <a href="#" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>

                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a> -->

                <ul style=" margin-right: 10px;">
                @if(Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check())
    <li>
        <a style="color: #21a391;" href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('user_logout-form').submit();" class="gg">
            تسجيل خروج
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
