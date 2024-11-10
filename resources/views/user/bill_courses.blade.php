@extends('layout_user.mester')
@section('content')
<style>

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
    margin-left: 200px;
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

    }
</style>
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="invoice-header">

    <h1>فاتورة</h1>
    <img src="{{asset('assetss/re.png')}}" alt="شعار الشركة" class="company-logo">
</div>

<div class="company-details">
    <p>شركة بيمار</p>
    <!-- <p>قاعة الملكة للمناسبات</p> -->
    <p style="text-align: end;">  الاسم الكامل:  {{$data->bimar_trainee->trainee_fname_ar}}<span style="    margin-right: 5px;"> {{$data->bimar_trainee->trainee_lname_ar}}</span> </p>
    <p style="text-align: end;"> رقم الايصال:{{$data-> id}}   </p>
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
            <th>تاريخ التسجيل على الدورة </th>
            <!-- <th>Total</th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> {{$data-> bimar_course_enrollment->bimar_training_program->tr_program_name_ar}}</td>
            <td> {{$data-> bimar_course_enrollment->bimar_training_course->tr_course_name_ar}}  </td>
            <td>{{$data-> bimar_course_enrollment->bimar_training_year->tr_year_name}}</td>
            <td>{{$data-> tr_enrol_pay_reg_date}}</td>
            <!-- <td>$123</td> -->
        </tr>


    </tbody>
</table>

<div class="totals">
    <p> المبلغ المستحق فبل تطبيق الحسم:{{$data-> bimar_course_enrollment->tr_course_enrol_price}}</p>
    <p>قيمة الحسم (0%): {{$data-> bimar_course_enrollment->tr_course_enrol_discount}}0</p>
    <p class="grand-total"> المبلغ المستحق بعد تطبيق الحسم:{{$data-> tr_enrol_pay_net_price}}</p>
    <a href="#" id="printButton" class="gd">خيار الطباعة</a>
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
@endsection
