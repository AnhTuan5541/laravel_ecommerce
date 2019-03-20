<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;


class AdminController extends Controller
{
    public function login(Request $req){
        if($req->isMethod('post')){
            if(Auth::guard('admin')->attempt(['email'=>$req->email, 'password'=>$req->password, 'account'=>'1'])){
                return redirect('admin/dashboard');
            }
            elseif(Auth::guard('admin')->attempt(['email'=>$req->email, 'password'=>$req->password, 'account'=>'0'])){
                return redirect('admin')->with('error_messenger', 'Your account is not permitted');
            }
            else{
                return redirect('admin')->with('error_messenger', 'Email or Password is not correct');
            }
        }
        return view('admin.login');
    }

    public function getDashboard(){
        return view('admin.dashboard');
    }

    public function setting(Request $req){
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'pwd'=>'min:6|max:32',
                    'new_pwd'=>'min:6|max:32',
                    'confirm_pwd'=>'required|same:new_pwd'
                ],
                [
                    'pwd.min'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'pwd.max'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'new_pwd.min'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'new_pwd.max'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'confirm_pwd.required'=>'Bạn chưa nhập lại mật khẩu',
                    'confirm_pwd.same'=>'Mật khẩu nhập lại chưa khớp'
                ]);
            if(Hash::check($req->pwd, Auth::guard('admin')->user()->password)){
                Auth::guard('admin')->user()->password = bcrypt($req->new_pwd);
                Auth::guard('admin')->user()->save();
                return redirect('admin/setting')->with('success_messenger','Change password successfully');
            }
            else{
                return redirect('admin/setting')->with('error','Password is not correct');
            }
        }
        return view('admin.setting');
    }

    public function getAccount(){
        $account = User::all();
        return view('admin.account.listAccount', ['account'=>$account]);
    }

    public function addAccount(Request $req){
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'password'=>'required|min:6|max:32',
                    'email'=>'required|email|unique:users,email',
                    'confirm_password'=>'required|same:password'
                ],
                [
                    'password.min'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'password.max'=>'Mật khẩu phải có từ 6 đến 32 kí tự',
                    'confirm_password.required'=>'Bạn chưa nhập lại mật khẩu',
                    'confirm_password.same'=>'Mật khẩu nhập lại chưa khớp'
                ]);
            $account = new User;
            $account->name = substr($req->email, 0, strpos($req->email, '@'));
            $account->email = $req->email;
            $account->account = $req->account;
            $account->password = bcrypt($req->password);
            $account->save();
            return back()->with('success_messenger','Add new account successfully');
        }
        return view('admin.account.addAccount');
    }

    public function deleteAccount($id){
        $account = User::find($id);
        $account->delete();
        return back()->with('success_messenger','Delete account successfully');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
