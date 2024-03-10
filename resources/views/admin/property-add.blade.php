@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2>Add Property</h2>

        <!-- Property Add Form -->
        <form method="post" action="{{ route('admin.property.add') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="property_name">Property Name</label>
                <input type="text" class="form-control" id="property_name" name="property_name" required>
            </div>

            <div class="form-group">
                <label for="property_image">Property Image</label>
                <input type="file" class="form-control" id="property_image" name="property_image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area" name="area" required>
            </div>

            <div class="form-group">
                <label for="floor">Floor</label>
                <input type="number" class="form-control" id="floor" name="floor" required>
            </div>

            <div class="form-group">
                <label>Parking</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="parking" id="parking_3" value="3 spots" >
                    <label class="form-check-label" for="parking_3">3 spots</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="parking" id="parking_6" value="6 spots">
                    <label class="form-check-label" for="parking_6">6 spots</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="parking" id="parking_8" value="8 spots">
                    <label class="form-check-label" for="parking_8">8 spots</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="parking" id="parking_10" value="10 spots">
                    <label class="form-check-label" for="parking_10">10 spots</label>
                </div>
            </div>

            <div class="form-group">
                <label for="bhk">BHK</label>
                <select class="form-control" id="bhk" name="bhk" required>
                    <option value="2">2 BHK</option>
                    <option value="3">3 BHK</option>
                    <option value="4">4 BHK</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('title')
Add Property
@endsection

@push('add-style')
<link rel="stylesheet" href="{{ asset('admin/css/property-add.css') }}">
@endpush
