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
</style>

<div class="fables-header bg-white index-3-height bg-rules overflow-hidden" id="gg">
@if(session()->has('message'))
    <div id="alert-box" class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; background: #ffffff;
        padding: 10px; width: 550px; margin-left: 70px;
        box-shadow: inset -1px 1px 13px 0px rgb(97 184 174);
        border-radius: 10px; position: relative;">

        <span>{{ session()->get('message') }}</span>

        <!-- زر الإغلاق -->
        <span class="close-btn" onclick="closeAlert()" style="position: absolute; top: 5px; left: 10px; cursor: pointer; font-size: 25px; color: red;">
            &times;
        </span>
    </div>

    <script>
        function closeAlert() {
            document.getElementById('alert-box').style.display = 'none';
        }
    </script>
@endif

    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع البرامج في المنصة</h1>
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

<div class="container py-4 py-lg-5">
    <div class="fables-blog my-3">
       <h2 class="fables-second-text-color mb-4 mb-lg-5 font-weight-bold" style="    text-align: end;">البرامج</h2>

       <div class="row" style="direction: rtl;">
       @foreach($data as $call)
             <div class="col-12 col-sm-4">
                     <div class="position-relative mb-4" style="    height: 234px;border-radius: 50px;">
                          <a href="{{url('user_trainee/courses_for_program',$call->id)}}"><img src="{{URL::asset('/img/program/'.$call->tr_program_img)}}" alt="" class="w-100" style="    height: 100%;border-radius: 50px;">
                          <div class="fables-blog-overlay text-white pl-2 pl-lg-4 pb-5">
                              <div class="text-white font-14" style="text-align: right;">
                                  <!-- <span class="fables-icondata fables-second-text-color mr-1"></span> -->
                                  <span class="mr-3"> {{$call->tr_program_name_ar}} </span>
                                  <!-- <span class="fables-iconcomment fables-second-text-color mr-1"></span> -->
                                  <!-- <a href="" class="text-white fables-second-hover-color position-relative z-index">{{$call->tr_program_code}}</a> -->
                              </div>
                              <h2 class="position-relative z-index" style="text-align: center;"><a href="{{url('user_trainee/courses_for_program',$call->id)}}" class="font-18 semi-font pb-3 text-white border-bottom  d-lg-block">{{$call->tr_program_desc}}</a></h2>
                           </div>
                           </a>
                      </div>
             </div>
             @endforeach
             <!-- <div class="col-12 col-sm-4">
                     <div class="position-relative mb-4">
                          <a href="#"><img src="assetss/custom/images/blog-teaser-img1.jpg" alt="" class="w-100"></a>
                          <div class="fables-blog-overlay text-white pl-2 pl-lg-4 pb-5">
                              <div class="text-white font-14">
                                  <span class="fables-icondata fables-second-text-color mr-1"></span>
                                  <span class="mr-3"> 09 November, 2018 </span>
                                  <span class="fables-iconcomment fables-second-text-color mr-1"></span>
                                  <a href="" class="text-white fables-second-hover-color position-relative z-index">2</a>
                              </div>
                              <h2 class="position-relative z-index"><a href="#" class="font-18 semi-font pb-3 text-white border-bottom d-none d-lg-block">Getting to Another Level of Design</a></h2>
                           </div>
                      </div>

             </div>
             <div class="col-12 col-sm-4">
                     <div class="position-relative mb-4">
                          <a href="#"><img src="assetss/custom/images/blog-teaser-img1.jpg" alt="" class="w-100"></a>
                          <div class="fables-blog-overlay text-white pl-2 pl-lg-4 pb-5">
                              <div class="text-white font-14">
                                  <span class="fables-icondata fables-second-text-color mr-1"></span>
                                  <span class="mr-3"> 09 November, 2018 </span>
                                  <span class="fables-iconcomment fables-second-text-color mr-1"></span>
                                  <a href="" class="text-white fables-second-hover-color position-relative z-index">2</a>
                              </div>
                              <h2 class="position-relative z-index"><a href="#" class="font-18 semi-font pb-3 text-white border-bottom d-none d-lg-block">Getting to Another Level of Design</a></h2>
                           </div>
                      </div>


             </div> -->
       </div>

    </div>
</div>
@endsection
