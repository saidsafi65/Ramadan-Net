@extends('layouts.app')
@section('content')
<style>
    .wrap-login100 {
        padding: 5px 30px 0px 30px;
        width: inherit;
    }
</style>

<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;">
    <div class="container" style="direction: rtl;text-align: center;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            اضافة راوتر جديد
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">اضافة راوتر جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="add_ip_routers/?name={{$_GET['name']}}&key={{$key}}" method="POST" class="form validate-form" style="direction: ltr;">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">عنوان الراوتر</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="router_ip" name="router_ip" aria-describedby="inputGroup-sizing-default" required >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">اسم الراوتر</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="router_names" name="router_names" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الأول</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub1" name="router_sub1" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الثاني</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub2" name="router_sub2" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الثالث</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub3" name="router_sub3" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الرابع</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub4" name="router_sub4" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الخامس</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub5" name="router_sub5" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك السادس</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub6" name="router_sub6" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="حفظ">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-bordered" style="text-align-last: center;">
        <tr>
            <th colspan="11">{{$_GET['name']}}</th>
        </tr>
        <tr>
            <th>عنوان الراوتر</th>
            <th>اسم الراوتر</th>
            <th>المشترك رقم 1</th>
            <th>المشترك رقم 2</th>
            <th>المشترك رقم 3</th>
            <th>المشترك رقم 4</th>
            <th>المشترك رقم 5</th>
            <th>المشترك رقم 6</th>
            <th>التعديلات</th>
        </tr>
        @foreach ($ip_routers_data as $ip_routers_data)
        <tr>
            <td>{{$ip_routers_data->router_ip}}</td>
            <td>{{$ip_routers_data->router_names}}</td>
            <td>{{$ip_routers_data->router_sub1}}</td>
            <td>{{$ip_routers_data->router_sub2}}</td>
            <td>{{$ip_routers_data->router_sub3}}</td>
            <td>{{$ip_routers_data->router_sub4}}</td>
            <td>{{$ip_routers_data->router_sub5}}</td>
            <td>{{$ip_routers_data->router_sub6}}</td>
            <td><a data-toggle="modal" data-id="{{$ip_routers_data->id}}" href="#UserEditDialog{{$ip_routers_data->id}}" class="btn btn-primary">تعديل</a></td>
        </tr>
        <div class="modal fade" id="UserEditDialog{{$ip_routers_data->id}}" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تعديل على حساب رقم {{$ip_routers_data->id}}</h4>
                    </div>
                    <div class="modal-body">
                        <form action="edit_ip_routers/{{$ip_routers_data->id}}" method="POST" class="form validate-form" style="direction: ltr;">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">عنوان الراوتر</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="router_ip" name="router_ip" aria-describedby="inputGroup-sizing-default" value="{{$ip_routers_data->router_ip}}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">اسم الراوتر</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="router_names" name="router_names" value="{{$ip_routers_data->router_names}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الأول</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub1" name="router_sub1" aria-label="Default" value="{{$ip_routers_data->router_sub1}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الثاني</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub2" name="router_sub2" aria-label="Default" value="{{$ip_routers_data->router_sub2}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الثالث</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub3" name="router_sub3" aria-label="Default" value="{{$ip_routers_data->router_sub3}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الرابع</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub4" name="router_sub4" aria-label="Default" value="{{$ip_routers_data->router_sub4}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك الخامس</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub5" name="router_sub5" aria-label="Default" value="{{$ip_routers_data->router_sub5}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">المشترك السادس</span>
                                </div>
                                <input type="text" class="form-control" id="router_sub6" name="router_sub6" aria-label="Default" value="{{$ip_routers_data->router_sub6}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="تعديل">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </table>
    <button type="button" class="btn btn-danger" onclick="history.go(-1)">رجوع</button>
</div>

<script>
    $(document).on("click", ".user_dialog", function() {
        var UserName = $(this).data('id');
        $(".modal-body #user_name").val(UserName);
    });
    $(document).ready(function() {
        // target the link
        $(".toggle_hide_password").on('click', function(e) {
            e.preventDefault()

            // get input group of clicked link
            var input_group = $(this).closest('.input-group')

            // find the input, within the input group
            var input = input_group.find('input.form-control')

            // find the icon, within the input group
            var icon = input_group.find('i')

            // toggle field type
            input.attr('type', input.attr("type") === "text" ? 'password' : 'text')

            // toggle icon class
            icon.toggleClass('fa-eye-slash fa-eye')
        })
    })
</script>
@endsection