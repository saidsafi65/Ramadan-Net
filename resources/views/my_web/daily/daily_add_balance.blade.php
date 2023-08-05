@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 5px 130px 0px 130px;
    }

    .form-select {
        padding: 7px;
        height: 8rem;
    }
</style>
<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: right;">
    <form action="add_balance" method="POST" class="login100-form validate-form" name="myForm" id="myForm" onsubmit="return validateForm()">
        @csrf
        <div class="mb-3">
            @foreach ($jawal as $jawal)
            <label for="exampleInputEmail1" class="form-label">رصيد جوال المتبقي</label>
            <input type="number" class="form-control" id="remaining_jawal" name="remaining_jawal" value="{{ $jawal->remaining_balance}}" autocomplete="off" readonly>
            <input type="number" class="form-control" id="new_balance_jawal" name="new_balance_jawal" value="{{ $jawal->new_balance}}" autocomplete="off" readonly hidden>
            @endforeach
            @foreach ($ooredoo as $ooredoo)
            <label for="exampleInputEmail1" class="form-label">رصيد وطنية المتبقي</label>
            <input type="number" class="form-control" id="remaining_ooredoo" name="remaining_ooredoo" value="{{ $ooredoo->remaining_balance}}" autocomplete="off" readonly>
            <input type="number" class="form-control" id="new_balance_ooredoo" name="new_balance_ooredoo" value="{{ $ooredoo->new_balance}}" autocomplete="off" readonly hidden>
            @endforeach
            @foreach ($electricity as $electricity)
            <label for="exampleInputEmail1" class="form-label">رصيد الكهرباء المتبقي</label>
            <input type="number" class="form-control" id="remaining_electricity" name="remaining_electricity" value="{{ $electricity->remaining_balance}}" autocomplete="off" readonly>
            <input type="number" class="form-control" id="new_balance_electricity" name="new_balance_electricity" value="{{ $electricity->new_balance}}" autocomplete="off" readonly hidden>
            @endforeach
        </div>
        <select class="form-select" multiple aria-label="multiple select example" name="balance_type" id="balance_type" require>
            <option disabled>--------اختيار أحد أنواع الأرصدة المراد شراؤها-------</option>
            <option value="jawal_balance">رصيد جوال</option>
            <option value="ooredoo_balance">رصيد وطنية</option>
            <option value="electricity_balance">رصيد كهرباء</option>
            <option disabled>--------------------------------</option>
        </select>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">المبلغ المراد شحنه مثلا (100 شيكل رصيد)</label>
            <input type="number" class="form-control" id="balance_mount" name="balance_mount" autocomplete="off" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">سعر المبلغ الذي تم شحنه مثلا (100 شيكل ب 70 شيكل)</label>
            <input type="number" class="form-control" id="balance_total" name="balance_total" autocomplete="off" require>
        </div>
        <select class="form-select" multiple aria-label="multiple select example" name="balance_dealer" id="balance_dealer" onchange="jsfunc1()" require>
            <option disabled>--------اختيار أحد أنواع طرف البائع-------</option>
            <option value="from_company">من الشركة</option>
            <option value="from_dealer">من تاجر</option>
            <option value="from_someone">من أحد الأشخاص</option>
            <option disabled>--------------------------------</option>
        </select>
        <div class="mb-3 balance_dealer_input">
            <label for="exampleInputEmail1" class="form-label">اسم البائع</label>
            <input type="text" class="form-control" id="dealer_name" name="dealer_name" value="" autocomplete="off" require>
            <label for="exampleInputEmail1" class="form-label">رقم جوال البائع</label>
            <input type="number" class="form-control" id="dealer_jawal" name="dealer_jawal" value="" autocomplete="off" require>
            <label for="exampleInputEmail1" class="form-label">رقم هوية البائع (ان وجد)</label>
            <input type="number" class="form-control" id="dealer_id" name="dealer_id" value="" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">شـــراء</button>

        <script>
            $(".balance_dealer_input").css("display", "none");

            function jsfunc1() {
                if (document.getElementById('balance_dealer').value == "from_company") {
                    $(".balance_dealer_input").css("display", "none");
                    $("#dealer_name").val("---");
                    $("#dealer_jawal").val("0000");
                    $("#dealer_id").val("0000");
                }
                if (document.getElementById('balance_dealer').value == "from_dealer") {
                    $(".balance_dealer_input").css("display", "block");
                    $("#dealer_name").val("");
                    $("#dealer_jawal").val("");
                    $("#dealer_id").val("");
                }
                if (document.getElementById('balance_dealer').value == "from_someone") {
                    $(".balance_dealer_input").css("display", "block");
                    $("#dealer_name").val("");
                    $("#dealer_jawal").val("");
                    $("#dealer_id").val("");
                }
            }
        </script>
        <input type="text" class="form-control" id="day_balance" name="day_balance" value="<?= date('l', strtotime(date('Y-m-d'))); ?>" hidden readonly>
        <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
    </form>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["balance_type"].value;
            if (x == "") {
                alert("الرجاء التأكد من اختيار أحد أنواع الأرصدة");
                return false;
            }
            var x = document.forms["myForm"]["balance_dealer"].value;
            if (x == "") {
                alert("الرجاء التأكد من اختيار طرف البائع");
                return false;
            }
            var x = document.forms["myForm"]["balance_mount"].value;
            if (x == "") {
                alert("الرجاء التأكد من ادخال كمية الرصيد");
                return false;
            }
            var x = document.forms["myForm"]["balance_total"].value;
            if (x == "") {
                alert("الرجاء التأكد من ادخال سعر الشراء");
                return false;
            }
            var x = document.forms["myForm"]["dealer_name"].value;
            if (x == "") {
                alert("الرجاء التأكد من ادخال اسم التاجر");
                return false;
            }
            var x = document.forms["myForm"]["dealer_jawal"].value;
            if (x == "") {
                alert("الرجاء التأكد من ادخال رقم جوال البائع");
                return false;
            }
            var x = document.forms["myForm"]["dealer_id"].value;
            if (x == "") {
                alert("الرجاء التأكد من ادخال رقم هوية البائع");
                return false;
            }
        }
    </script>
</div>


@endsection