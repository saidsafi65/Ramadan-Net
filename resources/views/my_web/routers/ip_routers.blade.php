@extends('layouts.app')
@section('content')
<style>
    .wrap-login100 {
        padding: 5px 30px 0px 30px;
    }
</style>

<div class="wrap-login100 row justify-content-center align-items-center internets" style="direction: rtl;">
    <div class="container" style="direction: rtl;text-align: center;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            اضافة موقع جديد
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
                        <form action="add_ip_routers" method="POST" class="form validate-form" style="direction: ltr;">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">الوصف</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="remm" name="remm" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">اسم المستخدم</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" id="user_name" name="user_name" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">كلمة المرور</span>
                                </div>
                                <input type="text" class="form-control" id="passwords" name="passwords" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
    <table class="table table-striped table-hover" style="text-align-last: center;">
        <tr>
            <th>الحارة</th>
            <th>العرض</th>
        </tr>
        @foreach ($ip_routers as $ip_routers)
        <tr>
            <td>{{$ip_routers->router_location}}</td>
            <td><button type="button" class="btn btn-primary" onclick="window.location.href = '{{route('ip_routers_location',['key'=>$ip_routers->router_location_number,'name'=>$ip_routers->router_location])}}' " >عرض التفاصيل</button></td>
        </tr>
        @endforeach
    </table>
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