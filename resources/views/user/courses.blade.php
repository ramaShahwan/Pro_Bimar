@extends('layout_user.mester')
@section('content')

<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع الكورسات في المنصة</h1>
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
                               <div class="col-12 col-lg-10 offset-lg-2">
                                    <div class="owl-carousel owl-theme dots-0 carousel-items-3 circle-nav mt-lg-4 mb-lg-5" id="blog-slider">
                                    @foreach($data as $call)
                                         <div class="card rounded-0 border-light wow fadeIn mb-4 mb-lg-0" data-wow-delay=".4s">
                                           <div class="row">
                                               <div class="fables-product-img col-12">
                                                  <img class="card-img-top rounded-0 w-100" src="{{URL::asset('/img/course/'.$call->tr_course_img)}}" alt="dress fashion" style="height: 163px;">
                                                  <div class="fables-img-overlay">
                                                      <ul class="nav fables-product-btns">
                                                          <!-- <li><a href="#" class="fables-third-text-color fables-second-hover-color work-icon mx-3"><span class="fables-iconlink "></span></a></li> -->
                                                          <li><a href="" class="fables-product-btn"><span class="fables-iconlink "></span></a></li>
                                                          <!-- <li><button class="fables-product-btn"><span class="fables-iconheart"></span></button></li> -->
                                                      </ul>
                                                  </div>
                                              </div>
                                              <div class="card-body col-12">
                                                <h5 class="card-title mx-3" style="text-align: center;">
                                                    <a href="#" class="fables-main-text-color fables-store-product-title fables-second-hover-color">{{$call->bimar_training_course->tr_course_name_ar}}</a>
                                                </h5>
                                                <p class="card-text fables-fifth-text-color fables-store-product-details mx-3 store-card-text" style="text-align: center;">{{$call->bimar_training_course->tr_course_desc}}</p>
                                                <p class="fables-product-price fables-second-text-color my-2 mx-3 semi-font" style="text-align: center;">{{$call->tr_course_enrol_price}}</p>
                                                <p class="fables-product-info my-2"><a href="#" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-15">
                                                <!-- <span class="fables-iconcart"></span> -->
                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p>
                                                <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button>

                                              </div>
                                           </div>
                                         </div>
                                         @endforeach
                                    </div>
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
                <div class="close-btn" onclick="togglePopuoo()">&times;</div>
                <!-- <div class="containerr"> -->
                @if(isset($call))
                <form id="editForm" onsubmit="updateProgram(event)">
                    @csrf
                    <input type="hidden" name="id" value="{{ $call->id }}">
                    <!-- Other input fields here -->

                      <div class="roww">
                        <h4> تعديل البرنامج</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="رمز البرنامج " value="{{ $call->tr_program_code }}" name="tr_program_code" id="tr_program_code" class="@error('tr_program_code') is-invalid @enderror"/>
                          @error('tr_program_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة العربية" value="{{ $call->tr_program_name_ar }}" name="tr_program_name_ar" id="tr_program_name_ar" class="@error('tr_program_name_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          @error('tr_program_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  الاسم باللغة الانكليزية" style="padding-bottom: 0;" name="tr_program_name_en" id="tr_program_name_en" value="{{ $call->tr_program_name_en }}" class="@error('tr_program_name_en') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_program_name_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img id="current_program_img" src="" style="display: none; " alt="Current Program Image" class="bg-img" height="170px" width="170px">

                            <!-- <img src="{{URL::asset('/img/program/'.$call->tr_program_img)}}" alt="" class="bg-img" height="170px" width="170px"> -->
                            <input type="file" placeholder="الصورة" style="padding-bottom: 0;" name="tr_program_img" id="tr_program_img"/>
                            <!-- <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div> -->
                          </div>
                      </div>

                      <div class="roww">
                        <h4>حالة البرنامج</h4>
                        <div class="input-groupp">
                            <!-- <input id="wcard" type="radio" name="tr_program_status" value="1" {{ $call->tr_program_status == 1 ? 'checked' : '' }} />
                            <label for="wcard"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                            <input id="fpaypal" type="radio" name="tr_program_status" value="0" {{ $call->tr_program_status == 0 ? 'checked' : '' }}/>
                            <label for="fpaypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                             -->
                             <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_program_status" id="gridRadios1" value="0" {{ old('tr_program_status', $call->tr_program_status) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadios1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_program_status" id="gridRadios2" value="1" {{ old('tr_program_status', $call->tr_program_status) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadios2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset>


                        </div>
                        <!-- <div class="input-groupp">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                              </label>
                        </div> -->
                        <div class="input-groupp input-groupp-icon" >
                          <input type="text" placeholder="الوصف" name="tr_program_desc" id="tr_program_desc" value="{{ $call->tr_program_desc }}"/>
                          <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        </div>


                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                    @else
            <p>لم يتم العثور على بيانات للتعديل</p>
              @endif
                  <!-- </div> -->

            </div>
        </div>
        <script>
            function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }

           document.addEventListener('DOMContentLoaded', function () {

        // كودك هنا
        showEditPopup(id);
    });
      function showEditPopup(id) {
    fetch(`/program/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            // تعيين قيم الحقول بالبيانات المستلمة
            document.getElementById('tr_program_code').value = data.tr_program_code;
            document.getElementById('tr_program_name_en').value = data.tr_program_name_en;
            document.getElementById('tr_program_name_ar').value = data.tr_program_name_ar;
            document.getElementById('tr_program_desc').value = data.tr_program_desc;

            // إعداد الصورة إذا كانت موجودة
            if (data.tr_program_img) {
                document.getElementById('current_program_img').src = `/img/program/${data.tr_program_img}`;
                document.getElementById('current_program_img').style.display = 'block';
            } else {
                document.getElementById('current_program_img').style.display = 'none';
            }

            // تعيين زر الاختيار للحالة بشكل صحيح
            // document.getElementById('tr_program_status').value = data.tr_program_status;
            // console.log(data.tr_program_status);
            const statusRadio = document.querySelector(`input[name="tr_program_status"][value="${data.tr_program_status}"]`);
            console.log(statusRadio);
            if (statusRadio) {
                statusRadio.checked = true;
                console.log(`تم تحديد الحالة: ${statusRadio.value}`, statusRadio.checked); // إضافة التأكيد على حالة checked
            }

            // عرض النافذة
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}

        </script>
@endsection
