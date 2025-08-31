<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('scripts')
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Project_One</a>

            <div class="d-flex ms-auto">
                @auth
                    <span class="navbar-text me-3">
                        👤<a href="{{ route('profile.show') }}">  {{ Auth::user()->name }} </a>
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
            
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container mt-4">

    
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif


        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="text-center mt-5 mb-3 text-muted">
       
    </footer>
</body>
</html>
