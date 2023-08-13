@extends('layouts.app')
@section('content')

<style>
    .wrap-login100 {
        padding: 100px 130px 33px 95px;
    }

    .container-login100 {
        padding: 20px 0 0 0;
        min-height: 20vh;
    }

    .login100-form {
        padding: 0px 130px 0px 130px;
    }

    body {
        background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .form-select {
        padding: 7px;
        height: 12rem;
    }

    .table td,
    .table th {
        padding: 1.75rem;
    }

    .personal_expense,
    .w_salaries,
    .internet_subscription,
    .Mobile_accessories {
        display: none;
    }
</style>

<div class="limiter">
    <div class="container-login100 row justify-content-center align-items-center">

        <!-- The Main expense Option -->
        <div class="wrap-login100 row justify-content-center align-items-center option" id="option" name="option">
            <h2>الرجاء اختيار أحد المصروفات التالية</h2>
            <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                <tr>
                    <th><button type="button" class="btn btn-danger" id="personal_expenses" name="personal_expenses">مصروف شخصي</button></th>
                    <th><button type="button" class="btn btn-danger" id="workers_salaries" name="workers_salaries">رواتب عمال</button></th>
                    <th><button type="button" class="btn btn-danger">مصروفات محل</button></th>
                </tr>
                <tr>
                    <th><button type="button" class="btn btn-danger" id="Mobile_accessoriess" name="Mobile_accessoriess">مصروفات اكسسوارات جوال</button></th>
                    <th><button type="button" class="btn btn-danger">مصروفات مكسرات</button></th>
                    <th><button type="button" class="btn btn-danger">مصروفات شبكات</button></th>
                </tr>
                <tr>
                    <th><button type="button" class="btn btn-danger">مصروف شرائح جوال</button></th>
                    <th><button type="button" class="btn btn-danger" id="internet_subscriptions" name="internet_subscriptions">دفع اشتراكات انترنت</button></th>
                    <th><button type="button" class="btn btn-danger">مصروفات كهرباء</button></th>
                    <!-- <th colspan="2"><button type="button" class="btn btn-danger">دفع اشتراكات كهرب</button></th> -->
                </tr>
            </table>
        </div>

        <!-- The personal expense Option -->

        <div class="wrap-login100 row justify-content-center align-items-center personal_expense" id="personal_expense" name="personal_expense">
            <form action="/add_personal_expense" method="POST" class="validate-form">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                    <tr>
                        <th>المبلغ الشخصي المراد صرفه</th>
                    </tr>
                    <tr>
                        <td><input type="number" name="personal_expense_total" id="personal_expense_total" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success">صرف المبلغ</button></td>
                    </tr>
                    <tr>
                        <td><button type="button" name="back" id="back" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The workers salaries expense Option -->
        <div class="wrap-login100 row justify-content-center align-items-center w_salaries" id="w_salaries" name="w_salaries">
            <form action="/add_workers_salarie" method="POST" class="validate-form" style="width: max-content;">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                    <tr>
                        <th colspan="4">ادخال اسم العامل مع قيمة الراتب</th>
                    </tr>
                    <tr>
                        <th>اسم العامل</th>
                        <td><input type="text" name="name_workers_salarie" id="name_workers_salarie" class="form-control" autocomplete="off" required></td>
                        <th>راتب العامل</th>
                        <td><input type="number" name="workers_salarie_total" id="workers_salarie_total" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">صرف المبلغ</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back1" id="back1" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The internet subscriptions expense Option -->
        <div class="wrap-login100 row justify-content-center align-items-center internet_subscription" id="internet_subscription" name="internet_subscription" style="padding: 100px 130px 33px 10px;">
            <form action="/add_internet_sub" method="POST" class="validate-form" style="width: max-content;">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                    <tr>
                        <th colspan="4">اختيار مزود الخدمة والمبلغ المدفوع له</th>
                    </tr>
                    <tr>
                        <th>اسم الشركة المزودة</th>
                        <td><select class="form-select" multiple aria-label="multiple select example" name="internet_sub_salarie" id="internet_sub_salarie" required>
                                <option disabled>----اختيار أحد شركات مزودي الخدمة----</option>
                                <option value="al_aitisalat">الاتصالات</option>
                                <option value="fusion">فيوجن</option>
                                <option value="speed_click">سبيد كليك</option>
                                <option value="net_streem">نت ستريم</option>
                                <option value="mada">مدى</option>
                                <option value="city_net">ستي نت</option>
                                <option value="digital_comunication">ديجيتال كمونيكيشن</option>
                                <option value="new_star_max">نيو ستار ماكس</option>
                                <option value="alpha">ألفا</option>
                                <option disabled>--------------------------------</option>
                            </select></td>
                        <th>المبلغ المدفوع</th>
                        <td><input type="number" name="internet_sub_total" id="internet_sub_total" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">صرف المبلغ</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back1" id="back1" class="btn btn-warning">رجوع</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- The Mobile accessories expense Option -->
        <div class="wrap-login100 row justify-content-center align-items-center Mobile_accessories" id="Mobile_accessories" name="Mobile_accessories">
            <form action="/add_mobile_accessories" method="POST" class="validate-form" style="width: max-content;">
                @csrf
                <table class="table table-striped table-hover table-bordered" style="text-align-last: center;direction: rtl;">
                    <tr>
                        <th colspan="4">مصروفات اكسسوارات الجوال</th>
                    </tr>
                    <tr>
                        <td colspan="4"><select class="form-select" multiple aria-label="multiple select example" name="accessories_name" id="accessories_name" required>
                                <option disabled>----اختيار أحد الأصناف----</option>
                                @foreach ($mobile_accessories_items as $mobile_accessories_items)
                                <option value="{{$mobile_accessories_items->value}}">{{$mobile_accessories_items->product}}</option>
                                @endforeach
                                <option disabled>--------------------------------</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th>الكمية</th>
                        <td><input type="number" name="accessories_amount" id="accessories_amount" class="form-control" autocomplete="off" required></td>
                        <th>السعر</th>
                        <td><input type="number" name="accessories_total" id="accessories_total" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <th>ملاحظات</th>
                        <td colspan="3"><input type="text" name="remm" id="remm" class="form-control" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success">صرف المبلغ</button></td>
                    </tr>
                    <tr>
                        <td colspan="4"><button type="button" name="back1" id="back1" class="btn btn-warning">رجوع</button></td>
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
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".option").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".option").css("display", "block");
        }
    })

    $("#personal_expenses").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".option").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".personal_expense").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".option").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".personal_expense").css("display", "block");
        }
    });
    $("#workers_salaries").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".w_salaries").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".w_salaries").css("display", "block");
        }
    });
    $("#internet_subscriptions").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".internet_subscription").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".Mobile_accessories").css("display", "none");
            $(".internet_subscription").css("display", "block");
        }
    });
    $("#Mobile_accessoriess").click(function() {
        var $this = $(this);
        if ($this.data('clicked')) {
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "block");
        } else {
            $this.data('clicked', true);
            $(".option").css("display", "none");
            $(".personal_expense").css("display", "none");
            $(".w_salaries").css("display", "none");
            $(".internet_subscription").css("display", "none");
            $(".Mobile_accessories").css("display", "block");
        }
    });
</script>
@endsection