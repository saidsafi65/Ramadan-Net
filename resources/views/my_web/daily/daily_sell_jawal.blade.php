@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 5px 130px 0px 130px;
    }
</style>

@if ($key == '1')
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form action="/add_selling_jawal" method="POST" class="login100-form validate-form">
        @csrf
        <h2>رصيد جوال</h2>
        <div class="mb-3">
            @foreach ($jawal as $jawal)
            <label for="exampleInputEmail1" class="form-label">الرصيد المتبقي</label>
            <input type="number" class="form-control" id="remaining_jawal" name="remaining_jawal" value="{{$jawal->remaining_jawal}}" autocomplete="off" readonly require>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">الرصيد المباع (المبلغ بالشيكل)</label>
            <input type="number" class="form-control" id="jawal_selling_total" name="jawal_selling_total" autocomplete="off" require>
        </div>
        <input type="text" class="form-control" id="day_selling_jawal" name="day_selling_jawal" value="<?= date('l', strtotime(date('Y-m-d'))); ?>" hidden readonly>
        <button type="submit" class="btn btn-primary">بيــع</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
</div>
@endif

@if ($key == '2')
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form method="POST" action="/add_selling_ooredoo" class="login100-form validate-form">
        @csrf
        <h2>رصيد وطنية</h2>
        <div class="mb-3">
            @foreach ($ooredoo as $ooredoo)
            <label for="exampleInputEmail1" class="form-label">الرصيد المتبقي</label>
            <input type="number" class="form-control" id="remaining_ooredoo" name="remaining_ooredoo" value="{{$ooredoo->remaining_ooredoo}}" autocomplete="off" readonly require>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">الرصيد المباع (المبلغ بالشيكل)</label>
            <input type="number" class="form-control" id="ooredoo_selling_total" name="ooredoo_selling_total" autocomplete="off" require>
        </div>
        <input type="text" class="form-control" id="day_selling_ooredoo" name="day_selling_ooredoo" value="<?= date('l', strtotime(date('Y-m-d'))); ?>" hidden readonly>
        <button type="submit" class="btn btn-primary">بيــع</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
</div>
@endif


@if ($key == '3')
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form method="POST" action="/add_selling_electricity" class="login100-form validate-form">
        @csrf
        <h2>رصيد كهرباء</h2>
        <div class="mb-3">
            @foreach ($electricity as $electricity)
            <label for="exampleInputEmail1" class="form-label">الرصيد المتبقي</label>
            <input type="number" class="form-control" id="remaining_electricity" name="remaining_electricity" value="{{$electricity->remaining_electricity}}" autocomplete="off" readonly require>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">الرصيد المباع (المبلغ بالشيكل)</label>
            <input type="number" class="form-control" id="electricity_selling_total" name="electricity_selling_total" autocomplete="off" require>
        </div>
        <input type="text" class="form-control" id="day_selling_electricity" name="day_selling_electricity" value="<?= date('l', strtotime(date('Y-m-d'))); ?>" hidden readonly>
        <button type="submit" class="btn btn-primary">بيــع</button>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
</div>
@endif

@endsection