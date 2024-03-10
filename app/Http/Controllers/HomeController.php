<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyDetail;

class HomeController extends Controller
{
    public function index(){
         // Fetch 6 properties from the database
         $properties = PropertyDetail::paginate(6);
        //  $properties = PropertyDetail::all();


         // Pass the properties to the view
         return view('frontend.home', compact('properties'));
    }

    public function searchProperty(Request $request)
{
    $query = $request->query('query');

    // Search for the property by name or category
    $property = PropertyDetail::where('property_name', 'like', "%$query%")
                              ->orWhere('category_name', 'like', "%$query%")
                              ->first();

    if ($property) {
        return response()->json(['success' => true, 'property_id' => $property->id]);
    } else {
        return response()->json(['success' => false]);
    }
}

}
