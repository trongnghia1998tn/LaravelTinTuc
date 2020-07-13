<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
        $slide = Slide::all();
        return view('admin.slide.them',['slide'=>$slide]);
    }
    
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'Ten' => 'required',
            'NoiDung' => 'required'
        ],
        [
            'Ten.required' => 'Bạn chưa nhập tên',
            'NoiDung.required' => 'Bạn chưa nhập nội dung'
        ]);

        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if ($request->has('link'))
        {
            $slide->link = $request->link;
        }

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if ($duoianh != 'jpg' && $duoianh != 'png' && $duoianh != 'jpeg')
            {
                return redirect('admin/slide/them')->with('thongbao','Bạn tải file không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str::random(4)."_".$name;
            while (file_exists("upload/slide/".$hinh))
            {
                $hinh = str::random(4)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            $slide->Hinh = $hinh;
        }
        else
        {
            $slide-> Hinh = "";
        }

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Bạn đã thêm slide thành công');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,[
            'Ten' => 'required',
            'NoiDung' => 'required'
        ],
        [
            'Ten.required' => 'Bạn chưa nhập tên',
            'NoiDung.required' => 'Bạn chưa nhập nội dung'
        ]);

        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if ($request->has('link'))
        {
            $slide->link = $request->link;
        }

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if ($duoianh != 'jpg' && $duoianh != 'png' && $duoianh != 'jpeg')
            {
                return redirect('admin/slide/them')->with('thongbao','Bạn tải file không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str::random(4)."_".$name;
            while (file_exists("upload/slide/".$hinh))
            {
                $hinh = str::random(4)."_".$name;
            }
            unlink("upload/slide/".$slide->Hinh);
            $file->move("upload/slide",$hinh);
            $slide->Hinh = $hinh;
        }

        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Bạn đã sửa slide thành công');
        
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa slide thành công');
    }
}
