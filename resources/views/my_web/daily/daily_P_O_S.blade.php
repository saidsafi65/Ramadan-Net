@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 5px 130px 0px 130px;
    }
</style>
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form action="add_dailypos" method="POST" class="login100-form validate-form">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">اسم نقطة البيع (صاحب المحل)</label>
            <input type="text" class="form-control" id="pos_name" name="pos_name" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">نوع البطاقة</label>
            <input type="number" class="form-control" id="pos_card_type" name="pos_card_type" autocomplete="off" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">عدد البطاقات المراد بيعها</label>
            <input type="number" class="form-control" id="pos_card_quantity" name="pos_card_quantity" autocomplete="off" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">المبلغ الاجمالي ( بالشيكل )</label>
            <input type="number" class="form-control" id="pos_card_total" name="pos_card_total" autocomplete="off" require>
        </div>
        <button type="submit" class="btn btn-primary">بيــع</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>        

</div>


@endsection