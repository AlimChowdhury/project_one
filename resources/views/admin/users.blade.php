@extends('layouts.app')

@section('content')
    <h2>All Users</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div>
         <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Post</a>
    </div>

   <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Manage Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        @php
                            $adminId = auth()->user()->id;
                        @endphp
                        <a href="{{ route('admin.editPermissions', ['id' => $adminId, 'userId' => $user->id]) }}"
                            class="btn btn-sm btn-primary">
                            Edit Permissions
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection