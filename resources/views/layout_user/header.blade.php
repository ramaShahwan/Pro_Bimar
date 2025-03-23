<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
      .bbtn{
        border: none;
    padding: 10px;
    background-color: rgb(33 164 146);
    color: white;
    border-radius: 20px;
    }
    .bttn:hover{
        background-color: rgb(33 164 146);
        color: white;
        font-size: 17px;
        font-weight: 600;
    }
        .popup .overlay{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vw;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1500;
            display: none;
        }
        .popup .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);
            background: #fff;
            width: 660px ;
            height: 350px;
            z-index: 2000;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }
        .popup.active .overlay{
            display: block;
        }
        .popup.active .content{
            transition: all 300ms ease-in-out;
            transform: translate(-50%,-50%) scale(1);

        }
        .fables-nav .nav-link:hover {
    color: rgb(33 164 146)!important;
}
.btco-hover-menu .active a, .btco-hover-menu .active a:focus, .btco-hover-menu .active a:hover, .btco-hover-menu li a:hover, .btco-hover-menu li a:focus, .navbar>.show>a, .navbar>.show>a:focus, .navbar>.show>a:hover {
    color:  #76c8be !important;
    background: transparent;
    outline: 0;}
    .btco-hover-menu .collapse ul > li:hover > a {
    background: transparent;
    color: #76c8be !important;
}
.navv{
    margin-left: 0px;
    margin-right: -50px;

}
.yyy{
    width: 660px ;
    height: 320px;
}
@media screen and (max-width: 398px ){
    /* .navbar-nav .dropdown-menu {
        float: left;
    } */
    .navv{
    margin-left: 0px;
    margin-right: 0px;
    text-align: right;

}
.nnna{
    text-align: right;
    margin-right: 30px !important;
}
.yyy{
            width: 350px;
        }
        .popup .overlay{
            height: 150vw;
        }
        .popup .content{
            width: 350px;
        }
}
.input-groupp {
    position: relative;
    /* display: flex; */
    align-items: center;
}
/* .input-groupp input {
    padding-right: 40px;
} */
.toggle-password {
    position: absolute;
    left: 10px;
    top: 22px;
    cursor: pointer;
    color: #666;
}

.toggle-password:hover {
    color: #000;
}
.input-groupp-icon .input-icon:before{
    display: none;
}
/* .input-groupp-icon .input-icon{
    top: 16px;
} */
.form-control{
            height: 3.4em;
            background-color: #f9f9f9;
            border: 2px solid #e5e5e5 ;
        }
    </style>
<div class="search-section">
    <a class="close-search" href="#"></a>
    <div class="d-flex justify-content-center align-items-center h-100">
        <form method="post" action="#" class="w-50">
            <div class="row">
                <div class="col-10">
                    <input type="search" value="" class="form-control palce bg-transparent border-0 search-input" placeholder="Search Here ..." />
                </div>
                <div class="col-2 mt-3">
                     <button type="submit" class="btn bg-transparent text-white"> <i class="fas fa-search"></i> </button>
                </div>
            </div>
        </form>
    </div>

</div>

<!-- Loading Screen -->
<div id="ju-loading-screen">
  <div class="sk-double-bounce">
    <div class="sk-child sk-double-bounce1"></div>
    <div class="sk-child sk-double-bounce2"></div>
  </div>
</div>


