@extends('layout.index')
@section('title')
    {{ $loaitin->Ten }} | VnExpress
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #f5f5f5; color: #9F224E;">
                        <a style="font-family: Arial, Helvetica, sans-serif;
                        font-weight: 700;
                        color: #9f224e;
                        font-size: 32px;
                        line-height: 1.25;" href="theloai/{{ $loaitin->theloai->id }}/{{ $loaitin->theloai->TenKhongDau }}.html"> {{ $loaitin->theloai->Ten }}  </a>
                        <span class="fa fa-angle-right" style="font-size: 24px"></span>
                        <i style="font-size: 20px; font-weight: bold;">  {{ $loaitin->Ten }}</i>
                    </div>
                    @foreach ($tintuc as $item)
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="tintuc/{{ $item['id'] }}/{{ $item['TieuDeKhongDau'] }}.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{ $item->Hinh }}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <a href="tintuc/{{ $item['id'] }}/{{ $item['TieuDeKhongDau'] }}.html"><h3>{{ $item->TieuDe }}</h3></a>
                                {{-- <i style="padding-left:15px;">{{ $item->created_at }}</i> --}}
                                <p>{{ $item->TomTat }}</p>
                            </div>
                            <div class="break"></div>
                        </div>
                    @endforeach
                    

                    <div style="text-align: center;">{{ $tintuc->links() }}</div>

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection
    
