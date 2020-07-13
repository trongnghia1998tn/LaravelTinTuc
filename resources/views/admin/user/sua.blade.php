@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User:
                    <small>{{ $user->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                    {{ $item }}<br>
                    @endforeach
                </div>
                @endif

                @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif

                <form action="admin/user/sua/{{ $user->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{ $user->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Email (không thể sửa)</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn" value="{{ $user->email }}" readonly=""/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Đổi mật khẩu</label>
                        <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu mới của bạn" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control password" name="repassword" placeholder="Nhập lại mật khẩu" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline" style="text-indent: 10px">
                            <input name="quyen" value="0"
                                @if ($user->quyen == 0)
                                    {{ "checked" }}
                                @endif
                            type="radio">Thành viên
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1"
                                @if ($user->quyen == 1)
                                    {{ "checked" }}
                                @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success"> Sửa</button>
                    <a href="admin/user/danhsach"><button type="button" class="btn btn-danger"> Quay lại</button></a>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection


@section('script')
    <script>
        $(document).ready(function()
        {
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection