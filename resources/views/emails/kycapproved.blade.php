<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Status</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-500 to-purple-700 min-h-screen flex flex-col justify-center items-center">
    <div class="max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">KYC Status</h1>
        <p class="text-lg text-gray-700 mb-4">Dear {{ $user }},</p>
        @if ($status === 'pending')
            <p class="text-lg text-yellow-700 mb-4">Your KYC verification is currently in a pending state.</p>
        @elseif ($status === 'approved')
            <p class="text-lg text-green-700 mb-4">Congratulations! Your KYC verification has been approved.</p>
        @elseif ($status === 'rejected')
            <p class="text-lg text-red-700 mb-4">We regret to inform you that your KYC verification has been rejected.
            </p>
        @else
            <p class="text-lg text-gray-700 mb-4">Invalid status.</p>
        @endif
        <p class="text-lg text-gray-700 mb-8">Thank you for choosing our platform.</p>
        <p class="text-sm text-gray-600">Big Bull Club Private Limited</p>
    </div>
</body>

</html>
