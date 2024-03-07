<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
        <form class="space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        class="mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Remember me 
                    </label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('forgot.password') }}" class="font-medium text-red-600 hover:text-red-500">
                        Forgot your password?
                    </a>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Sign in
                </button>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500">
                        Register
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>