@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2>Profile Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Profile Image</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Encrypted</td>
                    <td><img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Picture" style="width: 100px;">
                    </td>
                    <td>{{ ucfirst($user->user_type) }}</td>
                    <td><a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    <!-- Go back button -->
    <div class="text-center">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Go Back</a>
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
