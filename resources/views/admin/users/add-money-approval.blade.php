@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Add Money Approval</h1>
            {{-- Form for uploading new document --}}
            <form action="{{ route('add.money.approval.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
                    <input type="hidden" name="user_id" value="{{ $id }}">
                    <div>
                        <label class="font-semibold text-sm text-gray-600 pb-1">Rupees</label>
                        <input type="number" name="money" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('money')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold text-sm text-gray-600 pb-1">Money Received Date</label>
                        <input type="date" name="received_date" class="h-12 px-3 w-full border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        @error('received_date')
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
