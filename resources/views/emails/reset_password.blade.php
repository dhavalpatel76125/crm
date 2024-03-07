<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <!-- Include your CSS files or CDN links here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
        <h1 class="text-2xl font-bold mb-4">Reset Your Password</h1>
        <p class="mb-4">We received a request to reset your password. If you did not make this request, you can ignore this email.</p>
        <p class="mb-4">To reset your password, click the button below:</p>
        <a href="{{ $resetLink }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Reset Password
        </a>
        <p class="mt-4 mb-2">If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
        <p class="mt-4 mb-2">If you have any questions, feel free to contact us.</p>
        <p>Thanks,<br>{{ config('app.name') }}</p>
    </div>
</body>

</html>
