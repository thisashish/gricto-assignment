<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyOTPController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    // public function verifyOTP(Request $request)
    // {
    //     // Logic to verify OTP
    //     // For now, let's just print the OTP
    //     $otp = $request->otp;
    //     echo "OTP: " . $otp;
    // }


    public function verifyOTP(Request $request)
    {
        $validatedData = $request->validate([
            'otp' => 'required|numeric|digits:4', // Assuming OTP is 4 digits numeric
        ]);

        $otp = $request->session()->get('otp');

        if ($otp == $request->otp) {
            // Correct OTP, redirect to dashboard
            return redirect('/dashboard');
        } else {
            // Incorrect OTP, redirect back with error message
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }

}
