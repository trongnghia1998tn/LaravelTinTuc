<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:20',
                'TheLoai' => 'required'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại tin',
                'Ten.unique' => 'Tên loại tin bị trùng, vui lòng nhập lại',
                'Ten.min' => 'Tên loại tin quá ngắn',
                'Ten.max' => 'Tên loại tin quá dài',
                'TheLoai.required' => 'Bạn chưa chọn thể loại'
            ]);

        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Thêm mới thành công');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:20',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại tin',
                'Ten.min' => 'Tên loại tin quá ngắn',
                'Ten.max' => 'Tên loại tin quá dài',
            ]);
        
        
            
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$loaitin->id)->with('thongbao','Sửa thành công');
    }

    public function getXoa ($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công');
    }
}
