<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Other meta tags, stylesheets, and scripts -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        body {
            font-family: 'Karla', sans-serif;
            background-color: #ffffff;
            /* White background */
            color: #000000;
            /* Black text */
        }

        .bg-sidebar {
            background: #E21E10;
            /* White background */
        }

        .text-sidebar {
            color: #000000;
            /* Black text */
        }

        .active-nav-link {
            background: black;
            /* White background for active link */
        }

        .nav-item:hover {
            background: black;
            /* White background on hover */
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            {{-- <img src="{{ asset('images/LOGO_BIGBULLCLUB.png') }}" alt="Big Bull Image"> --}}
            <img src="{{ asset('images/black_logo.png') }}" alt="Big Bull Image">
        </div>

        <nav class="text-sidebar text-base font-semibold pt-3">
            <a href="{{ url('/dashboard') }}"
                class="flex items-center {{ request()->is('dashboard') ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            @if (Auth::user()->role == 'admin')
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-black text-white"
                    onclick="dropdown()">
                    {{-- <i class="bi bi-chat-left-text-fill"></i> --}}
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-white font-bold"><i class="fas fa-user-alt mr-3"></i>All
                            Users</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-left text-sm mt-2 w-4/5 mx-auto text-white font-bold" id="submenu">
                    <a href="{{ url('/users') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-black rounded-md mt-1">
                            Users
                        </h1>
                    </a>
                    <a href="{{ url('/users/kyc') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-black rounded-md mt-1">
                            Users Kyc
                        </h1>
                    </a>
                    <a href="{{ url('/students/money-approval') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-black rounded-md mt-1">
                            Money Approval List
                        </h1>
                    </a>
                </div>
                <a href="{{ url('/courses') }}"
                    class="flex items-center {{ request()->is('courses') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Courses
                </a>
                <a href="{{ url('/batches') }}"
                    class="flex items-center {{ request()->is('batches') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tasks mr-3"></i>
                    Batches
                </a>
            @endif
            @if (Auth::user()->role == 'user')
                <a href="#"
                    class="flex items-center {{ request()->is('mywallet') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-wallet mr-3"></i>
                    My Wallet
                </a>

                <a href="{{ url('/kyc') }}"
                    class="flex items-center {{ request()->is('kyc') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-file mr-3"></i>
                    KYC And Payment Documents
                </a>

                <a href="{{ url('/referral') }}"
                    class="flex items-center {{ request()->is('referral') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-graduation-cap  mr-3"></i>
                    Referral Students
                </a>

                <a href="{{ url('/allcourses') }}"
                    class="flex items-center {{ request()->is('courses') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-book-open mr-3"></i>
                    Courses
                </a>

                <a href="{{ url('/referal-link') }}"
                    class="flex items-center {{ request()->is('referal-link') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-link mr-3"></i>
                    My Referal Link
                </a>

                <a href="#"
                    class="flex items-center {{ request()->is('payments') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-rupee-sign mr-3"></i>
                    Payments
                </a>
                <a href="{{ url('/bank-details') }}"
                    class="flex items-center {{ request()->is('bank-details') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
                    <i class="fas fa-rupee-sign mr-3"></i>
                    Bank Details
                </a>
            @endif
        </nav>
    </aside>
    <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }

        function openSidebar() {
            document.querySelector(".sidebar").classList.remove("hidden");
        }

        // Function to check if the current URL matches the desired routes and open the sidebar accordingly
        function checkRouteAndOpenSidebar() {
            // Define an array of desired routes
            const desiredRoutes = ["/users", "/users/kyc"];

            // Get the current URL
            const currentURL = window.location.pathname;

            // Check if the current URL matches any of the desired routes
            if (desiredRoutes.includes(currentURL)) {
                openSidebar();
            }
        }

        // Call the function to check the route and open the sidebar when the page loads
        window.onload = checkRouteAndOpenSidebar;
    </script>
</body>

</html>
