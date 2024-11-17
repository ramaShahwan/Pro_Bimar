@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    select{
        width: 100%;
    }
    .bbtn{
        border: none;
    padding: 10px;
    background-color: #61baaf;
    color: white;
    border-radius: 20px;
    }
    .bttn:hover{
        background-color: #61baaf;
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
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);

            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box; */
            max-width: 38em;
    padding: 1em 3em 2em 3em;
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
    /* height: 220px; */
    z-index: 2;
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
    .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, .03);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
}
.table td, .table th {
    text-align: center;
    font-size: 17px;
    padding: .75rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
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
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);

            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box; */
            max-width: 38em;
    padding: 1em 3em 2em 3em;
    /* margin: 0em auto; */
    background-color: #fff;
    /* border-radius: 4.2px; */
    /* box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2); */
    position: absolute;
    top: 90%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    background: #fff;
    width: 450px;
    /* height: 220px; */
    z-index: 2;
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
          /* شكل المفتاح */
          .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* شريط الخلفية */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        /* اللون الأخضر عند التفعيل */
        input:checked + .slider {
            background-color: green;
        }

        /* تحريك الزر عند التفعيل */
        input:checked + .slider:before {
            transform: translateX(26px);
        }

input[type="radio"]:checked + label,
input:checked + label:active {
  /* background-color: #f0a500; */
  background-color: #61baaf;
  color: #fff;
  /* border-color: #bd8200; */
  border-color: #61baaf;
}
body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}




.invoice-header {
        display: flex;
    justify-content: space-around;
    /* margin-top: 20px; */
    direction: rtl;
    align-items: center;
    /* padding-bottom: 20px; */
    border-bottom: 2px solid #f0f0f0;
    }
    .invoice-header h1 {
        font-size: 24px;
        color: #0a3b92;
    }
    .company-logo {
        width: 100px;
    }
    .company-details {
        text-align: center;
        margin-top: 10px;
    }
    .venue-details {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size: 14px;
        text-align: center;
        direction: rtl;
    }
    thead th {
        background-color: #f0f0f0;
        padding: 10px;
        border-bottom: 2px solid #ddd;
        color: #333;
        text-align: center;
    }
    tbody td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    tbody tr:last-child td {
        border-bottom: none;
    }
    td img {
        width: 50px;
        height: 50px;
    }
    .totals {
        margin-top: 20px;
        text-align: right;
        font-size: 14px;
        color: #333;
    }
    .totals p {
        margin: 20px 0;
    }
    .grand-total {
        color: #0a3b92;
        font-weight: bold;
        font-size: 18px;
    }
    .bank-details {
        margin-top: 30px;
        font-size: 12px;
        line-height: 1.6;
        border-top: 2px solid #f0f0f0;
        padding-top: 10px;
    }
    .gd{
        background: #1c998b;
    padding: 5px;
    display: block;
    width: 100px;
    margin-bottom: 20px;
    /* float: right; */
    margin-right: 600px;
    text-align: center;
    color: white;
    border-radius: 25px;
    }
    @media print {
    /* إخفاء زر الطباعة نفسه عند الطباعة */
    #printButton {
        display: none;
    }
    #nnt{
        display: none;
    }
    #nna{
        display: none;
    }
    #nn{
        display: none;
    }
    #nnm{
        display: none;
    }
    #hh{
        display: none;
    }
    #navv{
        display: none;

    }
    #footer-sec{
        display: none;

    }
    #yuy{
        display: none;

    }
    #page-wrapper{
        margin-right: 100px;
    }

    }
    .btco-hover-menu .active a, .btco-hover-menu .active a:focus, .btco-hover-menu .active a:hover, .btco-hover-menu li a:hover, .btco-hover-menu li a:focus, .navbar>.show>a, .navbar>.show>a:focus, .navbar>.show>a:hover {
    color:  #76c8be;
    background: transparent;
    outline: 0;
}
</style>




        <!-- /. NAV SIDE  -->
    <div id="page-wrapper" style="    margin-top: -50px;">

        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card">

<div class="hh">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
</div>
<div class="invoice-header">

    <h1>فاتورة</h1>
    <img src="{{asset('assetss/re.png')}}" alt="شعار الشركة" class="company-logo">
</div>

<div class="company-details">
    <p>شركة بيمار</p>
    <!-- <p>قاعة الملكة للمناسبات</p> -->

    <p style="text-align: start; margin-right: 20px;">  الاسم الكامل:  {{$data->bimar_trainee->trainee_fname_ar}}<span style="    margin-right: 5px;"> {{$data->bimar_trainee->trainee_lname_ar}}</span> </p>
    <p style="text-align: start; margin-right: 20px;"> رقم الايصال:{{$data->id}}   </p>
</div>

<div class="venue-details">
    <p>تفاصيل الفاتورة  </p>
</div>

<table>
    <thead>
        <tr>
            <th>اسم البرنامج</th>
            <th>اسم الدورة التدريبية</th>
            <th>السنة التدريبية</th>
            <th>رقم الدورة </th>
            <th>تاريخ التسجيل على الدورة </th>
            <!-- <th>Total</th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
        <td> {{$data-> bimar_course_enrollment->bimar_training_program->tr_program_name_ar}}</td>
            <td> {{$data-> bimar_course_enrollment->bimar_training_course->tr_course_name_ar}}  </td>
            <td>{{$data-> bimar_course_enrollment->bimar_training_year->tr_year_name}}</td>
            <td>{{$data-> bimar_course_enrollment->tr_course_enrol_arrangement}}</td>
            <td>{{$data-> tr_enrol_pay_reg_date}}</td>
            <!-- <td>$123</td> -->
        </tr>


    </tbody>
</table>

<div class="totals">
<p style="margin-right: 20px;"> المبلغ المستحق فبل تطبيق الحسم:{{$data-> bimar_course_enrollment->tr_course_enrol_price}}</p>
<p style="margin-right: 20px;">قيمة الحسم : ({{$data-> bimar_course_enrollment->tr_course_enrol_discount}}%)</p>
    <p style="margin-right: 20px;">قيمة الحسم الثاني: efww</p>
    <p class="grand-total" style="margin-right: 20px;"> المبلغ المستحق بعد تطبيق الحسم:{{$data-> tr_enrol_pay_net_price}}</p>
    <a href="#" id="printButton" class="gd">خيار الطباعة</a>

</div>

</div>
<!-- <div class="bank-details">
    <p>تفاصيل البنك: بنك القاهرة المركزي</p>
    <p>اسم العميل على الحوالة: شركة النسور</p>
    <p>رقم الحساب: 8565235</p>
</div> -->

<script>
document.getElementById("printButton").addEventListener("click", function(event) {
    event.preventDefault(); // لمنع الرابط من التوجيه إلى مكان آخر
    window.print(); // فتح نافذة الطباعة
});
</script>

                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>


        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <!-- /. FOOTER  -->
    <script>
        function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
    </script>
    <script>
        // JavaScript to handle toggle switch behavior
    document.querySelectorAll('.toggle-switch input').forEach((toggle) => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                this.parentElement.parentElement.classList.add('highlight');
            } else {
                this.parentElement.parentElement.classList.remove('highlight');
            }
        });
    });
    //switch
    document.querySelector('input[type="checkbox"]').addEventListener('change', function() {
      if(this.checked) {
        console.log("مفعل");
      } else {
        console.log("غير مفعل");
      }
    });

    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
@endsection
