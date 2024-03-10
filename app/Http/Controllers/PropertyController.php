<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyDetail;

class PropertyController extends Controller
{
    public function index(){
        // Fetch 6 properties from the database
        $properties = PropertyDetail::all();

        // Pass the properties to the view
        return view('frontend.property', compact('properties'));
    }

    /**
     * Show the details for a specific property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPropertyDetails($id)
    {
        // Fetch the property detail by ID
        $property = PropertyDetail::findOrFail($id);

        // Pass the property detail to the view
        return view('frontend.property-details', compact('property'));
    }


}
