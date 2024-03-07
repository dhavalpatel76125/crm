<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{

    public function index(Request $request)
    {

        $affiliate_code = 'BBC' . time();

        if ($request->code) {
            $user = User::where('affiliate_code', $request->code)->first();
            $referedUserId = $user->id;
            return view('register', compact('affiliate_code', 'referedUserId'));
        }

        return view('register', compact('affiliate_code'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'city' => 'required',
            'phonenumber' => 'required',
            'affiliatecode' => 'required',
        ]);


        $user = new User;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->country = 'India';
        $user->city = $request->city;
        $user->phone_number = $request->phonenumber;
        $user->affiliate_code = $request->affiliatecode;
        if ($request->referred_by) {
            $user->referred_by = $request->referred_by;
        }
        $user->save();

        // send mail 
        Mail::to($request->email)->send(new WelcomeMail($request->firstname));

        return redirect()->route('login')->with('success', 'Registration Successful! Please login to continue.');
    }


    public function login()
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        } else {
            // Authentication failed...
            return back()->withInput($request->only('email'))
                         ->withErrors(['password' => 'Invalid login details']);
        }
    }

    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    //my account
    public function myAccount()
    {
        $userdata = User::where('id', auth()->user()->id)->first();
        return view('admin.myaccount', compact('userdata'));
    }

    //change password post
    public function changePassword(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->newpassword);
        $user->save();
        return back()->with('success', 'Password changed successfully');
    }


    // forgot password
    public function forgotPassword()
    {
        return view('forgotpassword');
    }


    //sendResetLink

    public function sendResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a token
            $token = Str::random(60);

            // Save the token in the password_resets table
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now()
            ]);

            // Construct the reset link
            $resetLink = url('/reset-password?token=' . $token);

            // Send email
            Mail::to($request->email)->send(new ResetPasswordMail($resetLink));
            return back()->with('success', 'Password reset link sent successfully');
 
        } else {
            return back()->with('error', 'Email not found');
        }
    }

    //reset password
    public function resetPassword(Request $request)
    {

        $token = $request->token;
        return view('resetpassword', compact('token'));
    }

    //reset password post
    public function resetPasswordPost(Request $request)
    {

        $this->validate($request, [
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'token' => 'required'
        ]);

        $token = $request->token;

        $tokenData = DB::table('password_reset_tokens')->where('token', $token)->first();

        if ($tokenData) {
            $user = User::where('email', $tokenData->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            DB::table('password_reset_tokens')->where('token', $token)->delete();

            return redirect()->route('login')->with('success', 'Password reset successful');
        } else {
            return back()->with('error', 'Invalid token');
        }
    }
}
