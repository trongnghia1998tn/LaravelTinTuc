<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use Illuminate\Support\Str;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
        $tintuc = TinTuc::orderby('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],[
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TieuDe.min'=>'Tiêu đề cần có ít nhất 3 ký tự',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại',
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if ($duoianh != 'jpg' && $duoianh != 'png' && $duoianh != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('thongbao','Bạn tải file không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str::random(4)."_".$name;
            while (file_exists("upload/tintuc/".$hinh))
            {
                $hinh = str::random(4)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            $tintuc->Hinh = $hinh;
        }
        else
        {
            $tintuc-> Hinh = "";
        }

        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã thêm tin tức thành công');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id)
    {
        $tintuc = TinTuc::find($id);

        $this->validate($request,[
            'TieuDe'=>'required|min:3',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],[
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TieuDe.min'=>'Tiêu đề cần có ít nhất 3 ký tự',
        ]);

        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if ($duoianh != 'jpg' && $duoianh != 'png' && $duoianh != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('thongbao','Bạn tải file không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str::random(4)."_".$name;
            while (file_exists("upload/tintuc/".$hinh))
            {
                $hinh = str::random(4)."_".$name;
            }
            // unlink("upload/tintuc",$tintuc->Hinh);

            $file->move("upload/tintuc",$hinh);
            $tintuc->Hinh = $hinh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Bạn đã sửa tin tức thành công. ');
    }

    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa tin tức thành công');
    }
}
