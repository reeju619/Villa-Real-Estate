<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\PropertyDetail;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function fetchCategoryNames()
    {
        $categories = PropertyDetail::distinct('category_name')->pluck('category_name');
        return response()->json(['success' => true, 'categories' => $categories]);
    }

    public function fetchPropertiesByCategory($category)
    {
        $properties = PropertyDetail::where('category_name', $category)->pluck('property_name');
        return response()->json(['success' => true, 'properties' => $properties]);
    }

}
