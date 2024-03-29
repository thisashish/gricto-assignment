<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Send OTP for login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendOTP(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        // Find user by phone number
        $user = User::where('phone', $request->phone)->first();

        // If user not found, return error response
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Update user's OTP field (assuming you have an 'otp' column in the users table)
        $user->update(['otp' => $otp]);

        // Return the generated OTP
        return response()->json(['otp' => $otp]);
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}
