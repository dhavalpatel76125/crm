@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            @if(isset($user))
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
                    <h1 class="text-3xl text-black pb-6">Edit User</h1>
                    <!-- User fields -->
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">First Name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">City</label>
                        <input type="text" name="city" value="{{ $user->city }}" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('city')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Phone Number</label>
                        <input type="tel" name="phone_number" value="{{ $user->phone_number }}" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('phone_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-black text-white py-2 px-4 rounded">Update</button>
                    </div>
                </div>
            </form>
            @else
            <h1 class="text-3xl text-black pb-6">No user found</h1>
            @endif
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
