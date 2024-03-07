{{-- firstname,
lastname
email
country
city
phonenumber
affilicate code (bbc  prefix then 6 latter unique)
captcha
 --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include your CSS files or CDN links here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
        <form class="space-y-6" method="POST" route="{{ route('register') }}">
            @csrf
            @if (isset($referedUserId))
                <input value="{{ $referedUserId }}" name="referred_by" hidden />
            @endif
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="firstname" name="firstname" type="text" required autofocus autocomplete="given-name"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('firstname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="lastname" name="lastname" type="text" required autocomplete="family-name"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('lastname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @if (session('error'))
                        <p class="text-red-500 text-sm mt-1">{{ session('error') }}</p>
                    @endif
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="confirmpassword" name="confirmpassword" type="password" required
                        autocomplete="new-password"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('confirmpassword')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input id="country" name="country" type="text" required autocomplete="country" value="India"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        disabled>
                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input id="city" name="city" type="text" required autocomplete="city"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phonenumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input id="phonenumber" name="phonenumber" type="tel" required autocomplete="tel"
                        class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('phonenumber')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="affiliatecode" class="block text-sm font-medium text-gray-700">Affiliate Code</label>
                <input id="affiliatecode" name="affiliatecode" type="text" required
                    title="Affiliate code must start with 'bbc' followed by 6 letters." value="{{ $affiliate_code }}"
                    class="border mt-1 block w-full px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    readonly>
                @error('affiliatecode')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <!-- Your captcha field goes here -->
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    id="submit">
                    Register
                </button>

                <p class="mt-2 text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('login') }}"
                        class="font-medium text-red-600 hover:text-indigo-500">Login</a>
                </p>
            </div>
        </form>
    </div>


</body>


</html>