<!-- Start Top Header -->
<div class="fables-forth-background-color fables-top-header-signin" id="nna">
    <div class="container">
        <div class="row" id="top-row">
            <div class="col-12 col-sm-2 col-lg-5">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle border-0 bg-transparent font-13 lang-dropdown-btn pl-0" type="button" id="dropdownLangButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   language
                  </button>
                  <div class="dropdown-menu p-0 fables-forth-background-color rounded-0 m-0 border-0 lang-dropdown" aria-labelledby="dropdownLangButton">
                        <a class="dropdown-item white-color font-13 fables-second-hover-color" href="#">
                        <img src="{{asset('assetss/custom/images/england.png')}}" alt="england flag" class="mr-1"> English</a>
                        <a class="dropdown-item white-color font-13 fables-second-hover-color" href="#">
                        <img src="{{asset('assetss/custom/images/France.png')}}" alt="england flag" class="mr-1"> عربي</a>
                  </div>
                </div>

            </div>
            <div class="col-12 col-sm-5 col-lg-4 text-right">
                <p class="fables-third-text-color font-13"><span class="fables-iconphone"></span> Phone : (011) 611 2040</p>
            </div>
            <div class="col-12 col-sm-5 col-lg-3 text-right">
                <p class="fables-third-text-color font-13"><span class="fables-iconemail"></span> Email: bimar@proengtrain.com</p>
            </div>

        </div>
    </div>
</div>

<!-- /End Top Header -->

<!-- Start Fables Navigation -->
<div class="fables-navigation fables-main-background-color py-3 py-lg-0" id="nn" style="position: sticky;
    right: 0;
    left: 0;
    top: 0;
    z-index: 1000;">
    <div class="container">
               <div class="row">
                   <div class="col-12 col-md-10 col-lg-9 pr-md-0">
                       <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">

                       <a class="navbar-brand pl-0" href="" style="padding: 0;"><img src="{{asset('assetss/re.png')}}" alt="Fables Template" class="fables-logo" style="    width: 60px;"></a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fables-iconmenu-icon text-white font-16"></span>
                            </button>
                            <div class="collapse navbar-collapse navv" id="fablesNavDropdown"style="direction: rtl;
