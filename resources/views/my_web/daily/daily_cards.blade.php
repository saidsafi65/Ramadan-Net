@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 5px 130px 0px 130px;
    }
</style>
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form action="add_DailyCard" method="POST" class="login100-form validate-form">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">نوع البطاقة</label>
            <input type="number" class="form-control" id="card_type" name="card_type" autocomplete="off" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">عدد البطاقات المراد بيعها</label>
            <input type="number" class="form-control" id="card_quantity" name="card_quantity" autocomplete="off" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">المبلغ الاجمالي ( بالشيكل )</label>
            <input type="number" class="form-control" id="card_total" name="card_total" autocomplete="off" require>
        </div>
        <button type="submit" class="btn btn-primary">بيــع</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
</div>


@endsection