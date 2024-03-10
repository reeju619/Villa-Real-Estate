<?php

namespace App\Http\Controllers;
use App\Models\PropertyDetail;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class SearchPropertyController extends Controller
{
    public function search(Request $request)
    {
        try {
            $query = $request->get('query');
            $filterResult = PropertyDetail::where('property_name', 'LIKE', '%' . $query . '%')
                                ->orWhere('category_name', 'LIKE', '%' . $query . '%')
                                ->get(['id', 'property_name', 'category_name', 'property_image']);

            return Response::json($filterResult);
        } catch (\Exception $e) {
            // Temporarily return the error message for debugging
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}