">

                            <ul class="navbar-nav mx-auto fables-nav">
                                    <li class="nav-item dropdown">
                                    <a class="nav-link " href="{{ route('all_programs') }}" >
                                    البرامج التدريبية
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav1">
                                            <li><a class="dropdown-item" href="home1.html">Home 1</a></li>
                                            <li><a class="dropdown-item" href="home2.html">Home 2</a></li>
                                            <li><a class="dropdown-item" href="home3.html">Home 3</a></li>
                                            <li><a class="dropdown-item" href="home4.html">Home 4</a></li>
                                        </ul> -->
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="{{ route('get_bills') }}" >
                                        ايصالاتي
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav2">

                                            <li><a class="dropdown-item dropdown-toggle" href="#">Headers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Header 1</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="header1-transparent.html">Header 1 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="header1-light.html">Header 1 Light</a></li>
                                                            <li><a class="dropdown-item" href="header1-dark.html">Header 1 Dark</a></li><li><a class="dropdown-item" href="header-megamenu.html">Header Mega menu</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Header 2</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="header2-transparent.html">Header 2 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="header2-light.html">Header 2 Light</a></li>
                                                            <li><a class="dropdown-item" href="header2-dark.html">Header 2 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Header 3</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="header3-transparent.html">Header 3 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="header3-light.html">Header 3 Light</a></li>
                                                            <li><a class="dropdown-item" href="header3-dark.html">Header 3 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Header 4</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="header4-transparent.html">Header 4 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="header4-light.html">Header 4 Light</a></li>
                                                            <li><a class="dropdown-item" href="header4-dark.html">Header 4 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Header 5</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="header5-transparent.html">Header 5 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="header5-light.html">Header 5 Light</a></li>
                                                            <li><a class="dropdown-item" href="header5-dark.html">Header 5 Dark</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><a class="dropdown-item dropdown-toggle" href="#">Footers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Footer 1</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="footer1-bg-img.html">Footer 1 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="Footer1-light.html">Footer 1 Light</a></li>
                                                            <li><a class="dropdown-item" href="Footer1-dark.html">Footer 1 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Footer 2</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="footer2-bg-img.html">Footer 2 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="footer2-light.html">Footer 2 Light</a></li>
                                                            <li><a class="dropdown-item" href="footer2-dark.html">Footer 2 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Footer 3</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="footer3-bg-img.html">Footer 3 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="footer3-light.html">Footer 3 Light</a></li>
                                                            <li><a class="dropdown-item" href="footer3-dark.html">Footer 3 Dark</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item dropdown-toggle" href="#">Footer 4</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="footer4-bg-img.html">Footer 4 Transparent</a></li>
                                                            <li><a class="dropdown-item" href="footer4-light.html">Footer 4 Light</a></li>
                                                            <li><a class="dropdown-item" href="footer4-dark.html">Footer 4 Dark</a></li>
                                                        </ul>
                                                    </li>


                                                </ul>
                                            </li>
                                            <li><a class="dropdown-item" href="team.html">Team Members</a></li>
                                            <li><a class="dropdown-item" href="pricing-table.html">Pricing Table</a></li>
                                            <li><a class="dropdown-item" href="testimonials.html">testimonials</a></li>
                                            <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                            <li><a class="dropdown-item" href="counters.html">Counters</a></li>
                                            <li><a class="dropdown-item" href="image-hover-effects.html">Image Hover Effects</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="{{ url('profile/get_courses_for_trainee') }}" >
                                        دوراتي التدريبية
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav3">
                                            <li><a class="dropdown-item" href="about1.html">About 1</a></li>
                                            <li><a class="dropdown-item" href="about2.html">About 2</a></li>
                                            <li><a class="dropdown-item" href="about3.html">About 3</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="{{ url('trainee/show_assessment') }}" >
                                        امتحاناتي
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav4">
                                            <li><a class="dropdown-item" href="store_grid_list.html">Product Category </a></li>
                                            <li><a class="dropdown-item" href="store_single.html">Product Single</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <!-- <a class="nav-link " href="#" id="sub-nav5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              مدونة
                                        </a> -->
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav5">
                                            <li><a class="dropdown-item" href="blog-cat1.html">Blog Cat 1</a></li>
                                            <li><a class="dropdown-item" href="blog-cat2.html">Blog Cat 2</a></li>
                                            <li><a class="dropdown-item" href="blog-cat3.html">Blog Cat 3</a></li>
                                            <li><a class="dropdown-item" href="blog-cat-masonry.html">Blog Cat Masonry</a></li>
                                            <li><a class="dropdown-item" href="blog-details1.html">Blog Details 1</a></li>
                                            <li><a class="dropdown-item" href="blog-details2.html">Blog Details 2</a></li>
                                            <li><a class="dropdown-item" href="blog-details3.html">Blog Details 3</a></li>
                                            <li><a class="dropdown-item" href="blog-single-img.html">Blog Single image</a></li>
                                            <li><a class="dropdown-item" href="blog-single-slider.html">Blog Single Slider</a></li>
                                            <li><a class="dropdown-item" href="blog-single-video.html">Blog Single Video</a></li>
                                            <li><a class="dropdown-item" href="blog-timeLine.html">Blog Timeline</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <!-- <a class="nav-link " href="#" id="sub-nav6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pages
                                        </a> -->
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav6">
                                            <li><a class="dropdown-item" href="404.html">404</a></li>
                                            <li><a class="dropdown-item" href="comming-soon.html">Comming Soon</a></li>
                                            <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                                            <li><a class="dropdown-item" href="gallery-filter.html">Gallery Filter</a></li>
                                            <li><a class="dropdown-item" href="gallery-filter-masonry.html">Gallery Filter Masonry</a></li>
                                            <li><a class="dropdown-item" href="gallery-history.html">Gallery History</a></li>
                                            <li><a class="dropdown-item" href="gallery-history2.html">Gallery History 2</a></li>
                                            <li><a class="dropdown-item" href="gallery-single.html">Gallery Single</a></li>
                                            <li><a class="dropdown-item" href="gallery-timeline.html">Gallery Timeline </a></li>
                                            <li><a class="dropdown-item" href="gallery-timeline2.html">Gallery Timeline 2</a></li>
                                        </ul> -->

                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link " href="#" id="sub-nav7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             معلوماتي
                                        </a>
                                        <ul class="dropdown-menu nnna" aria-labelledby="sub-nav7">
                                            <li><a class="dropdown-item" href="{{ route('get_bills') }}">ايصالاتي</a></li>
                                            <li><a class="dropdown-item" href="{{ url('profile/get_courses_for_trainee') }}">كورساتي</a></li>
                                            <li><a class="dropdown-item" href="{{ url('trainee/show_assessment') }}">امتحاناتي</a></li>

                                        </ul>

                                    </li> -->
                                    @if(Auth::guard('trainee')->check())
    <li class="nav-item dropdown">
        <a class="nav-link " href="{{ route('trainee_logout') }}" onclick="event.preventDefault(); document.getElementById('trainee_logout-form').submit();" class="gg">
            تسجيل خروج
        </a>
    </li>
    <form id="trainee_logout-form" action="{{ route('trainee_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <li><a href="{{ route('login_trainee') }}" class="gg">تسجيل دخول</a></li>
