@extends('layouts.app')

@section('content')
    <h2>Assign Permissions to {{ $user->name }}</h2>

    @can('access-admin', auth()->user()->id)
    <a href="{{ route('admin.users', ['id' => auth()->user()->id]) }}" class="btn btn-secondary mb-3">
        Manage Users
    </a>
    @endcan


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.updatePermissions', ['id' => auth()->user()->id, 'userId' => $user->id]) }}">
        @csrf

        <div class="mb-3">
            <label for="role">Role:</label>
            <select name="role" class="form-control" required>
                <option value="viewer" {{ $user->role === 'viewer' ? 'selected' : '' }}>Viewer</option>
                <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <h4>Permissions</h4>
        @foreach($permissions as $permission)
            <div class="form-check">
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                    class="form-check-input"
                    {{ $user->permissions->contains($permission->id) ? 'checked' : '' }}>
                <label class="form-check-label">{{ ucfirst($permission->name) }}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('admin.users', auth()->user()->id) }}" class="btn btn-secondary mt-3">Back</a>
    </form>
@endsection