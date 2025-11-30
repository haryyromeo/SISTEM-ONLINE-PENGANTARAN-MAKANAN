<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProfileController extends Controller
{
    public function index()
    {
        $seller = Auth::guard('seller')->user();

        return view('seller.profile', compact('seller'));
    }
}
