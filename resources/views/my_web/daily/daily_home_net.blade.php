@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 5px 130px 0px 130px;
    }
/* 
    input[type="date"]::-webkit-datetime-edit,
    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-clear-button {
        color: #fff;
        position: relative;
    }

    input[type="date"]::-webkit-datetime-edit-year-field {
        position: absolute !important;
        border-left: 1px solid #8c8c8c;
        padding: 2px;
        color: #000;
        left: 56px;
    }

    input[type="date"]::-webkit-datetime-edit-month-field {
        position: absolute !important;
        border-left: 1px solid #8c8c8c;
        padding: 2px;
        color: #000;
        left: 26px;
    }


    input[type="date"]::-webkit-datetime-edit-day-field {
        position: absolute !important;
        color: #000;
        padding: 2px;
        left: 4px;

    } */
</style>
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form action="add_dailyhomenet" method="POST" class="login100-form validate-form">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">اسم المشترك</label>
            <input type="text" class="form-control" id="homenet_name" name="homenet_name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">رقم الاشتراك</label>
            <input type="number" class="form-control" id="homenet_no" name="homenet_no" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">نهاية الاشتراك</label>
            <input type="date" class="form-control" id="homenet_month" name="homenet_month" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">المبلغ المحصل</label>
            <input type="number" class="form-control" id="homenet_total" name="homenet_total" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary">تجديد الاشتراك</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
</div>


@endsection