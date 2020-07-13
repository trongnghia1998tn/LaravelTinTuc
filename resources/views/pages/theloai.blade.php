@extends('layout.index')
@section('title')
    {{ $theloai1->Ten }} | VnExpress
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #f5f5f5; color: #9F224E;">
                        <h2 style="margin-top:0px; margin-bottom:0px;">{{ $theloai1->Ten }}</h2>
                    </div>
                    @foreach ($loaitin as $item)
                    @if (count($item->tintuc) != 0)
                        <div class="row-item row">
                            <div class="col-md-12">
                                <a href="loaitin/{{ $item->id }}/{{ $item->TenKhongDau }}.html"><h3 style="margin-bottom: 0px;">{{ $item->Ten }}</h3></a>

                                <?php
                                $data = $item->tintuc->where('idLoaiTin',$item->id)->sortByDesc('id')->take(3);
                                ?>

                                @foreach ($data->all() as $item1)
                                <div class="col-md-4">
                                    <a href="tintuc/{{ $item1->id }}/{{ $item1->TieuDeKhongDau }}.html"><h3 style="font-size: 16px; color: #9F224E;">{{ $item1->TieuDe }}</h3></a>
                                    <i style="padding-left:15px;">{{ $item1->created_at }}</i>
                                    <p>{{ $item1->TomTat }}</p>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="break"></div>
                        </div>
                    @endif
                    @endforeach
                    

                    {{-- <div style="text-align: center;">{{ $loaitin->links() }}</div> --}}

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection
    