@endif

                                </ul>

                    </div>
                </nav>
                   </div>
                   @if(session('user_data'))
    @php
        $userData = session('user_data');

    @endphp
    <div class="col-12 col-md-2 col-lg-3 pr-md-0 icons-header-mobile">

                    <div class="fables-header-icons">
                    <div class="dropdown">
                                  <a href="#_" class="fables-third-text-color dropdown-toggle right px-3 px-md-2 px-lg-4 fables-second-hover-color top-header-link max-line-height position-relative" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <!-- <span class="fables-iconcart-icon font-20"></span>
                                       <span class="fables-cart-number fables-second-background-color text-center">3</span> -->
                                       <img src="{{URL::asset('img/trainee/'.$userData->trainee_personal_img)}}" alt="Fables Template" class="fables-logo" style="    width: 60px;">
                                    </a>

                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="        background: rgb(240 249 248);
    position: absolute;
    transform: translate3d(-152px, 75px, 0px);
    top: 0px;
    left: 0px;
    box-shadow: inset -1px 1px 13px 0px rgb(97 184 174);
    border: 1px solid #22a492;
    border-radius: 15px 70px;">
                                     <div class="p-3 cart-block">
                                             <p class="fables-second-text-color semi-font mb-4 font-17" style="text-align: center;">بروفايل المتدرب</p>
                                             <div class="row mx-0 mb-3" style="    justify-content: flex-end;">
                                                 <!-- <div class="col-4 p-0">
                                                     <a href="#"><img src="assetss/custom/images/sml1.jpg" alt="" class="w-100"></a>
                                                 </div> -->
                                                 <div class="fables-main-text-color font-13  fables-main-hover-color" style="margin: 10px 0;     text-shadow: 0px 1px 2px #1b9587;display: flex;flex-direction: row-reverse;"><span style="direction: rtl;">الاسم  بالعربي: </span><span style="    margin-right: 5px;">{{$userData->trainee_fname_ar}}  {{$userData->trainee_lname_ar}}</span></div>

                                                     <!-- <div class="fables-main-text-color font-13 d-block fables-main-hover-color" style="margin: 10px 0;     text-shadow: 0px 1px 2px #1b9587">الاسم  بالعربي:{{$userData->trainee_fname_ar}} <span style="    margin-right: 5px;">{{$userData->trainee_lname_ar}}</span></div> -->
                                                     <div class="fables-main-text-color font-13  fables-main-hover-color" style="margin: 10px 0;     text-shadow: 0px 1px 2px #1b9587;display: flex;flex-direction: row-reverse;"><span style="direction: rtl;">الاسم  بالانكليزي: </span><span style="    margin-right: 5px;">{{$userData->trainee_fname_en}}   {{$userData->trainee_lname_en}}</span></div>

                                                     <!-- <div class="fables-main-text-color font-13 d-block fables-main-hover-color" style="margin: 10px 0;direction: rtl;    text-shadow: 0px 1px 2px #1b9587">الاسم  بالانكليزي:{{$userData->trainee_fname_en}}  <span style="    margin-left: 5px;">{{$userData->trainee_lname_en}}</span> </div> -->

                                                     <div class="fables-main-text-color font-13  fables-main-hover-color" style="margin: 10px 0;     text-shadow: 0px 1px 2px #1b9587;display: flex;flex-direction: row-reverse;"><span style="direction: rtl;"> البريد الالكتروني: </span><span style="    margin-right: 5px;">{{$userData->trainee_email}}</span></div>

                                                     <!-- <div class="fables-main-text-color font-13 d-block fables-main-hover-color"style="direction: rtl; margin: 10px 0;    text-shadow: 0px 1px 2px #1b9587"> البريد الالكتروني:{{$userData->trainee_email}}</div> -->


                                                     <div class="fables-main-text-color font-13  fables-main-hover-color" style="margin: 10px 0;     text-shadow: 0px 1px 2px #1b9587;display: flex;flex-direction: row-reverse;"><span style="direction: rtl;">العنوان  : </span><span style="    margin-right: 5px;">{{$userData->trainee_address}}</span></div>

                                                     <!-- <div class="fables-main-text-color font-13" style="margin: 10px 0px; margin-left:80px;    text-shadow: 0px 1px 2px #1b9587">العنوان:{{$userData->trainee_address}}</div> -->


                                                     <div class="fables-main-text-color font-13 d-block fables-main-hover-color" style="margin: 10px 0;    text-shadow: 0px 1px 2px #1b9587">تاريخ التسجيل على المنصة:{{$userData->created_at->format('Y-m-d')}}</div>

                                                     <p class="fables-second-text-color font-weight-bold" style="margin: 10px 0;    text-shadow: 0px 1px 2px #1b9587">رقم الهاتف:{{$userData->trainee_mobile}}</p>
                                                     <!-- <p class="fables-forth-text-color">QTY : 1</p> -->

                                             </div>
                                             <!-- <div class="row mx-0 mb-3">
                                                 <div class="col-4 p-0">
                                                     <a href="#"><img src="assetss/custom/images/sml1.jpg" alt="" class="w-100"></a>
                                                 </div>
                                                 <div class="col-8">
                                                     <h2><a href="#" class="fables-main-text-color font-13 d-block fables-main-hover-color">LUIS LEATHER DRIVING</a></h2>
                                                     <p class="fables-second-text-color font-weight-bold">$ 100.00</p>
                                                     <p class="fables-forth-text-color">QTY : 1</p>
                                                 </div>
                                             </div> -->
                                             <!-- <span class="font-16 semi-font fables-main-text-color">TOTAL</span>
                                             <span class="font-14 semi-font fables-second-text-color float-right">$200.00</span> -->
                                             <hr>
                                             <div class="text-center">
                                                 <!-- <a href="#" class="fables-second-background-color fables-btn-rounded  text-center white-color py-2 px-3 font-14 bg-hover-transparent border fables-second-border-color fables-second-hover-color">View my cart</a> -->
                                                <a href="{{url('trainee_profile/edit_profile',$userData->id)}}" class="fables-second-text-color border fables-second-border-color fables-btn-rounded text-center white-color p-2 px-4 font-14 fables-second-hover-background-color" target="_blank">تعديل البروفايل</a>
                                                <button onclick="togglePopuo()"class="fables-second-text-color border fables-second-border-color fables-btn-rounded text-center white-color p-2 px-4 font-14 fables-second-hover-background-color" style="margin-top: 10px;">تغيير كلمة السر </button>
                                             </div>
                                        </div>
                                  </div>
                         </div>
                         <!-- <a href="#" class="open-search fables-third-text-color right  top-header-link px-3 px-md-2 px-lg-4 fables-second-hover-color border-0 max-line-height">
                            <span class="fables-iconsearch-icon"></span>
                        </a> -->
                         <!-- <a href="signin.html" class="fables-third-text-color fables-second-hover-color font-13 top-header-link px-3 px-md-2 px-lg-4 max-line-height"><span class="fables-iconuser"></span></a> -->



                    </div>
                   </div>
