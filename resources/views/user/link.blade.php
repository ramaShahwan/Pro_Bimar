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
            z-index: 4000;
            display: none;
        }
        .popup .content{
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);
            background: #fff;
            width: 450px;
            height: 220px;
            z-index: 500;
            text-align: center;
            padding: 20px;
            box-sizing: border-box; */
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
            height: 220px;
    padding: 0;
    /* overflow: auto; */
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
        .active-row {
    background-color: #d4edda;
}
.table-bordered > thead > tr > th,.table-bordered > tbody > tr > td{
    border:none;
}
.table-bordered{
    border:none;
}
.ttr{
    border-bottom: 1px solid #bdd7d3;
}
.ttr:hover{
    background: #23a794c2 !important;
    color: #101010;
    box-shadow: 0px 0px 7px 0px #23a794;
}
.table-striped > tbody > tr:nth-child(odd) > td{
    background:none;
}
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
    </style>
<div class="fables-header bg-white index-3-height bg-rules overflow-hidden">
    <div class="container position-relative z-index">
         <div class="row">
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s" >
                  <div class="index-3-height-caption">
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع الروابط الامتحانية  </h1>
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
                <div class="card" style="border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">

                        <div class="card-block">
                        <div class="table-responsive">
    <table class="table table-bordered table-striped table-condensed">
        <thead style="text-align: center;background: #23a794;
    color: white;">
            <tr>

            <th>#</th>
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
        <?php $i = 1 ?>
        @foreach($links as $call)
        <tr class="ttr">
        <td>{{$i++}}</td>
                <td>{{$call->Bimar_Assessment->Bimar_Enrol_Class->tr_enrol_classes_name}}</td>
                <td>{{$call->Bimar_Assessment->Bimar_Assessment_Type->tr_assessment_type_name_ar}}</td>
                @if ($call->Bimar_Assessment->bimar_assessment_status_id === 2)
                <td>الاسئلة تحضر من ضمن المدرب</td>
                @elseif ($call->Bimar_Assessment->bimar_assessment_status_id === 3 && $call->Bimar_Assessment->bimar_assessment_type_id === 2 && $call->tr_assessment_trainee_end_time===null)
                <td>
                <!-- <button onclick="togglePopuop()" class="bbtn">كلمة السر</button> -->
                <button onclick="openPopup({{ $call->bimar_assessment_id }})" class="bbtn">كلمة السر</button>

                </td>
                @elseif ($call->Bimar_Assessment->bimar_assessment_status_id === 5 && $call->Bimar_Assessment->bimar_assessment_type_id === 2 && $call->tr_assessment_trainee_end_time != null)
                <td>
                <!-- <button onclick="togglePopuop()" class="bbtn">كلمة السر</button> -->
                <button onclick="showEditPopup({{ $call->bimar_assessment_id }})" class="bbtn">عرض العلامة</button>

                </td>
                @else
                <td>
                يتم تجهيز العلامة

                </td>
                @endif
                <td>{{$call->Bimar_Assessment->tr_assessment_name}}</td>
                <td>{{$call->Bimar_Assessment->tr_assessment_start_time}}</td>
                <td>{{$call->Bimar_Assessment->tr_assessment_end_time}}</td>


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
    <div class="overlay" ></div>
    <div class="content">
        <!-- <div class="close-btn" onclick="closePopup()">&times;</div> -->
        <div class="gf">
               <div class="close-btn" onclick="closePopup()"><i class="las la-times-circle"></i></div>
               <h4 class="h44"> كلمة السر   </h4>
               </div>
        <form id="assessmentForm" method="POST" enctype="multipart/form-data" style="    padding: 20px;color: black;">
            @csrf
            <div class="roww">
                <!-- <h4>كلمة السر</h4> -->
                <div class="input-groupp input-groupp-icon" style="margin-top: 10px;">
                    <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    <input type="text" placeholder=" كلمة السر " name="tr_assessment_passcode" class="@error('tr_assessment_passcode') is-invalid @enderror" style="font-family:sans-serif;" />
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
    </div>
</div>




<div class="popup" id="popuppo-1">
    <div class="overlay"></div>
    <div class="content">
        <!-- <div class="close-btn" onclick="togglePopupoo()">&times;</div> -->
        <div class="gf">
               <div class="close-btn" onclick="togglePopupoo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">  العلامة   </h4>
               </div>
        <form style="padding: 20px;color: black;">
            @csrf
            <div class="roww">
                <!-- <h4>العلامة</h4> -->
                <div class="input-groupp input-groupp-icon" style="margin-top: 30px;">
                <div class="input-icon" style="top: 10px;"><i class="fa-solid fa-signature"></i></div>
                    <input type="text"    style="margin-top: 10px;box-shadow: 1px 1px 4px 0px #afafa6;" id="show_mark" readonly />

                <!-- <h4 id="show_mark">--</h4> سيتم تحديثه بالعلامة عند جلبها -->
                </div>

            </div>
        </form>
    </div>
</div>


        <script>
           function openPopup(assessmentId) {
    // تحديث `action` داخل الفورم
    let form = document.getElementById("assessmentForm");
    form.action = "/trainee/open_assessment/" + assessmentId;

    // عرض المودال
    document.getElementById("popupp-1").classList.toggle("active")
}

function closePopup() {
    document.getElementById("popupp-1").style.display = "none";
}
function closePopupo() {
    document.getElementById("popuppo-1").style.display = "none";
}

        </script>
        <script>
            function togglePopupoo() {
    document.getElementById("popuppo-1").classList.toggle("active");
}
        </script>
        <script>
           function showEditPopup(id) {
    fetch(`/trainee/show_mark/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('البيانات المسترجعة:', data);

            if (data.mark !== undefined) {
                document.getElementById('show_mark').value = data.mark;

                // document.getElementById('show_mark').innerText = data.mark;
            } else {
                document.getElementById('show_mark').innerText = "لم يتم العثور على العلامة";
            }

            togglePopupoo();
        })
        .catch(error => console.error('خطأ:', error));
}
        </script>

@endsection
