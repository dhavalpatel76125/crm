@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg onclick="this.parentElement.style.display='none'" class="fill-current h-6 w-6 text-green-500"
                        role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 0 1-1.497 1.316l-3.351-3.85-3.351 3.85a1 1 0 1 1-1.497-1.316l3.845-4.425-3.845-4.425a1 1 0 0 1 1.497-1.316l3.351 3.85 3.351-3.85a1 1 0 0 1 1.497 1.316l-3.845 4.425 3.845 4.425z" />
                    </svg>
                </span>
            </div>
        @endif
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">My Account</h1>
            <div class="flex flex-wrap mt-6">
                <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-user mr-3"></i> Personal Information 
                    </p>
                    <div class="p-6 bg-white">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 fill-current text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M17.5 3H2.5A2.5 2.5 0 0 0 0 5.5v9A2.5 2.5 0 0 0 2.5 17H17.5A2.5 2.5 0 0 0 20 14.5v-9A2.5 2.5 0 0 0 17.5 3ZM12.5 7a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM17 14.5c0 .827-.673 1.5-1.5 1.5h-11c-.827 0-1.5-.673-1.5-1.5V6.121L5.5 9.5a1.5 1.5 0 0 0 2 0l4.5-4.5 4.5 4.5a1.5 1.5 0 0 0 2 0L17 6.121v8.379Z"/>
                                </svg>
                                <p class="text-lg font-semibold">Name: {{ Auth::user()->first_name }} {{Auth::user()->last_name}}</p>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 fill-current text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 2.5c-4.142 0-7.5 3.358-7.5 7.5 0 5.25 7.5 10 7.5 10s7.5-4.75 7.5-10c0-4.142-3.358-7.5-7.5-7.5Zm0 10.75c-1.312 0-2.375-1.062-2.375-2.375s1.063-2.375 2.375-2.375 2.375 1.063 2.375 2.375-1.063 2.375-2.375 2.375Z"/>
                                </svg>
                                <p class="text-lg font-semibold">Email: {{ Auth::user()->email }}</p>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 fill-current text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.25 3.75c-1.552 0-3.036.588-4.146 1.646-1.11-1.058-2.594-1.646-4.146-1.646-2.75 0-5 2.25-5 5 0 3.5 5 10 5 10s5-6.5 5-10c0-2.75-2.25-5-5-5ZM10 14.375c-1.69 0-3.125-1.25-3.125-2.875s1.435-2.875 3.125-2.875c1.69 0 3.125 1.25 3.125 2.875S11.69 14.375 10 14.375Z"/>
                                </svg>
                                <p class="text-lg font-semibold">Phone: {{ Auth::user()->phone_number }}</p>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 fill-current text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.75 3.75h-17.5c-0.689 0-1.25.561-1.25 1.25v10c0 .689.561 1.25 1.25 1.25h17.5c0.689 0 1.25-.561 1.25-1.25v-10c0-.689-.561-1.25-1.25-1.25Zm-16.25 1.25h15v5h-15v-5Zm15 7.5h-15v-1.25h15v1.25Z"/>
                                </svg>
                                <p class="text-lg font-semibold">Country: {{ Auth::user()->country }}</p>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 fill-current text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 2.5c-4.142 0-7.5 3.358-7.5 7.5 0 5.25 7.5 10 7.5 10s7.5-4.75 7.5-10c0-4.142-3.358-7.5-7.5-7.5Zm0 10.75c-1.312 0-2.375-1.062-2.375-2.375s1.063-2.375 2.375-2.375 2.375 1.063 2.375 2.375-1.063 2.375-2.375 2.375Z"/>
                                </svg>
                                <p class="text-lg font-semibold">City: {{ Auth::user()->city }}</p>
                            </div>
                        </div>
                        
                    </div>
            </div>
            <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-key mr-3"></i> Change Password 
                </p>
                <div class="p-6 bg-white">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="new_password" class="text-gray-700">New Password</label>
                            <input type="password" id="new_password"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="new_password">
                        </div>
                        <div class="mb-4">
                            <label for="new_confirm_password" class="text-gray-700">Confirm New Password</label>
                            <input type="password" id="new_confirm_password"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="new_confirm_password">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 0 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10z" />
                            </svg>
                            Submit
                        </button>
                    </form>
                </div>

        </main>
        <footer class="w-full bg-white text-right p-4 fixed bottom-0">
            Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer>
    </div>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


</body>

</html>
