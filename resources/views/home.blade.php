@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<style>
    body {
        /* margin-top: 20px; */
        background: #eee;
    }
    .col-xl-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 30%;
}
.mb-1 a{
    font-size: 1.5rem;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-aut{
    min-height: 8rem !important;
}
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .width-90 {
        width: 90px !important;
    }

    .rounded-3 {
        border-radius: 0.5rem !important;
    }

    a {
        text-decoration: none;
    }
</style>

<div class="container" style="direction: rtl;">
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('daily_sales') }}">
                            <img src="{{ URL('loginRs/images/4629.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="{{ route('daily_sales') }}" class="text-reset">المبيعات اليومية</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('expenses') }}">
                            <img src="{{ URL('loginRs/images/35564.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="{{ route('expenses') }}" class="text-reset">المصروفات</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="#!.html">
                            <img src="{{ URL('loginRs/images/3D5Wi.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="#!" class="text-reset">حسابات التجار</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="#!.html">
                            <img src="{{ URL('loginRs/images/70ad206e.webp') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="#!" class="text-reset">الديون</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="#!.html">
                            <img src="{{ URL('loginRs/images/961f14e6.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="#!" class="text-reset">شرائح جوال + كهرباء</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="#!.html">
                            <img src="{{ URL('loginRs/images/435gd.webp') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="#!" class="text-reset">الأفرع (نقاط البيع)</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('ip_routers') }}">
                            <img src="{{ URL('loginRs/images/v428px.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="{{ route('ip_routers') }}" class="text-reset">راوترات وعناوينها</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card mb-3 card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('social_media') }}">
                            <img src="{{ URL('loginRs/images/social_media.jpg') }}" class="width-90 rounded-3" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="overflow-hidden flex-nowrap">
                            <h3 class="mb-1">
                                <a href="{{ route('social_media') }}" class="text-reset">حسابات السوشيال</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection