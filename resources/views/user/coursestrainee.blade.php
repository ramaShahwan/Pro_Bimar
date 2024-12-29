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
            z-index: 1;
            display: none;
        }
        .popup .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);
            background: #fff;
            width: 450px;
            height: 480px;
            z-index: 500;
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
h3{
    text-align: end;
    font-size: 15px;
    color: #1e9e8e;
    margin-bottom: 10px;

}
    </style>
<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع كورساتي  </h1>
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
<!-- Start page content -->
<div class="container">

     <div class="row mb-0 mb-md-5" style="direction: rtl;">
           <div class="col-12">
               <h2 class="fables-forth-text-color fables-light-background-color my-3 my-md-5 py-3 text-center font-20 semi-font"> كورساتي</h2>
           </div>
           @foreach($courses as $call)
           <div class="col-12 col-sm-6 col-lg-3 fables-product-block">
               <div class="card rounded-0 mb-4">
                   <div class="row">
                       <div class="fables-product-img col-12">
                          <img class="card-img-top rounded-0" src="{{URL::asset('/img/course/'.$call->bimar_training_course->tr_course_img)}}" alt="dress fashion">

                      </div>
                      <div class="card-body col-12">
                        <h5 class="card-title mx-3" style="text-align: center;">
                            <a href="#" class="fables-main-text-color font-16 semi-font fables-second-hover-color">{{ $call->bimar_training_course->tr_course_name_ar }}</a>
                        </h5>
                        <p class="card-text fables-fifth-text-color font-15 mx-3">{{$call->bimar_training_course->tr_course_desc}}</p>
                        <p class="font-15 font-weight-bold fables-second-text-color my-2 mx-3" style="text-align: center;">{{$call->tr_course_enrol_price}}</p>
                        <p class="fables-product-info"><a href="{{url('profile/get_sessions_for_course',$call->id)}}" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-14 p-2 px-4">
                        <!-- <span class="fables-iconcart"></span> -->
                        <span class="fables-btn-value">الجلسات</span></a></p>
                        <p class="fables-product-info"><a href="{{url('profile/get_general_content',$call->id)}}" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-14 p-2 px-4">
                        <!-- <span class="fables-iconcart"></span> -->
                        <span class="fables-btn-value">المنهاج</span></a></p>
                      </div>
                   </div>
                </div>
           </div>
           @endforeach


     </div>

</div>
@endsection
