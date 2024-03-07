<!-- Modal -->
<form id="kycForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="editkycModal"
        class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex justify-center items-center">
        <!-- Modal content -->
        <div class="bg-white w-1/2 p-6 rounded-lg">
            <!-- Title input -->
            <div class="mb-4">
                <label for="title" class="text-gray-700">Title</label>
                <input type="text" id="title"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="title"
                    value="">
            </div>
            <!-- Document Type dropdown -->
            <div class="mb-4">
                <label for="documentType" class="text-gray-700">Document Type</label>
                <select id="documentType"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    name="document_type">
                    <option value="" id="">Select document type</option>
                    <option value="adhar" id="adhar">Adhar Card</option>
                    <option value="pan" id="pan">PAN Card</option>
                    <option value="passport" id="passport">Passport</option>
                    <option value="voter" id="voter">Voter ID</option>
                    <option value="driving" id="driving">Driving License</option>

                    <!-- Add other options as needed -->
                </select>
            </div>
            <!-- Image input -->
            <div class="mb-4">
                <label for="image" class="text-gray-700">Image:</label>
                <input type="file" id="image"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="image">
            </div>

            <img src="" style="width: 100px; height: 100px;" id="imageeditkyc">
            <!-- Expiry Date input -->
            <div class="mb-4">
                <label for="expiryDate" class="text-gray-700">Expiry Date:</label>
                <input type="date" id="expiryDateedit"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    name="expiry_date" value="">
            </div>
            <!-- Submit button -->
            <button type="submit"
                class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 0 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10z" />
                </svg>
                Submit
            </button>
            <!-- Close button -->
            <button id="closeEditModal" type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 0 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10z" />
                </svg>
                Close
            </button>
        </div>
    </div>
</form>
<script>
    // Get the modal and button elements
    let editmodal = document.getElementById("editkycModal");
    let editcloseModal = document.getElementById("closeEditModal");

    // Function to open the modal
    function openEditModal() {
        editmodal.classList.remove("hidden");
    }

    // Function to close the modal
    function closeEditModalFunction() {
        editmodal.classList.add("hidden");
    }

    // When the user clicks on the close button, close the modal
    editcloseModal.addEventListener("click", closeEditModalFunction);

    // When the user clicks anywhere outside of the modal, close the modal
    window.addEventListener("click", function(event) {
        if (event.target === editmodal) {
            closeEditModalFunction();
        }
    });
</script>
