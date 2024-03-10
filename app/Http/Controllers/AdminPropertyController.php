<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\PropertyDetail;

class AdminPropertyController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('search');

    $propertyDetails = PropertyDetail::where(function($queryBuilder) use ($query) {
        $queryBuilder->where('property_name', 'like', "%$query%")
            ->orWhere('category_name', 'like', "%$query%")
            ->orWhere('address', 'like', "%$query%");
    })->paginate(5);

    return view('admin.dashboard', compact('propertyDetails'));
}

    public function showAddForm()
    {
        // Return the add property form view
        return view('admin.property-add');
    }

    public function addProperty(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules here, including checking for file types, etc.
        ]);

        // Get the user type of the logged-in admin
        $userType = auth('admin')->user()->user_type;

        if ($userType === 'admin') {
            // Admin can add properties

            // Log the input value
            \Illuminate\Support\Facades\Log::info('Input Parking Value: ' . $request->input('parking'));

            $imagePath = $request->file('property_image')->store('property_images', 'public');

            PropertyDetail::create([
                'property_name' => $request->input('property_name'),
                'property_image' => $imagePath,
                'category_name' => $request->input('category_name'),
                'price' => $request->input('price'),
                'address' => $request->input('address'),
                'area' => $request->input('area'),
                'floor' => $request->input('floor'),
                'parking' => $request->input('parking'), // Use the string value of the enum
                'bhk' => $request->input('bhk'),
                'user_type' => $userType, // Set the user type
            ]);

            // Log the saved value
            \Illuminate\Support\Facades\Log::info('Saved Parking Value: ' . PropertyDetail::latest()->first()->parking);

            // Redirect to the admin property page
            return redirect()->route('admin.property')->with('success', 'Property added successfully.');

        } else {
            // For editor and viewer, restrict access
            return redirect()->route('admin.property')->with('error', 'You do not have permission to add properties.');
        }
    }


    public function showEditForm($id)
    {
        // Fetch the property detail by ID
        $property = PropertyDetail::findOrFail($id);

        // Return the edit property form view
        return view('admin.property-edit', ['property' => $property]);
    }

    public function editProperty(Request $request, $id)
    {

        $userType = auth('admin')->user()->user_type;

    // Block viewers from editing properties
    if ($userType === 'viewer') {
        return redirect()->route('admin.property')->with('error', 'You do not have permission to edit properties.');
    }

        // Fetch the property detail by ID
        $property = PropertyDetail::findOrFail($id);

        // Validate the form data
        $request->validate([
            // Add validation rules here
        ]);

        // Check if a new image is being uploaded
        if ($request->hasFile('property_image')) {
            // If yes, update the image path
            $imagePath = $request->file('property_image')->store('property_images', 'public');
            $property->update(['property_image' => $imagePath]);
        }

        // Update the other property details
        $property->update([
            'property_name' => $request->input('property_name'),
            'category_name' => $request->input('category_name'),
            'price' => $request->input('price'),
            'address' => $request->input('address'),
            'area' => $request->input('area'),
            'floor' => $request->input('floor'),
            'parking' => $request->input('parking'),
            'bhk' => $request->input('bhk'),
        ]);

        // Redirect to the admin property page
        return redirect()->route('admin.property')->with('success', 'Property updated successfully.');
    }


    public function deleteProperty($id)
    {

        $userType = auth('admin')->user()->user_type;

        // Block viewers from deleting properties
        if ($userType === 'viewer') {
            return redirect()->route('admin.property')->with('error', 'You do not have permission to delete properties.');
        }

        // Fetch the property detail by ID and delete
        PropertyDetail::findOrFail($id)->delete();

        // Redirect to the admin property page
        return redirect()->route('admin.property')->with('success', 'Property deleted successfully.');
    }
}
