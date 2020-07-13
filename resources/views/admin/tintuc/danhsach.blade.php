    @extends('admin.layout.index')
    @section('content')
    
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Tóm tắt</th>
                            <th>Ảnh</th>
                            <th>Loại tin</th>
                            <th>Thể loại</th>
                            <th>Lượt xem</th>
                            <th>Nổi bật</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tintuc as $item)
                            <tr class="odd gradeX" align="center">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->TieuDe }}</td>
                                    <td>{{ $item->TomTat }}</td>
                                    <td>
                                        <div><img src="upload/tintuc/{{ $item->Hinh }}" width="100px"></div>
                                    </td>
                                    <td>{{ $item->loaitin->Ten }}</td>
                                    <td>{{ $item->loaitin->theloai->Ten }}</td>
                                    <td>{{ $item->SoLuotXem }}</td>
                                    <td>
                                        @if ($item->NoiBat == 0)
                                            {{ 'Không' }}
                                        @else
                                            {{ 'Có' }}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{ $item->id }}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{ $item->id }}"> Sửa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    @endsection