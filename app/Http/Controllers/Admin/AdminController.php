<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\AdminMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function about()
    {
        return view('admin.about');
    }
    public function login()
    {
        return view('admin.adminProfile.login');
    }

    public function profile()
    {
        return view('admin.adminProfile.profile');
    }
    public function profile_submit(Request $request)
    {
        $authData = Auth::guard('admin')->user();
        $admin = Admin::where('email', $authData->email)->first();
        //dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required | email',
                'gender' => 'required',
                'dob' => 'required|date'
            ]);

            if ($request->password != '') {
                $request->validate([
                    'password' => 'required|min:5|confirmed',
                    'password_confirmation' => 'required ',

                ]);
                $admin->password = Hash::make($request->password);
            }
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpg,png,jpeg|max:512'
                ]);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $admin->image);
                if (file_exists($image_path) && !empty($admin->image)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('image')->extension();
                $img_name = date('YmdHis') . '.' . $ext_name;

                $request->file('image')->move(public_path('uploads/'), $img_name);

                $admin->image = $img_name;
            }
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->gender = $request->gender;
            $admin->dob = $request->dob;
            $admin->update();

            return redirect()->route('admin.profile')->with('success', 'Profile updated successfully !');
        }
    }

    public function login_submit(Request $request)
    {
        if ($request->isMethod('post')) {
            //validating data
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]);

            //checking data
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }

            return back()->withErrors([
                'fail' => 'The provided credentials do not match our records.'
            ])->onlyInput();
        }
        return redirect()->back();
    }

    public function forgot()
    {
        return view('admin.adminProfile.forgot-password');
    }
    public function forgot_submit(Request $request)
    {
        if ($request->isMethod('post')) {
            $admin = Admin::where('email', $request->email)->first();
            if (!$admin) {
                return redirect()->back()->withErrors([
                    'fail' => 'Email not found'
                ])->onlyInput();
            }
            // Generate a token number and replace backslash $
            $token = str_replace('/', '$', Hash::make('echo365'));
            // update to the database
            $admin->token = $token;
            $admin->update();

            // Send email
            $subject = 'Reset Password';
            $reset_url = url('admin/reset-password/'.$token.'/'.$request->email);
            Mail::to($request->email)->send(new AdminMail($subject, $reset_url));

            return redirect()->back()->with('success', 'Email sent successfully ! Please check.');
        }
        return redirect()->route('admin.login');
    }

    public function reset($token, $email)
    {
        $data = Admin::where('email', $email)->where('token', $token)->first();
        if (!$data) {
            return redirect()->route('admin.login')->withErrors([
                'fail' => 'This link are not vaild'
            ]);
        }

        return view('admin.adminProfile.reset-password', compact('email', 'token'));
    }
    public function reset_submit(Request $request)
    {
        //dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|min:5',
                'rt-password' => 'required|min:5'
            ]);

            $data = Admin::where('email', $request->email)->where('token', $request->token)->first();
            $data->password = Hash::make($request->password);
            $data->token = '';
            $data->update();
            return redirect()->route('admin.login')->with('success', 'Password reset successfully !');
        }
        return redirect()->route('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
