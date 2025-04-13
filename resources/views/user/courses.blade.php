@extends('layout_user.mester')
@section('content')
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
            z-index: 4000;
            display: none;
        }
        .popup .content{

            max-width: 38em;
    /* padding: 1em 3em 2em 3em; */
    /* margin: 0em auto; */
    background-color: #fff;
    /* border-radius: 4.2px; */
    /* box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2); */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    background: #fff;
    width: 450px;
    height: 480px;
    padding: 0;
    overflow: auto;
    z-index: 5000;
    text-align: center;
    /* padding: 20px; */
    box-sizing: border-box;
        /* border-right: 3px solid #23a794; */
    /* border-left: 2px solid #23a794; */
    /* border-bottom: 1px solid #23a794; */
    box-shadow: inset 0px 1px 19px 1px #23a794;
        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 10px;
            width: 30px;
            height: 30px;
            color: white;
            background: none;
            font-size: 35px;
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
h3{
    text-align: end;
    font-size: 15px;
    color: #1e9e8e;
    margin-bottom: 10px;

}
.fables-hover-btn-color:hover, .fables-hover-btn-color:hover span {
    color: #f5fff5 !important;
}
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
.mm{
            margin-left: 60px;
        }
@media screen and (max-width: 398px ){
    .popup .content{
            width: 350px;
        }
        .popup .overlay{
            height: 150vw;
        }
        .mm{
            margin-left: 90px;
        }
}
.yuy:hover{
    background: #1b9789;
}
    </style>
<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">الدورات التدريبية   </h1>
                  <!-- <p class="fables-forth-text-color font-22 mb-3">
                      We are a full service digital product agency
                  </p> -->
                  <!-- <a href="contactus1.html" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-4 py-2 white-color-hover">Contact us</a> -->
              </div>
             </div>
         </div>
    </div>
</div>
<!-- <div class="fables-header fables-after-overlay overlay-lighter bg-rules" style="background-image: url(assetss/custom/images/header.jpg);">
    <div class="container overflow-hidden">
        <div class="owl-carousel owl-theme default-carousel fables-sqr-nav dots-0 wow fadeInUpBig" data-wow-duration="2s">
              <div>
                  <h1 class="white-color bold-font mt-lg-5 mb-4">CONSULTING SERVICE FOR ALL <br>
                     <span class="fables-second-text-color">KIND OF BUSINESSES</span>
                  </h1>
                  <p class="fables-third-text-color mt-3 mb-5 light-font fables-header-slider-details">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  </p>
                  <a href="#" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-md-4 py-2 btn-bg-hover white-color-hover">Our Services</a>
                  <a href="#" class="btn fables-second-border-color white-color rounded-0 px-md-4 py-2 fables-second-hover-background-color">Learn More</a>
              </div>
              <div>
                  <h1 class="white-color bold-font mt-lg-5 mb-4">CONSULTING SERVICE FOR ALL <br>
                     <span class="fables-second-text-color">KIND OF BUSINESSES</span>
                  </h1>
                  <p class="fables-third-text-color mt-3 mb-5 light-font fables-header-slider-details">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  </p>
                  <a href="#" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-md-4 py-2 btn-bg-hover  white-color-hover">Our Services</a>
                  <a href="#" class="btn fables-second-border-color white-color rounded-0 px-md-4 py-2 fables-second-hover-background-color">Learn More</a>
              </div>
        </div>
    </div>
</div> -->

<div class="container-fluid my-4 my-md-5">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
          <div class="row">
              <div class="col-12 col-lg-2 p-0">
                   <div class="text-center fables-main-background-color fables-sqr-rotation fables-second-border-color">
                      <div class="text-rotate">
                           <h2 class="text-white font-24">برنامج <br><span class="white-color font-30 bold-font mt-2 d-block">{{$program->tr_program_name_ar}}</span></h2>
                           <p class="fables-third-text-color mt-4 mb-3 mb-lg-5" style="text-align: end;">
                           {{$program->tr_program_desc}}
                           </p>
                      </div>
                   </div>
              </div>
              <div class="col-12 col-lg-10 p-0">
                  <div class="fables-index-products fables-after-overlay py-3 py-lg-5 pr-md-4 pl-md-5 bg-rules sm-index-products">
                       <div class="container z-index position-relative">
                           <div class="row">
                               <div class="col-12 col-lg-10 offset-lg-2" style="    display: flex;">
                               @if($data->count() > 2)
    <!-- Carousel Setup for Multiple Courses (more than 2) -->
    <div class="owl-carousel owl-theme dots-0 carousel-items-3 circle-nav mt-lg-4 mb-lg-5" id="blog-slider">
        @foreach($data as $call)
            <div class="card rounded-0 border-light wow fadeIn mb-4 mb-lg-0" data-wow-delay=".4s">
            <div class="row">
                                               <div class="fables-product-img col-12">
                                                  <img class="card-img-top rounded-0 w-100" src="{{URL::asset('/img/course/'.$call->bimar_training_course->tr_course_img)}}" alt="dress fashion" style="height: 163px;">
                                                  <!-- <div class="fables-img-overlay">
                                                      <ul class="nav fables-product-btns">
                                                          <li><a href="#" class="fables-third-text-color fables-second-hover-color work-icon mx-3"><span class="fables-iconlink "></span></a></li>
                                                          <li><a href="" class="fables-product-btn"><span class="fables-iconlink "></span></a></li>
                                                          <li><button class="fables-product-btn"><span class="fables-iconheart"></span></button></li>
                                                      </ul>
                                                  </div> -->
                                              </div>
                                              <div class="card-body col-12">
                                                <h5 class="card-title mx-3" style="text-align: center;">
                                                    <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">{{$call->bimar_training_course->tr_course_name_ar}}</a>
                                                </h5>
                                                <p class="card-text fables-fifth-text-color fables-store-product-details mx-3 store-card-text" style="text-align: center;">{{$call->bimar_training_course->tr_course_desc}}</p>
                                                <p class="fables-product-price fables-second-text-color my-2 mx-3 semi-font" style="text-align: center;">{{$call->tr_course_enrol_price}}  SYP</p>
                                                <form action="{{url('user_trainee/Register_for_course',$call->id)}}" method="post">
                                                @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <!-- <input type="text" name="tr_course_enrol_price" value="{{$call-> tr_course_enrol_price}}" style="display:none;"> -->
                                                <input type="submit"class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15 yuy" value="التسجيل على الكورس">
                                                </form>

                                              <div style="display: flex
;
    justify-content: center;
    flex-direction: column;
    align-items: center;">

                                                <button onclick="showEditPopupo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض تفاصيل المدرب  </span></a></p></button>
                                                <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض التفاصيل  </span></a></p></button>
                                                <button onclick="showEditPopupoo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض  الاوقات  </span></a></p></button>

                                            </div>
                                              </div>
                                           </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function(){
            $("#blog-slider").owlCarousel({
                loop: true,  // تفعيل التكرار
                margin: 20,
                nav: false,
                navText: ['<span class="fables-iconarrow-left"></span>', '<span class="fables-iconarrow-next"></span>'],
                autoplay: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
@elseif($data->count() == 2)
    <!-- Carousel Setup for Exactly Two Courses without Looping -->
    @foreach($data as $call)
        <div class="card rounded-0 border-light wow fadeIn mb-4 mb-lg-0" style="width: 100%; max-width: 400px; margin: auto;">
        <div class="row">
                                               <div class="fables-product-img col-12">
                                                  <img class="card-img-top rounded-0 w-100" src="{{URL::asset('/img/course/'.$call->bimar_training_course->tr_course_img)}}" alt="dress fashion" style="height: 163px;">
                                                  <!-- <div class="fables-img-overlay">
                                                      <ul class="nav fables-product-btns">
                                                          <li><a href="#" class="fables-third-text-color fables-second-hover-color work-icon mx-3"><span class="fables-iconlink "></span></a></li>
                                                          <li><a href="" class="fables-product-btn"><span class="fables-iconlink "></span></a></li>
                                                          <li><button class="fables-product-btn"><span class="fables-iconheart"></span></button></li>
                                                      </ul>
                                                  </div> -->
                                              </div>
                                              <div class="card-body col-12">
                                                <h5 class="card-title mx-3" style="text-align: center;">
                                                    <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">{{$call->bimar_training_course->tr_course_name_ar}}</a>
                                                </h5>
                                                <p class="card-text fables-fifth-text-color fables-store-product-details mx-3 store-card-text" style="text-align: center;">{{$call->bimar_training_course->tr_course_desc}}</p>
                                                <p class="fables-product-price fables-second-text-color my-2 mx-3 semi-font" style="text-align: center;">{{$call->tr_course_enrol_price}}  SYP</p>
                                                <form action="{{url('user_trainee/Register_for_course',$call->id)}}" method="post">
                                                @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15 yuy" value="التسجيل على الكورس">
                                                </form>

                                                <div style="display: flex
;
    justify-content: center;
    flex-direction: column;
    align-items: center;">

                                                <button onclick="showEditPopupo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض تفاصيل المدرب  </span></a></p></button>
                                                <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض التفاصيل  </span></a></p></button>
                                                <button onclick="showEditPopupoo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض  الاوقات  </span></a></p></button>
                                            </div>

                                              </div>
                                           </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function(){
            $("#blog-slider").owlCarousel({
                loop: false,  // تعطيل التكرار
                margin: 20,
                nav: false,
                navText: ['<span class="fables-iconarrow-left"></span>', '<span class="fables-iconarrow-next"></span>'],
                autoplay: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                }
            });
        });
    </script>
@else
    <!-- Display Single Course without Carousel -->
    @foreach($data as $call)
        <div class="card rounded-0 border-light wow fadeIn mb-4 mb-lg-0" style="width: 100%; max-width: 400px; margin: auto;">
        <div class="row">
                                               <div class="fables-product-img col-12">
                                                  <img class="card-img-top rounded-0 w-100" src="{{URL::asset('/img/course/'.$call->bimar_training_course->tr_course_img)}}" alt="dress fashion" style="height: 163px;">
                                                  <!-- <div class="fables-img-overlay">
                                                      <ul class="nav fables-product-btns">
                                                          <li><a href="#" class="fables-third-text-color fables-second-hover-color work-icon mx-3"><span class="fables-iconlink "></span></a></li>
                                                          <li><a href="" class="fables-product-btn"><span class="fables-iconlink "></span></a></li>
                                                          <li><button class="fables-product-btn"><span class="fables-iconheart"></span></button></li>
                                                      </ul>
                                                  </div> -->
                                              </div>
                                              <div class="card-body col-12">
                                                <h5 class="card-title mx-3" style="text-align: center;">
                                                    <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">{{$call->bimar_training_course->tr_course_name_ar}}</a>
                                                </h5>
                                                <p class="card-text fables-fifth-text-color fables-store-product-details mx-3 store-card-text" style="text-align: center;">{{$call->bimar_training_course->tr_course_desc}}</p>
                                                <p class="fables-product-price fables-second-text-color my-2 mx-3 semi-font" style="text-align: center;">{{$call->tr_course_enrol_price}}  SYP</p>
                                                <form action="{{url('user_trainee/Register_for_course',$call->id)}}" method="post">
                                                @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15 yuy" value="التسجيل على الكورس">
                                                </form>

                                                <div style="display: flex
;
    justify-content: center;
    flex-direction: column;
    align-items: center;">

                                                <button onclick="showEditPopupo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض تفاصيل المدرب  </span></a></p></button>
                                                <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض التفاصيل  </span></a></p></button>
                                                <button onclick="showEditPopupoo({{ $call->id }})" style="border: none;background: none; color:black;" class=""> <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">عرض  الاوقات  </span></a></p></button>

                                            </div>

                                              </div>
                                           </div>
        </div>
    @endforeach
@endif

                                    <!-- <a href="#" class="btn white-color font-18 all-index-products fables-second-hover-color border-0 p-0
                                       position-absolute d-block pt-4 pt-md-0 z-index ">
                                        <span class="underline">جميع الكورسات</span>
                                        <span class="fables-iconarrow-light ml-2 font-13"></span>
                                    </a> -->
                               </div>
                           </div>
                       </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="popup" id="popuppo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuoo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">تفاصيل الكورس   </h4>
               </div>
                <!-- <div class="containerr"> -->
                @if(isset($call))
                <form style="    padding: 20px;color: black;">
                    @csrf

                    <!-- Other input fields here -->

                      <div class="roww">
                        <h3 style="margin-top:10px;"> اسم البرنامج التدريبي  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            <input type="text" name="bimar_training_program" id="bimar_training_program" readonly />

                        </div>
                        <h3 style="margin-top:10px;"> اسم الدورة التدريبية  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            <input type="text" name="bimar_training_course" id="bimar_training_course" readonly />

                        </div>
                        <h3> نوع التدريب  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" name="bimar_training_type" id="bimar_training_type" readonly/>
                        <div class="input-icon"><i class="fa-solid fa-chalkboard"></i></div>

                        </div>
                        <h3> رسم التسجيل  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" name="tr_course_enrol_price" id="tr_course_enrol_price" readonly/>
                        <div class="input-icon"><i class="fa-solid fa-tag"></i></div>

                        </div>
                        <h3> الحسم  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" name="tr_course_enrol_discount" id="tr_course_enrol_discount" readonly/>
                        <div class="input-icon"><i class="fa-solid fa-tag"></i></div>

                        </div>
                        <h3> تاريخ انتهاء التسجيل على الدورة التدريبية  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" name="tr_course_enrol_reg_end_date" id="tr_course_enrol_reg_end_date" readonly/>
                        <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>

                        </div>
                        <h3>      عدد الساعات التدريبية  </h3>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" name="tr_course_enrol_hours" id="tr_course_enrol_hours" readonly/>
                        <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>

                        </div>

                      </div>



                    </form>
                    @else
            <p>لم يتم العثور على بيانات للتعديل</p>
              @endif
                  <!-- </div> -->

            </div>
        </div>



        <div class="popup" id="popuppoo-1">
            <div class="overlay"></div>
            <div class="content" style="    height: 280px;width: 490px;">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuooo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">المدربين    </h4>
               </div>
                <!-- <div class="containerr"> -->
                @if(isset($call))
                <table id="trainers-table" style="    direction: rtl;
    float: right;
    margin: 20px;
    width: 450px;">
            <thead style="    border-bottom: 1px solid #736f6f;
    padding: 10px;
    /* display: inline-block; */
    background: #79bab1;">
                <tr>
                    <th style="padding: 10px;">الاسم الكامل</th>

                    <th style="padding: 10px;">الوصف</th>
                </tr>
            </thead>
            <tbody>
                <!-- سيتم تحميل البيانات هنا عبر AJAX -->
            </tbody>
        </table>
                    @else
            <p>لم يتم العثور على بيانات للتعديل</p>
              @endif
                  <!-- </div> -->

            </div>
        </div>





        <div class="popup" id="popuppooo-1">
            <div class="overlay"></div>
            <div class="content" style="    height: 280px;width: 490px;">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuoooo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">الاوقات    </h4>
               </div>
                <!-- <div class="containerr"> -->
                @if(isset($call))
                <table id="times-table" style="    direction: rtl;
    float: right;
    margin: 20px;
    width: 450px;">
            <thead style="    border-bottom: 1px solid #736f6f;
    padding: 10px;
    /* display: inline-block; */
    background: #79bab1;">
                <tr>
                    <th style="padding: 10px;">اليوم </th>

                    <th style="padding: 10px;">من الساعة</th>
                    <th style="padding: 10px;">الى الساعة</th>
                </tr>
            </thead>
            <tbody>
                <!-- سيتم تحميل البيانات هنا عبر AJAX -->
            </tbody>
        </table>
                    @else
            <p>لم يتم العثور على بيانات للتعديل</p>
              @endif
                  <!-- </div> -->

            </div>
        </div>
        <script>
          function showEditPopup(id) {
    fetch(`/user_trainee/details_course_enrollment/${id}`)
        .then(response => response.json())
        .then(data => {
            // التحقق من البيانات الواردة قبل تعيينها
            if (data) {
                document.getElementById('bimar_training_program').value = data.bimar_training_program.tr_program_name_ar;
                document.getElementById('bimar_training_course').value = data.bimar_training_course.tr_course_name_ar;

                document.getElementById('bimar_training_type').value = data.bimar_training_type.tr_type_name_ar;
                document.getElementById('tr_course_enrol_discount').value = data.tr_course_enrol_discount;
                document.getElementById('tr_course_enrol_hours').value = data.tr_course_enrol_hours;
                document.getElementById('tr_course_enrol_price').value = data.tr_course_enrol_price;


                document.getElementById('tr_course_enrol_reg_end_date').value = data.tr_course_enrol_reg_end_date;

                // عرض المودال
                togglePopuoo();
            }
        })
        .catch(error => console.error('Error:', error));
}

function togglePopuoo() {
    document.getElementById("popuppo-1").classList.toggle("active");
}
function togglePopuooo() {
    document.getElementById("popuppoo-1").classList.toggle("active");
}
function togglePopuoooo() {
    document.getElementById("popuppooo-1").classList.toggle("active");
}

        </script>
        <script>
function showEditPopupo(id) {
    $.ajax({
    url: "/program/show_trainers_details/" + id,
    type: "GET",
    success: function (response) {
        console.log("البيانات المسترجعة:", response);

        let tableBody = $("#trainers-table tbody");
        tableBody.empty();

        if (response.length > 0) {
            response.forEach(function (trainer) {
                console.log("Trainer Object:", trainer);

                // تعديل القراءة بناءً على اسم الحقل الفعلي
                let user = trainer.bimar__user || {};

                console.log("بيانات المستخدم:", user);

                tableBody.append(`
                    <tr style="    border-bottom: 1px solid #736f6f;">
                        <td style="padding: 10px;">${user.tr_user_fname_ar ? user.tr_user_fname_ar + ' ' + (user.tr_user_lname_ar || '') : 'غير متوفر'}</td>
                        <td style="padding: 10px;">${trainer.tr_course_enrol_trainers_desc || 'غير متوفر'}</td>
                    </tr>
                `);
            });
        } else {
            tableBody.append(`<tr><td colspan="3">لم يتم العثور على مدربين</td></tr>`);
        }

        togglePopuooo();
    }
});


}

</script>



<script>
function showEditPopupoo(id) {
    $.ajax({
    url: "/program/show_times/" + id,
    type: "GET",
    success: function (response) {
        console.log("البيانات المسترجعة:", response);

        let tableBody = $("#times-table tbody");
        tableBody.empty();

        if (response.length > 0) {
            response.forEach(function (time) {
                console.log("time Object:", time);

                // تعديل القراءة بناءً على اسم الحقل الفعلي

                console.log("بيانات الاوقات:", time);

                tableBody.append(`
                    <tr style="    border-bottom: 1px solid #736f6f;">
                        <td style="padding: 10px;">${time.tr_course_enrol_times_day || 'غير متوفر'}</td>
                        <td style="padding: 10px;">${time.tr_course_enrol_times_from || 'غير متوفر'}</td>
                        <td style="padding: 10px;">${time.tr_course_enrol_times_to || 'غير متوفر'}</td>

                        </tr>
                `);
            });
        } else {
            tableBody.append(`<tr><td colspan="3">لم يتم العثور على اوقات</td></tr>`);
        }

        togglePopuoooo();
    }
});


}

</script>

@endsection
