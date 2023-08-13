@extends('layouts.app')
@section('content')


<style>
    .wrap-login100 {
        padding: 100px 130px 33px 95px;
    }

    .container-login100 {
        width: 100%;
        min-height: 50vh;
    }

    body {
        background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .sims_card1,
    .sims_card2,
    .sims_card3,
    .sims_card4 {
        display: none;
    }
</style>

<div class="limiter">
    <div class="container-login100 row justify-content-center align-items-center">
        <div class="wrap-login100 row justify-content-center align-items-center option" id="option" name="option">
            <h2>الرجاء اختيار أحد الشرائح التالية لإضافة رصيد لها</h2>
            <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                <tr>
                    <th><button type="button" class="btn btn-danger" id="sim_card1" name="sim_card1">الشريحة الأولى</button></th>
                    <th><button type="button" class="btn btn-danger" id="sim_card2" name="sim_card2">الشريحة الثانية</button></th>
                    <th><button type="button" class="btn btn-danger" id="sim_card3" name="sim_card3">الشريحة الثالثة</button></th>
                    <th><button type="button" class="btn btn-danger" id="sim_card4" name="sim_card4">الشريحة الرابعة</button></th>
                </tr>
            </table>
        </div>

        <!-- The sim_card1 Option -->
        <div class="wrap-login100 row justify-content-center align-items-center sims_card1" id="sims_card1" name="sims_card1">
            <form action="/add_sims_card1" method="POST" class="validate-form">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                @foreach ($sims_card1 as $sims_card1)
                    <tr>
                        <th>الرصيد المتوفر</th>
                        <td colspan="3">{{$sims_card1->TOTAL}} شيكل</td>
                    </tr>
                @endforeach
                    <tr>
                        <th>المبلغ المراد اضافته الى الشريحة الأولى</th>
                        <td><input type="number" name="sims_card1_total" id="sims_card1_total" class="form-control" autocomplete="off" required></td>
                        <th>المبلغ المصروف للرصيد</th>
                        <td><input type="number" name="sims_card1_expens" id="sims_card1_expens" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><span>تفاصيل</span></td>
                        <td colspan="3"><input type="text" name="sims_card1_remm" id="sims_card1_remm" class="form-control" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">شراء</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back" id="back" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The sim_card2 Option -->
        <div class="wrap-login100 row justify-content-center align-items-center sims_card2" id="sims_card2" name="sims_card2">
            <form action="/add_sims_card2" method="POST" class="validate-form">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                @foreach ($sims_card2 as $sims_card2)
                    <tr>
                        <th>الرصيد المتوفر</th>
                        <td colspan="3">{{$sims_card2->TOTAL}} شيكل</td>
                    </tr>
                @endforeach
                    <tr>
                        <th>المبلغ المراد اضافته الى الشريحة الثانية</th>
                        <td><input type="number" name="sims_card2_total" id="sims_card2_total" class="form-control" autocomplete="off" required></td>
                        <th>المبلغ المصروف للرصيد</th>
                        <td><input type="number" name="sims_card2_expens" id="sims_card2_expens" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><span>تفاصيل</span></td>
                        <td colspan="3"><input type="text" name="sims_card2_remm" id="sims_card2_remm" class="form-control" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">شراء</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back" id="back" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The sim_card3 Option -->
        <div class="wrap-login100 row justify-content-center align-items-center sims_card3" id="sims_card3" name="sims_card3">
            <form action="/add_sims_card3" method="POST" class="validate-form">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                @foreach ($sims_card3 as $sims_card3)
                    <tr>
                        <th>الرصيد المتوفر</th>
                        <td colspan="3">{{$sims_card3->TOTAL}} شيكل</td>
                    </tr>
                @endforeach
                    <tr>
                        <th>المبلغ المراد اضافته الى الشريحة الثالثة</th>
                        <td><input type="number" name="sims_card3_total" id="sims_card3_total" class="form-control" autocomplete="off" required></td>
                        <th>المبلغ المصروف للرصيد</th>
                        <td><input type="number" name="sims_card3_expens" id="sims_card3_expens" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><span>تفاصيل</span></td>
                        <td colspan="3"><input type="text" name="sims_card3_remm" id="sims_card3_remm" class="form-control" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">شراء</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back" id="back" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The sim_card4 Option -->
        <div class="wrap-login100 row justify-content-center align-items-center sims_card4" id="sims_card4" name="sims_card4">
            <form action="/add_sims_card4" method="POST" class="validate-form">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                @foreach ($sims_card4 as $sims_card4)
                    <tr>
                        <th>الرصيد المتوفر</th>
                        <td colspan="3">{{$sims_card4->TOTAL}} شيكل</td>
                    </tr>
                @endforeach
                    <tr>
                        <th>المبلغ المراد اضافته الى الشريحة الرابعة</th>
                        <td><input type="number" name="sims_card4_total" id="sims_card4_total" class="form-control" autocomplete="off" required></td>
                        <th>المبلغ المصروف للرصيد</th>
                        <td><input type="number" name="sims_card4_expens" id="sims_card4_expens" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><span>تفاصيل</span></td>
                        <td colspan="3"><input type="text" name="sims_card4_remm" id="sims_card4_remm" class="form-control" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">شراء</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back" id="back" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<script>
    $('button[id^="back"]').click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "block");
        }
    });
    $("#sim_card1").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".sims_card1").css("display", "block");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        } else {
            $this.data('clicked', true);
            $(".sims_card1").css("display", "block");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        }
    });
    $("#sim_card2").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "block");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        } else {
            $this.data('clicked', true);
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "block");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        }
    });
    $("#sim_card3").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "block");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        } else {
            $this.data('clicked', true);
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "block");
            $(".sims_card4").css("display", "none");
            $(".option").css("display", "none");
        }
    });
    $("#sim_card4").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "block");
            $(".option").css("display", "none");
        } else {
            $this.data('clicked', true);
            $(".sims_card1").css("display", "none");
            $(".sims_card2").css("display", "none");
            $(".sims_card3").css("display", "none");
            $(".sims_card4").css("display", "block");
            $(".option").css("display", "none");
        }
    });
</script>
@endsection