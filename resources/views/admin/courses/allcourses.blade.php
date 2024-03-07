@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">All Courses</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <a href="#" class="block">
                        <img class="w-full h-48 object-cover object-center rounded-t-lg" src="{{ asset('images/' . $course->image) }}" alt="{{ $course->name }}">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $course->name }}</h5>
                        </a>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($course->description, 100) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400"><b>Price</b>: ₹{{ $course->price }}</p>
                            <div class="space-x-2">
                                <a href="{{ route('course.show', $course->id) }}" target="blank" class="inline-block px-4 py-2 text-sm font-medium text-white bg-black rounded-lg  focus:outline-none">View</a>
                                <a href="#" class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:bg-red-700">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
