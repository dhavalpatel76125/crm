<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include your CSS files or CDN links here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-8 bg-white p-8 shadow-md rounded-md">
        <h2 class="text-2xl font-bold mb-4">Reset Your Password</h2>
        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password"
                    class="mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    required autocomplete="new-password">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    required autocomplete="new-password">
            </div>
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit"
                class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                Reset Password
            </button>
        </form>
    </div>
</body>

</html>
