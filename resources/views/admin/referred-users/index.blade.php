@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col" style="overflow:scroll">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Users</h1>

            <div style="width: 100%;">
                <div class="flex-wrap mt-6" style="width: 100%;">
                    <table id="kyc-table" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Phone Number</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <!-- Table rows will be dynamically populated -->
                        </tbody>
                    </table>
                </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kyc-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('referral.datatable') }}",
                "type": "GET" // Adjust the HTTP method if needed
            },
            "columns": [
                { "data": "id" },
                { "data": "first_name" },
                { "data": "email" },
                { "data": "country" },
                { "data": "city" },
                { "data": "phone_number" },
                // { "data": "action" }
                
            ]
        });
    });
</script>
</body>

</html>
