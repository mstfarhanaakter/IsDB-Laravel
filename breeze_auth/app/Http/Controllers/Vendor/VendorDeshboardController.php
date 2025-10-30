<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorDeshboardController extends Controller
{
     public function index()
    {
        return view('vendor.dashboard');
    }
}
