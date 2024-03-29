<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createCustomer(Request $request)
    {
        // Validate the request data
        $request->validate([
            'phone' => 'required|numeric|unique:customers',
            'password' => 'required|min:8',
        ]);
    
        // Create a new customer
        $customer = new Customer();
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password); // Hash the password
        $customer->save();
    
        // Do something with the $customer object
        
        // Return a response or redirect
    }
    
}
