<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Lấy thông tin đang nhập từ request gửi lên từ trình duyệt
        $username = $request->input('username');
        $password = $request->input('password');

        // Kiểm tra thông tin đăng nhập
        if ($username == 'admin' && $password == '123456') {

            //Nếu thông tin đăng nhập chính xác, Tạo một Session xác nhận đăng nhập thành công
            $request->session()->push('login', true);

            // Đi đến route show.blog, để chuyển hướng người dùng đến trang blog
            return redirect()->route('admin.home');
        }

        // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
        $message = 'Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail', $message);

        //Quay trở lại trang đăng nhập
        return redirect()->route('admin.showlogin');
    }

    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        $request->session()->flush();
        return redirect()->route('admin.home');
    }
}
