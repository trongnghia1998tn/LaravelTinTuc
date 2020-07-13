<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
        return view('admin.user.them');
    }

    public function postThem(Request $request)
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
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;

        $user->save();
        
        return redirect('admin/user/them/'.$request->id)->with('thongbao','Thêm mới user thành công');
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;

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
        
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa người dùng thành công');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
    }

    public function getdangnhapAdmin()
    {
        return view('admin.login');
    }

    public function postdangnhapAdmin(Request $request)
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('admin/theloai/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
