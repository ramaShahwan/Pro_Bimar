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
<div class="fables-forth-background-color fables-top-header-signin">
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
                <p class="fables-third-text-color font-13"><span class="fables-iconphone"></span> Phone : (888) 6000 6000</p>
            </div>
            <div class="col-12 col-sm-5 col-lg-3 text-right">
                <p class="fables-third-text-color font-13"><span class="fables-iconemail"></span> Email: Design@domain.com</p>
            </div>

        </div>
    </div>
</div>

<!-- /End Top Header -->

<!-- Start Fables Navigation -->
<div class="fables-navigation fables-main-background-color py-3 py-lg-0">
    <div class="container">
               <div class="row">
                   <div class="col-12 col-md-10 col-lg-9 pr-md-0">
                       <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">

                       <a class="navbar-brand pl-0" href="index.html" style="padding: 0;"><img src="{{asset('assetss/re.png')}}" alt="Fables Template" class="fables-logo" style="    width: 60px;"></a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fables-iconmenu-icon text-white font-16"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="fablesNavDropdown"style="direction: rtl;margin-left: 40px;">

                            <ul class="navbar-nav mx-auto fables-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="{{ route('home') }}" id="sub-nav1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            بيمار
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav1">
                                            <li><a class="dropdown-item" href="home1.html">Home 1</a></li>
                                            <li><a class="dropdown-item" href="home2.html">Home 2</a></li>
                                            <li><a class="dropdown-item" href="home3.html">Home 3</a></li>
                                            <li><a class="dropdown-item" href="home4.html">Home 4</a></li>
                                        </ul> -->
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="#" id="sub-nav2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            منصة التدريب
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
                                        <a class="nav-link " href="{{ route('bim') }}" id="sub-nav3"  aria-haspopup="true" aria-expanded="false">
                                            BIM
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav3">
                                            <li><a class="dropdown-item" href="about1.html">About 1</a></li>
                                            <li><a class="dropdown-item" href="about2.html">About 2</a></li>
                                            <li><a class="dropdown-item" href="about3.html">About 3</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="#" id="sub-nav4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            خدمات واستشارات
                                        </a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav4">
                                            <li><a class="dropdown-item" href="store_grid_list.html">Product Category </a></li>
                                            <li><a class="dropdown-item" href="store_single.html">Product Single</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="#" id="sub-nav5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              مدونة
                                        </a>
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
                                    <li class="nav-item dropdown">
                                        <!-- <a class="nav-link " href="#" id="sub-nav7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Contact Us
                                        </a> -->
                                        <!-- <ul class="dropdown-menu" aria-labelledby="sub-nav7">
                                            <li><a class="dropdown-item" href="contactus1.html">Contact Us 1</a></li>
                                            <li><a class="dropdown-item" href="contactus2.html">Contact Us 2</a></li>
                                            <li><a class="dropdown-item" href="contactus3.html">Contact Us 3</a></li>
                                        </ul> -->

                                    </li>
                                    @if(Auth::guard('trainee')->check())
    <li>
        <a href="{{ route('trainee_logout') }}" onclick="event.preventDefault(); document.getElementById('trainee_logout-form').submit();" class="gg">
            تسجيل خروج
        </a>
    </li>
    <form id="trainee_logout-form" action="{{ route('trainee_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <li><a href="{{ route('login_trainee') }}" class="gg" style="display:none;">تسجيل دخول</a></li>
@endif

                                </ul>

                    </div>
                </nav>
                   </div>
                   <div class="col-12 col-md-2 col-lg-3 pr-md-0 icons-header-mobile">

                    <div class="fables-header-icons">

                         <a href="#" class="open-search fables-third-text-color right  top-header-link px-3 px-md-2 px-lg-4 fables-second-hover-color border-0 max-line-height">
                            <span class="fables-iconsearch-icon"></span>
                        </a>
                         <!-- <a href="signin.html" class="fables-third-text-color fables-second-hover-color font-13 top-header-link px-3 px-md-2 px-lg-4 max-line-height"><span class="fables-iconuser"></span></a> -->



                    </div>
                   </div>
               </div>
    </div>
</div>
