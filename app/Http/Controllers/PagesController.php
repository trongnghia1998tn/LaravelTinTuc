<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    //
    public function trangchu()
    {
        // $theloai = TheLoai::all();
        return view('pages.trangchu');
    }

    public function lienhe()
    {
        // $theloai = TheLoai::all();
        return view('pages.lienhe');
    }

    public function theloai($id)
    {
        $theloai1 = TheLoai::find($id);
        $loaitin = LoaiTin::where('idTheLoai',$id)->get();
        foreach ($loaitin as $item)
        {
            $tintuc = TinTuc::where('idLoaiTin',$item->id)->orderBy('id','desc')->take(3)->get();
        }
        return view('pages.theloai',['theloai1'=>$theloai1,'loaitin'=>$loaitin,'tintuc'=>$tintuc ]);
    }

    public function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->orderBy('id','desc')->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $loaitin = $tintuc->loaitin;
        $theloai = $loaitin->theloai;
        $tinnoibat = TinTuc::where('NoiBat',1)->orderByDesc('id')->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->where('id','!=',$id)->orderByDesc('id')->take(4)->get();
        DB::table('tintuc')->where('id',$id)->update(['SoLuotXem'=>$tintuc->SoLuotXem + 1]);
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function getDangnhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'password.required' => 'Bạn chưa nhập password'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Sai email hoặc mật khẩu');
        }
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function getNguoidung()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            return view('pages.nguoidung',['nguoidung'=>$user]);
        }
        else
        {
            return redirect('dangnhap');
        }
    }

    public function postNguoidung(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;

        if($request->changePassword == "on")
        {
            $this->validate($request,
            [
                'password'=>'required|min:6|max:16',
                'repassword'=>'required|same:password'
            ],
            [
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu có không quá 16 ký tự',
                'repassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'repassword.same' => 'Mật khẩu không trùng khớp'
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        
        
        return redirect('nguoidung')->with('thongbao','Sửa người dùng thành công');
    }

    public function getDangky()
    {
        return view('pages.dangky');
    }

    public function postDangky(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:16',
            'repassword'=>'required|same:password'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu có không quá 16 ký tự',
            'repassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu không trùng khớp'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->password = Hash::make($request->password);
        $user->quyen = 0;

        $user->save();
        
        return redirect('dangnhap')->with('thanhcong','Đăng ký thành công');
    }

    function getTimKiem(Request $request)
    {
        $tukhoa = $request->get('tukhoa');
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
