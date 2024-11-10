@extends('layout_user.mester')
@section('content')
<style>
   
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }
    .invoice-header h1 {
        font-size: 24px;
        color: #0a3b92;
    }
    .company-logo {
        width: 60px;
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
        margin: 5px 0;
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
</style>
<div class="invoice-header">
    <h1>فاتورة</h1>
    <img src="letter.png" alt="شعار الشركة" class="company-logo">
</div>

<div class="company-details">
    <p>شركة النسور</p>
    <p>قاعة الملكة للمناسبات</p>
    <p>رقم هاتف العميل: 012-1234-567</p>
    <p>عنوان العميل: 75 شارع النصر، القاهرة</p>
</div>

<div class="venue-details">
    <p>قاعة الملكة للمناسبات</p>
</div>

<table>
    <thead>
        <tr>
            <th>Photo</th>
            <th>Item</th>
            <th>Quantity/Hours</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="letter.png" alt="Confetti"></td>
            <td>Confetti cannon</td>
            <td>1</td>
            <td>$123</td>
            <td>$123</td>
        </tr>
        <tr>
            <td><img src="letter.png" alt="Banner"></td>
            <td>Rainbow Banner</td>
            <td>1</td>
            <td>$123</td>
            <td>$123</td>
        </tr>
        <tr>
            <td><img src="letter.png" alt="Disco Ball"></td>
            <td>Disco ball and lights</td>
            <td>1</td>
            <td>$123</td>
            <td>$123</td>
        </tr>
    </tbody>
</table>

<div class="totals">
    <p>المجموع الفرعي: $492</p>
    <p>الضريبة (0%): $0</p>
    <p class="grand-total">إجمالي السعر: 492$</p>
</div>

<div class="bank-details">
    <p>تفاصيل البنك: بنك القاهرة المركزي</p>
    <p>اسم العميل على الحوالة: شركة النسور</p>
    <p>رقم الحساب: 8565235</p>
</div>


@endsection
