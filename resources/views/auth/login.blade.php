<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md border border-gray-100">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">EmpManage</h1>
            
            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-md mb-4 text-sm border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="password">Password</label>
                    <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition duration-150 ease-in-out">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</body>
</html>
