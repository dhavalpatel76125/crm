<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Forgot Password</title>
</head>

<body class="bg-red-100">
    <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
        <form class="space-y-6" method="POST" action="{{ route('forgot.password.send') }}">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        class=" border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-400 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if (session('success'))
                        <p class="text-green-500 text-sm mt-1">{{ session('success') }}</p>
                    @endif

                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Send Password Reset Link
                </button>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Remember your password?
                    <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500">
                        Sign in
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
