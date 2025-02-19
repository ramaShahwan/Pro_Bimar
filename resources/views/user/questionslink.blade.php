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
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع الاسئلة في الرابط</h1>
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

<div class="container">
     <div class="row my-4 my-md-5">

           <div class="col-12 col-md-8 col-lg-9">
                   <div class="row mb-4">

                       <div class="col-4 col-md-6 col-lg-2 offset-lg-6 text-center pl-0 d-none d-lg-block">
                           <span class="fables-iconlist fa-fw fables-view-btn fables-list-btn fables-third-border-color fables-third-text-color"></span>
                           <span class="fables-icongrid active fa-fw fables-view-btn fables-grid-btn fables-third-border-color fables-third-text-color"></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12 col-sm-6 col-lg-4 fables-product-block">
                           <div class="card rounded-0 mb-4">
                               <div class="row">
                                   <div class="fables-product-img col-12" style="text-align: center;">
                                    <span class="card-img-top rounded-0" style="
                                    font-size: 40px;
                                    margin: 0;"><i class="las la-question-circle"></i></span>
                                      <
                                  </div>
                                  <div class="card-body col-12">
                                    <h5 class="card-title mx-xl-3" style="text-align: end;">
                                        <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">بيانات المتدرب</a>
                                    </h5>
                                    <p class="store-card-text fables-fifth-text-color font-15 mx-xl-3" style="text-align: end;">{{$trainee->Bimar_Trainee->trainee_fname_ar}}{{$trainee->Bimar_Trainee->trainee_lname_ar}}</p>
                                    <p class="font-15 font-weight-bold fables-second-text-color my-2 mx-xl-3" style="text-align: end;">{{$course_enrol->bimar_training_program->tr_program_name_ar}}</p>
                                    <p class="fables-product-info"><a href="{{ route('notequestion') }}" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-14 p-2 px-2 px-xl-4">
                                    <!-- <span class="fables-iconcart"></span>  -->
                                    <span class="fables-btn-value">المزيد</span></a></p>
                                  </div>
                               </div>
                            </div>
                       </div>
                       @foreach($questions as $index => $call)
    <div class="col-12 col-sm-6 col-lg-4 fables-product-block">
        <div class="card rounded-0 mb-4">
            <div class="row">
                <div class="fables-product-img col-12" style="text-align: center;">
                    <span class="card-img-top rounded-0" style="font-size: 40px; margin: 0;">
                        <i class="las la-question-circle"></i>
                    </span>
                </div>
                <div class="card-body col-12">
                    <h5 class="card-title mx-xl-3" style="text-align: end;">
                        <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">
                            السؤال {{ $loop->iteration }}
                        </a>
                    </h5>
                    <p class="store-card-text fables-fifth-text-color font-15 mx-xl-3" style="text-align: end;">
                        {{$call->Bimar_Bank_Assess_Question->Bimar_Questions_Type->tr_questions_type_name}}
                    </p>
                    <p class="font-15 font-weight-bold fables-second-text-color my-2 mx-xl-3" style="text-align: end;">
                        {{$call->Bimar_Bank_Assess_Question->tr_bank_assess_questions_grade}}
                    </p>
                    <p class="fables-product-info">
                        <a href="{{url('trainee/show',$call->bimar_bank_assess_question_id)}}" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-14 p-2 px-2 px-xl-4" target="_blank>
                            <span class="fables-btn-value">فتح السؤال</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach






                   </div>

           </div>
     </div>

</div>
@endsection
