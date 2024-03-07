@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Create new batch</h1>
            {{-- // form for new course --}}
            <form action="{{ route('batches.store') }}" method="POST">
                @csrf
                <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Batch Name</label>
                        <input type="text" name="batch_name" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('batch_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Batch Description</label>
                        <textarea name="batch_description" class="h-32 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required></textarea>
                        @error('batch_description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Date</label>
                        <input type="date" name="date" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Time</label>
                        <input type="time" name="time" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('time')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Location</label>
                        <input type="text" name="location" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Duration</label>
                        <div class="flex">
                            <input type="number" name="duration_hours" class="h-12 px-3 w-1/2 mr-2 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Hours" required>
                            <input type="number" name="duration_minutes" class="h-12 px-3 w-1/2 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Minutes" max="59" required>
                        </div>
                        @error('duration_hours')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        @error('duration_minutes')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Submit</button>
                    </div>
                </div>
            </form>
            
            
        </main>
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
