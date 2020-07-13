@extends('layout.index')
@section('title')
    Đăng nhập | VnExpress
@endsection
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder1" style="min-height: 550px; padding-top: 100px;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">Đăng nhập</div>
                <div class="panel-body">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                        {{ $item }}<br>
                        @endforeach
                    </div>
                    @endif

                    @if (session('thongbao'))
                    <div class="alert alert-danger">
                        {{ session('thongbao') }}
                    </div>
                    @endif
                    <form action="dangnhap" method="POST">
                        {{ csrf_field() }}
                        <div>
                            {{-- <label>Email</label> --}}
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <br>
                        <div>
                            {{-- <label>Mật khẩu</label> --}}
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        </div>
                        <br>
                            <button type="submit" class="btn btn-lg btn-success btn-block" style="font-size: 15px">Đăng nhập
                            </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection