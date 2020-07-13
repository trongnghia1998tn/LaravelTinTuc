@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')
            <?php
                function doimau($str,$tukhoa)
                {
                    return str_replace($tukhoa,"<span style='color:red;'>$tukhoa</span>",$str);
                }
            ?>
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white; text-indent: 5px;">
                        <h4><b>Tìm kiếm: {{ $tukhoa }}</b></h4>
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
                                <a href="tintuc/{{ $item['id'] }}/{{ $item['TieuDeKhongDau'] }}.html"><h3>{!! doimau($item->TieuDe,$tukhoa) !!}</h3></a>
                                <p>{!! doimau($item->TomTat,$tukhoa) !!}</p>
                                <a class="btn btn-primary" href="tintuc/{{ $item['id'] }}/{{ $item['TieuDeKhongDau'] }}.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                    @endforeach
                    

                    <div style="text-align: center;">
                        {{-- {{ $tintuc->links() }} --}}
                        {{ $tintuc->appends(Request::all())->links() }}
                    </div>

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection
    
