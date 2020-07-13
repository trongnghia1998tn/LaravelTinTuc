@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide:
                    <small>{{ $slide->Ten }}</small>
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
                        <br>
                        <a href="admin/slide/danhsach"><em> Quay Lại </em></a>
                    </div>
                @endif

                <form action="admin/slide/sua/{{ $slide->id }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên" value="{{ $slide->Ten }}"/>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="4" name="NoiDung">
                            {{ $slide->NoiDung }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p><img width="450px" src="upload/slide/{{ $slide->Hinh }}"></p>
                        <input type="file" name="Hinh">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập tên" value="{{ $slide->link }}"/>
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <a href="admin/slide/danhsach"><button type="button" class="btn btn-danger"> Quay lại</button></a>
                <form>
            </div>
        </div>
        <!-- /.row -->
        
    </div>
    <!-- /.container-fluid -->
</div>

@endsection