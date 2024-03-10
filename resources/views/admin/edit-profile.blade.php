@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Confirm new password">
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                @if ($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Picture" style="width: 100px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
            <!-- Go back button -->
            <div class="text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Go Back</a>
            </div>
@endsection


@section('title')
    Edit Profile
@endsection


@push('edit-style')
    <link rel="stylesheet" href="{{ asset('admin/css/profile-edit.css') }}">
    <style>
        #file-label {
            margin-left: 10px;
            color: #777;
            word-wrap: break-word;
        }
    </style>
@endpush
