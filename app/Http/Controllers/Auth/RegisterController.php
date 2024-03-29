<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Providers\OTPService;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['required', 'numeric', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Customer::create([
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // Validate the registration data
        $this->validator($request->all())->validate();

        // Generate OTP
        $otpService = new OTPService();
        $otp = $otpService->generateOTP();

        // Store the OTP in session
        $request->session()->put('otp', $otp);

        // You can log $otp to console or display it in any way you prefer

        // Redirect to OTP verification page
        return view('auth.verify-otp')->with('otp', $otp);
    }
}
