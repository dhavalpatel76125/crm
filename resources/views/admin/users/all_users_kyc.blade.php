@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Users Kyc</h1>

            <div style="width: 100%;">
                <div class="flex-wrap mt-6" style="width: 100%;">
                    <table id="all-users-kyc" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Document tYPE</th>
                                <th>Image</th>
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
        $('#all-users-kyc').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('users.kyc.datatable') }}",
                "type": "GET" // Adjust the HTTP method if needed
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": null,
                    "render": function(data) {
                        return data.user.first_name;
                    }
                },
                
                {
                    "data": "document_type"
                },

                {
                    "data": null,
                    "render": function(data) {
                        return '<img src="{{ asset('images/') }}/' + data.image +
                            '" style="width: 100px; height: 100px; align-items:center;" >';

                    }
                },
                {
                    "data": "status"
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `<select onchange="updateStatus(this.value, ${data.id})">
                            <option value="pending" ${data.status == 'pending' ? 'selected' : ''}>Pending</option>
                            <option value="approved" ${data.status == 'approved' ? 'selected' : ''}>Approved</option>
                            <option value="rejected" ${data.status == 'rejected' ? 'selected' : ''}>Rejected</option>
                        </select>`;
                    }
                }

            ]
        });
    });


    function updateStatus(status, id) {
        $.ajax({
            url: "/users/kyc/updatestatus/" + id,
            type: "POST",
            data: {
                status: status,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert('Status updated successfully');
                // Additional actions upon successful update if needed
            },
            error: function(xhr, status, error) {
                // Handle errors if necessary
                console.error(xhr.responseText);
            }
            // Other AJAX settings as needed
        });
    }
</script>
</body>

</html>
