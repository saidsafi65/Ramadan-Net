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
            اضافة جديد
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">اضافة حساب جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="add_social_media" method="POST" class="form validate-form" style="direction: ltr;">
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
            <th>الوصف</th>
            <th>اسم المستخدم</th>
            <th>كلمة المرور</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>
        @foreach ($social_media as $social_media)
        <tr>
            <td>{{$social_media->remm}}</td>
            <td>{{$social_media->user_name}}</td>
            <td>
                <div class="input-group">
                    <input class="form-control" name="password" type="password" value="{{$social_media->passwords}}" readonly>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a href="#" class="toggle_hide_password">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </td>
            <!-- <td><button type="button" onclick="location.href='https://google.com';" class="btn btn-primary">تعديل</button></td> -->
            <td><a data-toggle="modal" data-id="{{$social_media->id}}" href="#UserEditDialog{{$social_media->id}}" class="btn btn-primary">تعديل</a></td>
            <td><button type="button" class="btn btn-danger">حذف</button></td>
        </tr>
        <div class="modal fade" id="UserEditDialog{{$social_media->id}}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تعديل على حساب رقم {{$social_media->id}}</h4>
                </div>
                <div class="modal-body">
                    <form action="edit_social_media/{{$social_media->id}}" method="POST" class="form validate-form" style="direction: ltr;">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">الوصف</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" id="remm" name="remm" aria-describedby="inputGroup-sizing-default" value="{{$social_media->remm}}" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">اسم المستخدم</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" id="user_name" name="user_name" value="{{$social_media->user_name}}" aria-describedby="inputGroup-sizing-default" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">كلمة المرور</span>
                            </div>
                            <input type="text" class="form-control" id="passwords" name="passwords" aria-label="Default" value="{{$social_media->passwords}}" aria-describedby="inputGroup-sizing-default" required>
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