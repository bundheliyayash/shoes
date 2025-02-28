<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.companies.index') }}">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shoes.index') }}">Shoes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.attributes.index') }}">Attributes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product-blogs.index') }}">Product Blogs</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
