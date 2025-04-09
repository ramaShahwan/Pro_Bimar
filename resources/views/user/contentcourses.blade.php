@extends('layout_user.mester')
@section('content')
<style>
      /* .container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}


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

} */
.table-header {
        background-color: #23a794 !important;
        background: #23a794;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
    .responsive-table {
    .table-header {
        background-color: #23a794;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
}
@media (max-width: 768px) {
    table th, table td {
        font-size: 12px; /* تصغير حجم النص */
        padding: 5px; /* تقليل الحشوة */
    }

    table td img, table td video {
        width: 50px; /* تصغير عرض الصور والفيديو */
    }

    table td a {
        font-size: 12px; /* تصغير النص للروابط */
    }
}
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
             <div class="col-12 col-lg-7 offset-lg-4 wow fadeInUpBig" data-wow-duration="2s">
                  <div class="index-3-height-caption">
                  <!-- <p class="font-30 fables-second-text-color">We are a full</p> -->
                  <h1 class="fables-main-text-color bold-font mb-2 font-40">جميع الملفات  </h1>
                  <!-- <p class="fables-forth-text-color font-22 mb-3">
                      We are a full service digital product agency
                  </p> -->
                  <!-- <a href="contactus1.html" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-4 py-2 white-color-hover">Contact us</a> -->
              </div>
             </div>
         </div>
    </div>
</div>
<!-- <div class="container" style="direction: rtl;">
        <ul class="responsive-table">
          <li class="table-header">
          <div class="col col-1">  الملف</div>
            <div class="col col-2"> الوصف </div>

          </li>
          @foreach($content as $call)

          <li class="table-row">
            <div class="col col-1" data-label="Job Id">
@if ($call->tr_course_session_content_path)
    @php
        $extension = pathinfo($call->tr_course_session_content_path, PATHINFO_EXTENSION);
    @endphp

    @if (in_array($extension, ['jpg', 'png']))
        <img style="width: 100px;" src="{{ asset('storage/'.$call->tr_course_session_content_path) }}" alt="Content Image">
    @elseif ($extension === 'mp4')
        <video controls style="width: 100px;">
            <source src="{{ asset('storage/'.$call->tr_course_session_content_path) }}" type="video/mp4">
        </video>
    @elseif (in_array($extension, ['pdf', 'docx']))
        <a href="{{ asset('storage/'.$call->tr_course_session_content_path) }}" target="_blank">عرض الملف</a>
    @endif
@endif
</div>
            <div class="col col-2" data-label="Customer Name"> {{$call->tr_course_session_content_desc}}</div>


          </li>
          @endforeach



        </ul>
      </div> --> <div id="page-wrapper">
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
                <th>الملف</th>
                <th>الوصف</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
        <?php $i = 1 ?>
            @foreach($content as $call)
            <tr class="ttr">
            <td>{{$i++}}</td>
                <td>


                    <!-- @if ($call->tr_course_session_content_path)
                        @php
                            $extension = pathinfo($call->tr_course_session_content_path, PATHINFO_EXTENSION);
                        @endphp

                        @if (in_array($extension, ['jpg', 'png']))
                            <img style="width: 100px;" src="{{ asset('storage/'.$call->tr_course_session_content_path) }}" alt="Content Image">
                        @elseif ($extension === 'mp4')
                            <video controls style="width: 100px;">
                                <source src="{{ asset('storage/'.$call->tr_course_session_content_path) }}" type="video/mp4">
                            </video>
                        @elseif (in_array($extension, ['pdf', 'docx']))
                            <a href="{{ asset('storage/'.$call->tr_course_session_content_path) }}" target="_blank">عرض الملف</a>
                        @endif
                    @endif -->
                    @if ($call->tr_course_session_content_path)
    @php
        $extension = pathinfo($call->tr_course_session_content_path, PATHINFO_EXTENSION);
    @endphp

    @if (in_array($extension, ['jpg', 'png', 'jpeg', 'gif']))
        <img style="width: 100px;height: 100px;" src="{{ asset($call->tr_course_session_content_path) }}" alt="Content Image">
    @elseif ($extension === 'mp4')
        <video controls style="width: 200px;    height: 120px;">
            <source src="{{ asset($call->tr_course_session_content_path) }}" type="video/mp4">
        </video>
    @elseif (in_array($extension, ['pdf', 'docx', 'pptx']))
        <a href="{{ asset($call->tr_course_session_content_path) }}" target="_blank">📄 عرض الملف</a>
    @else
        <span>نوع الملف غير مدعوم</span>
    @endif
@endif
                </td>
                <td>{{$call->tr_course_session_content_desc}}</td>
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

@endsection
