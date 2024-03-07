@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Upload New Document</h1>
            {{-- Form for uploading new document --}}
            <form action="{{ route('users.kyc.storeByAdmin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
                    <input type="hidden" name="user_id" value="{{ $id }}">
                    <div>
                        <label class="font-semibold text-sm text-gray-600 pb-1">Title</label>
                        <input type="text" name="title" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Document Type</label>
                        <select name="document_type" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                            <option value="adhar">Adhar Card</option>
                            <option value="pan">PAN Card</option>
                            <option value="passport">Passport</option>
                            <option value="voter">Voter ID</option>
                            <option value="driving">Driving License</option>
                        </select>
                        @error('document_type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Image</label>
                        <input type="file" name="image" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Expiry Date</label>
                        <input type="date" name="expiry_date" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('expiry_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-black text-white py-2 px-4 rounded">Submit</button>
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
