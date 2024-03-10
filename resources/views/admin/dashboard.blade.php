@extends('admin.layouts.main')
@php
$userType = auth('admin')->user()->user_type;
@endphp
@section('content')
    <div class="container">
        <h2>Property Details Dashboard</h2>

        <div>
            <a href="{{ route('admin.profile') }}">
                <img src="{{ asset('storage/' . auth('admin')->user()->profile_image) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%; position: absolute; top: 20px; left: 20px;">
            </a>
        </div>

        <!-- Logout Button -->
        <form method="post" action="{{ route('admin.logout') }}" style="position: absolute; top: 20px; right: 20px;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        @if($userType === 'admin')

        <!-- Add Button -->
        <a href="{{ route('admin.property.add') }}" class="btn btn-success">Add Property</a>

        @endif

        <!-- Search Bar -->
        <form method="get" action="{{ route('admin.property') }}" class="mt-3">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="What are you looking for?" name="search">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>


        @if ($propertyDetails->isEmpty())
            <p>No content found.</p>
        @else
            <!-- Property Details Table -->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Property Image</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Area</th>
                        <th>Floor</th>
                        <th>Parking</th>
                        <th>BHK</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through property details and display rows -->
                    @foreach ($propertyDetails as $property)
                        <tr>
                            <td>{{ $property->property_name }}</td>
                            <!-- Use asset() to generate the correct URL for the image -->
                            <td> <img src="{{ asset('storage/' . $property->property_image) }}" alt="Property Image"
                                    style="width: 100px; height: 100px;"></td>
                            <td>{{ $property->category_name }}</td>
                            <td>{{ $property->price }}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->area }}</td>
                            <td>{{ $property->floor }}</td>
                            <td>{{ $property->parking }}</td>
                            <td>{{ $property->bhk }}</td>
                            <td>
                                <div class="action-buttons">
                                    @if($userType === 'admin' || $userType === 'editor')
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.property.edit', ['id' => $property->id]) }}" class="btn btn-primary">Edit</a>
                                        <!-- Delete Form/Button -->
                                        <form action="{{ route('admin.property.delete', ['id' => $property->id]) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @elseif($userType === 'viewer')
                                        <!-- Disabled/Edit and Delete Buttons for Viewers -->
                                        <button class="btn btn-primary" onclick="alert('Acess Denied')">Edit</button>
                                        <button class="btn btn-danger" onclick="alert('Acess Denied')">Delete</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            {{ $propertyDetails->appends(['search' => request()->input('search')])->links('pagination.custom') }}
        @endif
    </div>
@endsection

@section('title')
    Dashboard
@endsection

@push('dashboard-style')
    <!-- Add this line to include the CSS file -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-dashboard.css') }}">
    <link href="{{ asset('admin/css/pagination-styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endpush