@endif


               </div>

    </div>
</div>
<div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content yyy" style="">
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form id="myForm" action="{{ url('trainee_profile/changePass', $userData->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="roww">
        <h4>تغيير كلمة السر</h4>
        <h6 style="margin-top:10px;">ملاحظة: بعد عملية تعديل كلمة السر يجب إعادة تسجيل الدخول</h6>

        <!-- كلمة المرور الجديدة -->
        <div class="input-groupp input-groupp-icon" style="margin-top: 10px;">
            <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
            <input type="password" placeholder=" كلمة السر و يجب ان تحتوي على احرف كبيرة وصغيرة وارقام و محارف " name="trainee_pass" id="trainee_pass" class="@error('trainee_pass') is-invalid @enderror" style="    font-family: sans-serif !important;"/>
            <!-- @error('trainee_pass')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
            <div class="toggle-password" onclick="togglePassword('trainee_pass', this)">
        <i class="fa-solid fa-eye"></i>
    </div>
            <span class="invalid-feedback" style="display: block;font-family: sans-serif;"></span>
        </div>

        <!-- تأكيد كلمة المرور -->
        <div class="input-groupp input-groupp-icon">
        <input type="password" placeholder=" تأكيد كلمة السر " name="trainee_pass_confirmation" id="trainee_pass_confirmation" class="@error('trainee_pass_confirmation') is-invalid @enderror" style="    font-family: sans-serif !important;"/>
        <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
            <!-- @error('trainee_pass_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
            <div class="toggle-password" onclick="togglePassword('trainee_pass_confirmation', this)">
        <i class="fa-solid fa-eye"></i>
    </div>
            <span class="invalid-feedback" style="display: block;font-family: sans-serif;"></span>
        </div>
    </div>

    <div class="roww">
        <input type="submit" value="حفظ" class="bttn" style="border: 1px solid #23a693;">
    </div>
</form>

                  <!-- </div> -->

            </div>
        </div>
        <script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     @if ($errors->any())
    //     togglePopuo();
    //     @endif
    // });

    function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
</script>
<script>
 document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault(); // منع إعادة تحميل الصفحة

    var formData = new FormData(this); // جمع البيانات من النموذج
    let url = "{{ url('trainee_profile/changePass', $userData->id) }}"; // URL الخاص بالـ POST

    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        // إزالة الأخطاء السابقة من الحقول
        document.querySelectorAll('.invalid-feedback').forEach(error => {
            error.innerHTML = ''; // تفريغ الأخطاء السابقة
        });

        if (data.errors) {
            // عرض الأخطاء الجديدة تحت الحقول
            Object.keys(data.errors).forEach(key => {
                let input = document.querySelector(`[name="${key}"]`);
                if (input) {
                    // نبحث عن العنصر الذي يحتوي على class invalid-feedback
                    let errorSpan = input.parentElement.querySelector('.invalid-feedback');
                    if (errorSpan) {
                        errorSpan.innerHTML = `<strong style="color:red;">${data.errors[key][0]}</strong>`; // عرض الخطأ
                    }
                }
            });
        } else {
            // عرض الرسالة بنجاح داخل الـ #page-wrapper
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('alert', 'alert-info');
            messageDiv.setAttribute('role', 'alert');
            messageDiv.style.textAlign = 'end';
            messageDiv.style.fontSize = '20px';
            messageDiv.innerHTML = data.message; // عرض رسالة النجاح

            // إضافة الرسالة إلى #page-wrapper
            let pageWrapper = document.getElementById('gg');
            if (pageWrapper) {
                pageWrapper.prepend(messageDiv); // إضافة الرسالة في بداية #page-wrapper
            }

            // إعادة تعيين النموذج
            document.getElementById("myForm").reset();
            togglePopuo();
            // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
            setTimeout(() => {
    window.location.href = "{{ route('login_trainee') }}"; // الانتقال إلى واجهة تسجيل الدخول
}, 2000); // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>
<script>
function togglePassword(inputId, iconElement) {
    var inputField = document.getElementById(inputId);
    var icon = iconElement.querySelector("i");

    if (inputField.type === "password") {
        inputField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        inputField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>

