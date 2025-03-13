<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Share</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Music Share</a>
            <div>
                @auth
                    <a href="/music/create" class="px-4">Upload Music</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 px-4 py-1 rounded">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4">Login</a>
                    <a href="{{ route('register') }}" class="px-4">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-6 p-4">
        @yield('content')
    </div>
</body>
</html>
