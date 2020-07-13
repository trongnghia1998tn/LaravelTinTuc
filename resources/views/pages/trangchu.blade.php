@extends('layout.index')
@section('title')
Trang chủ | VnExpress
@endsection

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row main-left">

        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#white; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức</h2>
                </div>

                <div class="panel-body">
                    @foreach ($theloai as $item)
                    @if (count($item->loaitin) != 0)
                    <!-- item -->
                    <div class="row-item row">
                        <h3>
                            <a href="theloai/{{ $item->id }}/{{ $item->TenKhongDau }}.html"
                                id="linktheloai">{{ $item->Ten }}</a> |
                            @foreach ($item->loaitin as $item1)
                            @if (count($item1->tintuc) != 0)
                            <small style="padding: 6px; font-size:18px;"><a
                                    href="loaitin/{{ $item1->id }}/{{ $item1->TenKhongDau }}.html"
                                    id="linkloaitin">{{ $item1->Ten }}</a></small>
                            @endif
                            @endforeach
                        </h3>
                        <?php
                                    $data = $item->tintuc->where('NoiBat',1)->sortByDesc('id')->take(4);
                                    $tin1 = $data->shift();

                                    ?>

                        <div class="col-md-8 border-right">
                            <div class="col-md-5 image">
                                <a href="tintuc/{{ $tin1['id'] }}/{{ $tin1['TieuDeKhongDau'] }}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{ $tin1['Hinh']}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-7">
                                <a href="tintuc/{{ $tin1['id'] }}/{{ $tin1['TieuDeKhongDau'] }}.html">
                                    <h3>{{ $tin1['TieuDe'] }}</h3>
                                </a>
                                <p>{{ $tin1['TomTat'] }}</p>
                                {{-- <a class="btn btn-primary"
                                    href="tintuc/{{ $tin1['id'] }}/{{ $tin1['TieuDeKhongDau'] }}.html">Xem thêm <span
                                    class="glyphicon glyphicon-chevron-right"></span></a> --}}
                            </div>

                        </div>

                        @foreach ($data->all() as $item)
                        <div class="col-md-4">

                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html" id="tinlienquan">
                                <div class="col-md-1">
                                    <img src="upload/tintuc/{{ $item['Hinh']}}"
                                        style="max-width: 80px; margin: 10px auto" class="center-block">
                                </div>
                                <div class="col-md-4 col-md-offset-3 linktinlienquan" style="font-weight: bold;">
                                    {{ $item['TieuDe'] }}
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endif

                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="space20"></div>
    
    {{-- @include('layout.slide') --}}
</div>
<!-- end Page Content -->
@endsection