<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-white text-gray-800 font-[Poppins]">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 mx-4">
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <h2 class="text-3xl font-semibold text-center mb-6">Login</h2>

            {{-- Global Error --}}
            @if (session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Email Field --}}
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('email')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Password Field --}}
            <input type="password" name="password" placeholder="Password" required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('password')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Remember Me and Forgot Password --}}
            <div class="flex items-center justify-between mb-4 text-sm">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-blue-500">
                    <span class="ml-2 text-gray-600">Remember Me</span>
                </label>
                <a href="#!" class="text-blue-500 hover:underline">
                    Forgot Password?
                </a>
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="w-full p-3 bg-blue-500 text-white rounded-md font-medium hover:bg-blue-600 transition">
                Login
            </button>

            {{-- Link to Register --}}
            <p class="text-center text-sm mt-4">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            </p>
        </form>
    </div>

</body>

</html>
