@extends('layout_user.mester')
@section('content')
<style>
    /* .border-bottom{
        border-bottom: 1px solid #dee2e6 !important;
    } */
    @media screen and (max-width: 398px ){
        .border-bottom{
        border-bottom: 0 !important;
    }
}
.col-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
        padding-top: 50px;
    }
    .fables-hover-btn-color:hover, .fables-hover-btn-color:hover span {
    color:rgb(255, 255, 255) !important;
}
</style>

<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">بيانات الطالب   </h1>
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

<div class="container" style="direction: rtl;">
    <div class="row mt-4 my-md-5 overflow-hidden">
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".3s">
            <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconlamp-icon fables-second-text-color fa-3x"><i class="las la-signature"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">اسم الطالب</h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$trainee->Bimar_Trainee->trainee_fname_ar}}{{$trainee->Bimar_Trainee->trainee_lname_ar}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".6s">
           <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-icongears-icon fables-second-text-color fa-3x"><i class="las la-school"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">اسم البرنامج التدريبي</h2>
                       <div class="font-15 fables-forth-text-color">
                       {{$program->tr_program_name_ar}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right " style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-chalkboard"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">اسم الدورة التدريبية</h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$course->tr_course_name_ar}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-signature"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">اسم المدرب </h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$bimar_user->tr_user_fname_ar}} {{$bimar_user->tr_user_lname_ar}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right " style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-calendar"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">تاريخ  الامتحان  </h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$date}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-calendar"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">وقت بداية الامتحان  </h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$start_time}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-calendar"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">وقت نهاية الامتحان  </h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$end_time}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4  wow fadeInDown" data-wow-delay=".9s">
           <div class="border p-3 p-md-4 text-center text-lg-right" style="direction: ltr;">
                <div class="row">
                    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                        <span class="fables-iconheadset-icon fables-second-text-color fa-3x"><i class="las la-list-ol"></i></span>
                    </div>
                    <div class="col-12 col-lg-9">
                       <h2 class="fables-second-text-color font-20 semi-font mb-3 about-block-heading">عدد الكلي للاسئلة</h2>
                        <div class="font-15 fables-forth-text-color">
                        {{$question_count}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
