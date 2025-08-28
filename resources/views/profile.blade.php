@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="card-title mb-4">Welcome, {{ Auth::user()->name }}</h2>

                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                        class="rounded-circle mb-3" width="150">
                @endif

                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                <p><strong>Bio:</strong> {{ Auth::user()->bio }}</p>
                <p><strong>Division:</strong> {{ Auth::user()->division->name ?? 'N/A' }}</p>
                <p><strong>District:</strong> {{ Auth::user()->district->name ?? 'N/A' }}</p>
                <p><strong>Upazila:</strong> {{ Auth::user()->upazila->name ?? 'N/A' }}</p>


                <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection