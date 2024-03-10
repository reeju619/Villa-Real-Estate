<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyDetailsController extends Controller
{
    public function index(){
        return view('frontend.property-details');
    }
}
