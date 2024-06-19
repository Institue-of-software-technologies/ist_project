<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-400 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="max-w-5xl w-full bg-white p-10 rounded-lg shadow-md">
        <h1 class="text-5xl font-bold text-gray-800 mb-6">Welcome to the Application</h1>
        <div class="flex justify-center items-center">
            <!-- <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 mr-4">Register</a> -->
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 text-3xl">Login</a>
        </div>
    </div>
</body>
</html>
