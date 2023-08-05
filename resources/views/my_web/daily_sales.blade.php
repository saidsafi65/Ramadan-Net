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

    .internets,
    .snakss,
    .P_O_S,
    .gifts,
    .mounts {
        display: none;
        margin-top: 10px;
    }

    .login100-form {
        padding: 0px 130px 0px 130px;
    }

    .btn-group .btn {
        margin: 10px;
    }

    .login100-form {
        width: 100%;
    }

    body {
        background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .form-select {
        padding: 7px;
        height: 12rem;
    }
</style>

<div class="limiter">
    <div class="container-login100 row justify-content-center align-items-center">

        <!-- The Main 4 Option -->
        <div class="wrap-login100 row justify-content-center align-items-center">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary border border-light" id="internet">
                    <h1><input type="radio" name="internet" id="option1"> الانترنت</h1>
                </label>
                <label class="btn btn-primary border border-light" id="snaks">
                    <h1><input type="radio" name="snaks" id="option2"> المكسرات</h1>
                </label>
                <label class="btn btn-primary border border-light" id="mounts">
                    <h1><input type="radio" name="mounts" id="option3"> الأرصدة</h1>
                </label>
                <label class="btn btn-primary border border-light" id="gifts">
                    <h1><input type="radio" name="gifts" id="option4"> تبرعات وهبات</h1>
                </label>
            </div>
        </div>

        <!-- For internets Sale -->
        <div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;text-align: center;">
            <form action="" method="POST" class="login100-form validate-form">
                <h2>الرجاء اختيار أحد الأوامر التالية:</h3>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary border border-light" id="cards">
                            <input type="radio" name="cards" id="option1"> البطاقات
                        </label>
                        <label class="btn btn-primary border border-light" id="home_net">
                            <input type="radio" name="home_net" id="option2"> الاشتراكات المنزلية
                        </label>
                        <label class="btn btn-primary border border-light" id="P_O_S">
                            <input type="radio" name="P_O_S" id="option3"> بطاقات نقاط البيع
                        </label>
                    </div>
                    <script>
                        $("#cards").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_cards') }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_cards') }}";
                                location.href = url;
                            }
                        });
                        $("#home_net").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_home_net') }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_home_net') }}";
                                location.href = url;
                            }
                        });
                        $("#P_O_S").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_P_O_S') }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_P_O_S') }}";
                                location.href = url;
                            }
                        });
                    </script>
            </form>
        </div>

        <!-- For snaks Sale -->
        <div class="wrap-login100 row justify-content-center align-items-center snakss" style="direction: rtl;text-align: center;">
            <form action="add_snaks" method="POST" class="login100-form validate-form" name="myForm" id="myForm" onsubmit="return validateForm()">
                <h2>الرجاء اختيار أحد المكسرات التالية:</h3>
                    <select class="form-select" multiple aria-label="multiple select example" name="snaks_type" id="snaks_type" required>
                        <option disabled>--------------------------------</option>
                        <option value="coffe">قهوة</option>
                        <option value="Nescafe">نسكافيه</option>
                        <option value="Sun_seed">بزر شمس</option>
                        <option value="watermelon_seeds">بزر بطيخ</option>
                        <option value="mixed_nuts">مكسرات</option>
                        <option disabled>--------------------------------</option>
                    </select>
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">الوزن بالجرام (أو عدد اذا كان مشروب)</label>
                        <input type="text" class="form-control" id="snaks_weight" name="snaks_weight" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">المبلغ الاجمالي</label>
                        <input type="text" class="form-control" id="snaks_prise" name="snaks_prise" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-success">بيــع</button>
            </form>
            <script>
                function validateForm() {
                    var x = document.forms["myForm"]["snaks_type"].value;
                    if (x == "") {
                        alert("الرجاء التأكد من اختيار أحد المكسرات");
                        return false;
                    }
                    var x = document.forms["myForm"]["snaks_weight"].value;
                    if (x == "") {
                        alert("الرجاء التأكد من ادخال الوزن أو رقم المشروب");
                        return false;
                    }
                    var x = document.forms["myForm"]["snaks_prise"].value;
                    if (x == "") {
                        alert("الرجاء التأكد من ادخال السعر");
                        return false;
                    }
                }
            </script>
        </div>

        <!-- For gifts Sale -->
        <div class="wrap-login100 row justify-content-center align-items-center gifts" style="direction: rtl;text-align: center;">
            <form action="add_gift" method="POST" class="login100-form validate-form" name="myForms" id="myForms" onsubmit="return validateForm()">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">المبلغ المراد التبرع به</label>
                    <input type="number" class="form-control" id="gift_total" name="gift_total" required>
                    <input type="text" class="form-control" id="gift_day" name="gift_day" value="<?= date('l', strtotime(date('Y-m-d'))); ?>" hidden readonly>
                </div>
                <button type="submit" class="btn btn-success">تبــــرع</button>
            </form>
            <script>
                function validateForm() {
                    var x = document.forms["myForms"]["gift_total"].value;
                    if (x == "") {
                        alert("الرجاء التأكد من ادخال مبلغ مالي للتبرع");
                        return false;
                    }
                }
            </script>
        </div>

        <!-- For mounts Sale -->
        <div class="wrap-login100 row justify-content-center align-items-center mounts" style="direction: rtl;text-align: center;">
            <form action="" method="POST" class="login100-form validate-form">
                <h2>الرجاء اختيار أحد الأوامر التالية:</h3>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary border border-light" id="add_balance">
                            <input type="radio" name="add_balance" id="option1"> اضافة رصيد جوال أو وطنية أو رصيد كهرباء
                        </label>
                        <label class="btn btn-primary border border-light" id="jawal">
                            <input type="radio" name="jawal" id="option2"> رصيد جوال
                        </label>
                        <label class="btn btn-primary border border-light" id="ooredoo">
                            <input type="radio" name="ooredoo" id="option3"> رصيد وطنية
                        </label>
                        <label class="btn btn-primary border border-light" id="electricity_balance">
                            <input type="radio" name="electricity_balance" id="option4"> رصيد كهرباء
                        </label>
                    </div>
                    <script>
                        $("#add_balance").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_add_balance') }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_add_balance') }}";
                                location.href = url;
                            }
                        });
                        $("#jawal").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_sell_jawal',['key'=>1]) }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_sell_jawal',['key'=>1]) }}";
                                location.href = url;
                            }
                        });
                        $("#ooredoo").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_sell_jawal',['key'=>2]) }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_sell_jawal',['key'=>2]) }}";
                                location.href = url;
                            }
                        });
                        $("#electricity_balance").click(function() {
                            var $this = $(this);
                            if ($this.data('clicked')) {
                                var url = "{{ route('daily_sell_jawal',['key'=>3]) }}";
                                location.href = url;
                            } else {
                                $this.data('clicked', true);
                                var url = "{{ route('daily_sell_jawal',['key'=>3]) }}";
                                location.href = url;
                            }
                        });
                    </script>
            </form>
        </div>

        <script>
            $("#internet").click(function() {
                var $this = $(this);
                if ($this.data('clicked')) {
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".internets").css("display", "block");
                } else {
                    $this.data('clicked', true);
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".internets").css("display", "block");
                }
            });

            $("#snaks").click(function() {
                var $this = $(this);
                if ($this.data('clicked')) {
                    $(".internets").css("display", "none");
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".snakss").css("display", "block");
                } else {
                    $this.data('clicked', true);
                    $(".internets").css("display", "none");
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".snakss").css("display", "block");
                }
            });

            $("#mounts").click(function() {
                var $this = $(this);
                if ($this.data('clicked')) {
                    $(".internets").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "block");
                } else {
                    $this.data('clicked', true);
                    $(".internets").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".gifts").css("display", "none");
                    $(".mounts").css("display", "block");
                }
            });

            $("#gifts").click(function() {
                var $this = $(this);
                if ($this.data('clicked')) {
                    $(".internets").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".gifts").css("display", "block");
                } else {
                    $this.data('clicked', true);
                    $(".internets").css("display", "none");
                    $(".snakss").css("display", "none");
                    $(".mounts").css("display", "none");
                    $(".gifts").css("display", "block");
                }
            });
        </script>

    </div>
</div>
@endsection