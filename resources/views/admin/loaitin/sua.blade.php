@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại tin:
                        <small>{{ $loaitin->Ten }}</small>
                    </h1>
                </div>
                
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{ $item }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif

                    <form action="admin/loaitin/sua/{{ $loaitin->id }}" method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai">
                                @foreach ($theloai as $item)
                                    <option
                                        @if ($loaitin->idTheLoai == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">{{ $item->Ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên loại tin sau khi thay đổi</label>
                            <input class="form-control" name="Ten" value="{{ $loaitin->Ten }}" />
                        </div>
                        <button type="submit" class="btn btn-success">Thay đổi</button>
                        <a href="admin/loaitin/danhsach"><button type="button" class="btn btn-danger"> Quay lại</button></a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection