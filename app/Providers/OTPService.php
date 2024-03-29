<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OTPService 

{
    public function generateOTP()
    {
        return mt_rand(1000, 9999);
    }

    public function verifyOTP($otp, $userOTP)
    {
        return $otp == $userOTP;
    }
}

// Remove extends ServiceProvider