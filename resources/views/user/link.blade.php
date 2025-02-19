@extends('layout_user.mester')
@section('content')
<style>
      /* .container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
} */


.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }

  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{

    }
    li {
      display: block;
    }
    .col {

      flex-basis: 100%;

    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
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
@media (max-width: 768px) {
    table th, table td {
        font-size: 12px; /* تصغير حجم الخط */
    }
    table th:nth-child(2), table td:nth-child(2) {
        display: none; /* إخفاء العمود الثاني (المدرب) */
    }
}
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
            height: 220px;
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
        }}
    </style>
<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s" >
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع الروابط الامتحانية  </h1>
                  <!-- <p class="fables-forth-text-color font-22 mb-3">
                      We are a full service digital product agency
                  </p> -->
                  <!-- <a href="contactus1.html" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-4 py-2 white-color-hover">Contact us</a> -->
              </div>
             </div>
         </div>
    </div>
</div>
      <div id="page-wrapper">
    @if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12" style="    padding-right: 0px;
     padding-left: 0px;">
                <div class="card">

                        <div class="card-block">
                        <div class="table-responsive">
    <table class="table table-bordered table-striped table-condensed">
        <thead style="text-align: center;">
            <tr>
                <th>الصف</th>
                <th>نوع التقييم</th>
                <th>حالة التقييم </th>
                <th>اسم النموذج </th>
                <th>تاريخ ووقت بداية التقييم</th>
                <th>تاريخ ووقت نهاية التقييم</th>

                <!-- <th>كلمة السر</th> -->
            </tr>
        </thead>
        <tbody style="text-align: center;">
        @foreach($links as $call)
            <tr>
                <td>{{$call->Bimar_Enrol_Class->tr_enrol_classes_name}}</td>
                <td>{{$call->Bimar_Assessment_Type->tr_assessment_type_name_ar}}</td>
                @if ($call->bimar_assessment_status_id === 2)
                <td>الاسئلة تحضر من ضمن المدرب</td>
                @elseif ($call->bimar_assessment_status_id === 3 && $call->bimar_assessment_type_id === 2)
                <td>
                <button onclick="togglePopuop()" class="bbtn">كلمة السر</button>
                </td>
                @endif
                <td>{{$call->tr_assessment_name}}</td>
                <td>{{$call->tr_assessment_start_time}}</td>
                <td>{{$call->tr_assessment_end_time}}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>


                    </div>

                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>


        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="popup" id="popupp-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuop()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{ route('yyquestionslink') }}" method="GET" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4>كلمة السر  </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" كلمةالسر   " name="tr_assessment_passcod" class="@error('tr_assessment_passcode') is-invalid @enderror" style="    margin-top: 10px;"/>
                          @error('tr_assessment_passcode')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>





                      </div>


                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
        <script>
            function togglePopuop(){
            document.getElementById("popupp-1").classList.toggle("active");
        }
        </script>

@endsection
