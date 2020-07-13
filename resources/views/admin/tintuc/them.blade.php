    @extends('admin.layout.index')
    @section('content')
    
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức:
                        <small>Thêm</small>
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

                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Chọn thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                                <option value="">Chọn thể loại</option>
                                @foreach ($theloai as $item)
                                    <option value="{{ $item->id }}">{{ $item->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn loại tin</label>
                            <select class="form-control" name="LoaiTin" id="LoaiTin">
                                @foreach ($loaitin as $item)
                                    <option value="{{ $item->id }}">{{ $item->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="5" name="TomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="form-control ckeditor" name="NoiDung"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="Hinh">
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" checked="" type="radio">Không 
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" type="radio">Có
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                        <a href="admin/tintuc/danhsach"><button type="button" class="btn btn-danger"> Quay lại</button></a>
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
                $("#TheLoai").change(function()
                {
                    var idTheLoai = $(this).val();
                    $.get("admin/ajax/loaitin/"+idTheLoai,function(data)
                    {
                        $("#LoaiTin").html(data);
                    });
                });
            });
        </script>
    @endsection