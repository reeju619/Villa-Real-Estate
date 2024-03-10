@extends('admin.layouts.main')


@section('content')
    <div class="container">
        <h2>Edit Property</h2>

        <!-- Property Edit Form -->
        <form method="post" action="{{ route('admin.property.edit', ['id' => $property->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="property_name">Property Name</label>
                <input type="text" class="form-control" id="property_name" name="property_name"
                    value="{{ $property->property_name }}">
            </div>
            <div class="form-group">
                <label for="property_image">Property Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="property_image" name="property_image"
                        accept="image/*">
                    <label class="custom-file-label" for="property_image" id="file-label">
                        {{ $property->property_image ? $property->property_image : 'Choose file' }}
                    </label>
                </div>
            </div>

            <!-- Display the current property image -->
            @if ($property->property_image)
                <img src="{{ asset('storage/' . $property->property_image) }}" alt="Property Image"
                    style="width: 100px; height: 100px;">
            @endif

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                    value="{{ $property->category_name }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $property->price }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ $property->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area" name="area" value="{{ $property->area }}">
            </div>

            <div class="form-group">
                <label for="floor">Floor</label>
                <input type="number" class="form-control" id="floor" name="floor" value="{{ $property->floor }}">
            </div>

            <div class="form-group">
                <label>Parking</label><br>
                @foreach (['3 spots', '6 spots', '8 spots', '10 spots'] as $spots)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="parking"
                            id="parking_{{ str_replace(' ', '_', $spots) }}" value="{{ $spots }}"
                            {{ $property->parking == $spots ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="parking_{{ str_replace(' ', '_', $spots) }}">{{ $spots }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="bhk">BHK</label>
                <select class="form-control" id="bhk" name="bhk">
                    <option value="2" {{ $property->bhk == 2 ? 'selected' : '' }}>2 BHK</option>
                    <option value="3" {{ $property->bhk == 3 ? 'selected' : '' }}>3 BHK</option>
                    <option value="4" {{ $property->bhk == 4 ? 'selected' : '' }}>4 BHK</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection

@section('title')
    Edit Property
@endsection


@push('edit-style')
    <link rel="stylesheet" href="{{ asset('admin/css/property-edit.css') }}">
    <style>
        #file-label {
            margin-left: 10px;
            color: #777;
            word-wrap: break-word;
        }
    </style>
@endpush

@push('edit-script')
    <script>
        document.getElementById('property_image').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('file-label').innerText = fileName !== '' ? fileName : 'Choose file';
        });
    </script>
@endpush
