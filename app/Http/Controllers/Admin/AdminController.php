<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(){
        // echo'<pre>'; print_r(Auth::guard('admin')->user()->email); exit; // get complete data
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        // return view('admin.settings.update_admin_password', compact('adminDetails'))->with(compact('adminDetails'));

        return view('admin.settings.update_admin_password', compact('adminDetails'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // $request->validate([        // Default Laravel form validation with Default error message:
            //     'title' => 'bail|required|unique:posts|max:255',
            //     'body' => 'required',
            // ]);

            $rules = [
                'email'=> 'required|email|max:225',
                'password'=> 'required'
            ];

            $customMessage = [
                'email.required'=> 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required'=> ' Password is required'
            ];

            $this->validate($request, $rules, $customMessage);
            if (Auth::guard('admin')->attempt(['email' => $data["email"], 'password' => $data["password"], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with("error_message", "Invalid email or password");
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/logout');
    }
}
