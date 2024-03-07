@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">{{ $course->name }}</h1>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/2">
                    <img class="w-full h-auto rounded-lg shadow-md" src="{{ asset('images/' . $course->image) }}"
                        alt="{{ $course->name }}">
                </div>
                <div class="md:w-1/2">
                    <p class="text-lg text-gray-800 pb-4"><b>Description : </b></p>
                    <pre class="text-md text-gray-800 pb-4">{{ $course->description }}</pre>
                    <div class="flex items-center mb-4">
                        <p class="text-lg text-gray-800 mr-2"><b>Price:</b></p>
                        <p class="text-lg text-blue-600"><b>₹{{ $course->price }}</b></p>
                    </div>
                    <div class="flex items-center">
                        <p class="text-lg text-gray-800 mr-2"><b>Total Duration:</b></p>
                        <p class="text-lg text-gray-800">{{ $course->hours }} hours {{ $course->minutes }} minutes</p>
                    </div>
                    <div class="mt-6">
                        <a href="#"
                            class="inline-block px-6 py-3 text-lg font-medium text-white bg-red-600 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:bg-red-700">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </main>

        {{-- <footer class="w-full bg-white text-right p-4 fixed bottom-0">
            Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer> --}}
    </div>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</body>

</html>
