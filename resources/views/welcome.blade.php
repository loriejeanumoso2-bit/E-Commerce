<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center text-center">
        
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            Welcome to Our E-Commerce Website 🛒
        </h1>

        <p class="text-gray-600 mb-6">
            Shop easily and manage your account
        </p>

        <div class="space-x-4">
            @auth
    @if(Auth::user()->role === 'admin')
        <a href="{{ url('/dashboard') }}" 
           class="bg-blue-500 text-white px-6 py-2 rounded-lg">
           Go to Dashboard
        </a>
    @else
        <p class="text-red-500">Unauthorized</p>
    @endif
@else
    <a href="{{ route('login') }}" 
       class="bg-green-500 text-white px-6 py-2 rounded-lg">
       Login
    </a>

    <a href="{{ route('register') }}" 
       class="bg-gray-800 text-white px-6 py-2 rounded-lg">
       Register
    </a>
@endauth
        </div>

    </div>

</body>
</html>