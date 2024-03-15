@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col" style="overflow: scroll">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">KYC AND PAYMENT DOCUMENTS</h1>
            <div class="w-full flex pb-6">
                <button id="openModalBtn" href="" onclick="openModal()"
                    class="p-4 bg-red-600 text-white rounded-md hover:bg-red-600">Add New Document</button>
            </div>
            <div style="width: 100%;">
                <div class="flex-wrap mt-6" style="width: 100%;">
                    <table id="kyc-table" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Document Type</th>
                                <th>Image</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <!-- Table rows will be dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.kyc.create')
            @include('admin.kyc.edit')
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
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kyc-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('kyc.datatable') }}", // Make sure to adjust the route to your needs
                "type": "GET" // Adjust the HTTP method if needed
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": null,
                    "render": function(data) {
                        return '<img src="{{ asset('images/') }}/' + data.image +
                            '" style="width: 100px; height: 100px;">';

                    }
                },
                {
                    "data": "expiry_date"
                },
                {
                    "data": "status"
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `<a href="" onclick="openEditModal(${data.id})" class="bg-black  text-white font-bold py-2 px-4 rounded">Edit</a>
        <form action="kyc/${data.id}" method="POST" class="inline-block" style="display:none;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>`;
                    },

                },

            ]
        });
    });


    function openEditModal(params) {
        // prevent the default action
        event.preventDefault();
        // AJAX to fetch KYC data
        $.ajax({
            url: '{{ url('kyc/') }}/' + params + '/edit',
            type: 'GET',
            success: function(response) {
                $('#title').val(response.title);
                $('#documentType').val(response.document_type);
                // Assuming response.expiry_date is in the format "dd-mm-yyyy"
                $('#expiryDateedit').val(response.expiry_date);
                $('#imageeditkyc').attr('src', '{{ asset('images/') }}/' + response.image);

                // Set the selected attribute based on the received document type
                $('#documentType option:selected').removeAttr(
                    'selected'); // Clear previously selected option
                $('#' + response.document_type).attr('selected',
                    'selected'); // Set selected option based on document type

                // Set the form action dynamically
                $('#kycForm').attr('action', '{{ url('kyc/') }}/' + response.id);
                // Adjust the URL as needed

                $('#editkycModal').removeClass('hidden');
            }
        });
    }
</script>
</body>

</html>
