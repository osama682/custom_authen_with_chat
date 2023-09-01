<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForgetPasswordController extends Controller
{
    public function email()
    {
        return view('enterEmail');
    }

    public function otp(Request $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();
        session(['change_user' => $user]);
        if ($user) {
            $randomNumber = random_int(100000, 999999);
            $details = [
                'title' => 'Your OTP is ' . $randomNumber,
                'body' => 'This is for testing email using smtp'
            ];
            $otp = new Otp();
            $otp->otp = $randomNumber;
            $otp->save();
            \Mail::to($email)->send(new \App\Mail\OTPMail($details));


            Session::flash('profile-update', 'OTP has send to Mail!');
            return view('otp_enter_page');
        } else {
            Session::flash('email-failed', 'Mail not Found! Try again');
            return redirect()->route('enter-email');
        }
    }

    public function verifyOtp(Request $request)
    {
        $otp = $request->otp;
        $latest_db_otp = Otp::latest()->first();
        $latest_otp = $latest_db_otp->otp;
        if ($otp && $otp == $latest_otp) {
            Session::flash('otp-success', 'Otp Verification Success!');
            $latest_db_otp->delete();
            return view('change_passwords');
        } else {
            Session::flash('otp-failed', 'Invalid OTP! try again');
            return view('otp_enter_page');
        }

    }

    public function changePasswords()
    {
        return view('change_passwords');
    }

    public function checkPasswords(Request $request)
    {
        $user = session('change_user');

        $user->password = $request['password'];
        $user->save();
        session()->forget('change_user');
        Session::flash('password-change-success', 'Password changed Successfully!');
        return redirect()->route('login');
    }
}
