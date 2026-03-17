<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recipe Manager')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body { margin: 0; font-family: Arial, sans-serif; background: #f4f4f4; color: #222; line-height: 1.5; }
            .container { width: 90%; max-width: 1000px; margin: 0 auto; }
            nav { margin-bottom: 16px; }
            h2, h3 { margin: 16px 0 12px; }
            a { color: #0b57d0; text-decoration: none; }
            a:hover { text-decoration: underline; }
            table { width: 100%; border-collapse: collapse; background: #fff; margin: 12px 0; }
            th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
            th { background: #f0f0f0; }
            form { background: #fff; padding: 16px; border: 1px solid #ddd; max-width: 700px; }
            input[type="text"], textarea { width: 100%; padding: 8px; border: 1px solid #bbb; margin-bottom: 10px; }
            button { padding: 8px 12px; border: 1px solid #888; background: #eee; cursor: pointer; }
            button:hover { background: #ddd; }
            .alert { padding: 10px; border: 1px solid transparent; margin: 12px 0; border-radius: 4px; }
            .alert-success { background: #eaf7ea; border-color: #9bd29b; color: #1f5f1f; }
            .alert-danger { background: #fdeaea; border-color: #e8aaaa; color: #7a1f1f; }
        </style>
    @endif
</head>
<body>
   <nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo/Home link -->
        <a href="{{ route('recipes.index') }}" class="text-xl font-bold">Recipe App</a>
        
        <!-- Navigation Links -->
        <div class="flex space-x-4">
            <a href="{{ route('recipes.index') }}" class="hover:text-gray-300">Home</a>
            
            <!-- Demo Login/Logout Links -->
            @if(session()->has('logged_in'))
                <a href="{{ route('logout.demo') }}" class="bg-red-500 hover:bg-red-700 px-4 py-2 rounded">
                    Demo Logout
                </a>
                <!-- Show "Add Recipe" link ONLY when logged in -->
                <a href="{{ route('recipes.create') }}" class="bg-green-500 hover:bg-green-700 px-4 py-2 rounded">
                    Add Recipe
                </a>
            @else
                <a href="{{ route('login.demo') }}" class="bg-green-500 hover:bg-green-700 px-4 py-2 rounded">
                    Demo Login
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- Flash Messages Section - Bootstrap Version -->
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
</div>
    <h2> Recipe Manager</h2>

    <nav>
        <a href="{{ route('recipes.index') }}">All Recipes</a>
        <a href="{{ route('recipes.create') }}">Create Recipe</a>
    </nav>
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif
    @yield('content')

    <script>
    // Auto-dismiss flash messages after 5 seconds
    setTimeout(function() {
        let alerts = document.querySelectorAll('[role="alert"]');
        alerts.forEach(function(alert) {
            alert.style.display = 'none';
        });
    }, 5000);
</script>
</body>

</html>