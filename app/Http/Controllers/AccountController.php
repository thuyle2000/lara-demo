<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
        }

        $email = $request->email;
        $pwd = $request->password;

        $user = DB::table('tbaccount')->where('email', $email)->first();
        if ($user != null && $user->password == $pwd) {
            session(['user' => $user]);
            // return redirect('login')->with('message', "Welcome Mr/Ms  $user->fullname !");

            //phan nhanh chuc nang theo middleware
            if ($user->role == 1) {
                // return redirect('admin/users');
                return redirect()->route('adminuserlist');
            } else {
                // return redirect("user/details/" . $user->accountid);
                return redirect()->route('userprofile', ['id' => $user->accountID]);
            }
        } else {
            return redirect('login')->with('message', 'Login Fail.');
        }
    }

    //for role admin
    public function users()
    {
        $users = DB::table('tbaccount')->get();
        return view('admin.userList')->with(['users' => $users]);
    }

    public function displayAddUser()
    {
        return view('admin.userAdd');
    }

    public function addUser(Request $request)
    {

        $email = $request->email;
        $pwd = $request->password;
        $fullname = $request->fullname;
        $role = $request->role;
        $active = $request->active;

        DB::table('tbaccount')->insert([
            'email' => $email,
            'password' => $pwd,
            'fullname' => $fullname,
            'role' => intval($role),
            'active' => intval($active)
        ]);

        return redirect('admin/users');
    }

    public function resetPassword($id)
    {
        DB::table('tbaccount')
            ->where('accountID', $id)->where('role','!=',1)
            ->update(['password' => '#999zzz']);
 
        // return redirect()->action([AccountController::class, 'users']);
        return redirect()->route('adminuserlist')->with('message', 'Change Password Finished !');
    }

    //for role users
    public function details($id)
    {
        $user = DB::table('tbaccount')
            ->where('accountID', $id)->first();
        return view('user/profile')->with(['user' => $user]);
    }


    public function logout()
    {
        session()->forget("user");
        return redirect("login");
    }
}
