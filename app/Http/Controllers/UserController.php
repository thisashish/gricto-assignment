<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $this->generateAndDisplayOTP($user->phone);

        // Redirect to a page to enter OTP for verification
        return redirect()->route('verification.show');
    }

    /**
     * Generate and display OTP.
     *
     * @param  string  $phone
     * @return void
     */
    protected function generateAndDisplayOTP($phone)
    {
        $otp = Str::random(6);
        echo "Generated OTP for phone number $phone: $otp"; // Display OTP in console
    }
}
