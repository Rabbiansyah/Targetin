<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-white text-gray-800 font-[Poppins]">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 mx-4">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <h2 class="text-3xl font-semibold text-center mb-6">Register</h2>

            {{-- Global error message --}}
            @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Name --}}
            <input
                type="text"
                name="name"
                placeholder="Name"
                value="{{ old('name') }}"
                required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            @error('name')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Email --}}
            <input
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            @error('email')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Password --}}
            <input
                type="password"
                name="password"
                placeholder="Password"
                required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            @error('password')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Confirm Password --}}
            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
                class="w-full p-3 bg-gray-100 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            @error('password_confirmation')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            {{-- Register Button --}}
            <button
                type="submit"
                class="w-full p-3 bg-blue-500 text-white rounded-md font-medium hover:bg-blue-600 transition"
            >
                Register
            </button>

            {{-- Login Link --}}
            <p class="text-center text-sm mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </form>
    </div>

</body>

</html>
