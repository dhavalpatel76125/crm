@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Courses</h1>
            <div class="w-full flex pb-6">
                <a href="{{ url('/courses/create') }}" class="p-4 bg-red-600 text-white rounded-md hover:bg-red-400">
                    Add New Courses</a>
            </div>
            <div style="width: 100%;">
                <div class="flex-wrap mt-6" style="width: 100%;">
                    <table id="all-users" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
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
        $('#all-users').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('courses.datatable') }}",
                "type": "GET" // Adjust the HTTP method if needed
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    //limites description
                    "data": "description",
                    "render": function(data, type, row) {
                        return data.length > 100 ?
                            data.substr(0, 50) + '...' :
                            data;
                    }
                },
                {
                    "data": "price"
                },
                {
                    "data": "image",
                    "render": function(data, type, row) {
                        return '<img src="{{ asset('images/') }}/' + data +
                            '" style="width: 100px; height: 100px;">';
                    }
                },
                {
                    "data": "id",
                    "render": function(data, type, row) {
                        return `
            <div class="flex">
                <a href="/courses/${data}/edit" class="bg-black text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                <form action="/courses/${data}/delete" method="post" onsubmit="return confirm('Are you sure you want to delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        `;
                    }
                }

            ]
        });
    });
</script>
</body>

</html>
