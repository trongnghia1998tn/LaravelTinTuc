@extends('layout.index')
@section('title')
{{ $tintuc->TieuDe }} | VnExpress
@endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-lg-9">
            <div>
                <p><a href="theloai/{{ $theloai->id }}/{{ $theloai->TenKhongDau }}.html" style="font-family: Arial, Helvetica, sans-serif; font-size:32px; font-weight: 700; color: #9f224e;">{{ $theloai->Ten }} </a><span class="fa fa-angle-right" style="font-size: 24px;color: #9f224e;"></span><a
                        href="loaitin/{{ $loaitin->id }}/{{ $loaitin->TenKhongDau }}.html" style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight: 700; color: #9f224e;"><i> {{ $loaitin->Ten }}</i></a> </p>
            </div>
            <!-- Title -->
            <h1 style="font-weight: bold">{{ $tintuc->TieuDe }}</h1>

            <!-- Author -->
            <p class="lead" style="text-align: right;">
                <i>Số lượt xem: {{ $tintuc->SoLuotXem+1 }}</i>
            </p>

            <p style="font-size: 18px; color: gray;">
                {{ $tintuc->TomTat }}
            </p>

            {{-- <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{ $tintuc->Hinh }}" alt=""
            style="width:70%; margin: auto;"> --}}

            <!-- Date/Time -->
            <p style="margin-top: 10px;">{{ $tintuc->created_at }}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $tintuc->NoiDung !!}</p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if (Auth::check())
            <div class="well">
                @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="comment/{{ $tintuc->id }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            <hr>
            <!-- Posted Comments -->
            @else
            <div style="text-align: center; color: blue; font-family: 'Roboto', sans-serif; font-weight: bold;"><i>
                    <p>Vui lòng <u><a href="dangnhap" style="color:red;">đăng nhập</a></u> để viết bình luận</p>
                </i>
            </div>
            <hr>

            @endif

            <!-- Comment -->
            @foreach ($tintuc->comment as $item)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object"
                        src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/64x64/earth.png"
                        alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading" style="font-weight: bold;">{{ $item->user->name }}
                        <small>{{ $item->created_at }}</small>
                    </h4>
                    {{ $item->NoiDung }}
                </div>
            </div>
            @endforeach
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    @foreach ($tinlienquan as $item)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html">
                                <img class="img-responsive" src="upload/tintuc/{{ $item->Hinh }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html"><b
                                    class="tentinlienquan">{{ $item->TieuDe }}</b></a>
                        </div>
                        <p class="tentinlienquan">{{ $item->TomTat }}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">

                    @foreach ($tinnoibat as $item)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html">
                                <img class="img-responsive" src="upload/tintuc/{{ $item->Hinh }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html"><b
                                    class="tentinlienquan">{{ $item->TieuDe }}</b></a>
                        </div>
                        <p class="tentinlienquan">{{ $item->TomTat }}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection