<!-- Modal -->

<form method="POST" action="{{ route('kyc.store') }}" style="width: 100%;" enctype="multipart/form-data">
    @csrf
    <div id="myModal"
        class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex justify-center items-center">
        <!-- Modal content -->
        <div class="bg-white w-1/2 p-6 rounded-lg">
            <div class="mb-4">
                <label for="image" class="text-gray-700">Title</label>
                <input type="text" id="image"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="title" required>
            </div>
            <div class="mb-4">
                <label for="image" class="text-gray-700">Document Type</label>
                <!-- Document Type dropdown -->
                <select id="documentType"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    name="document_type" required>
                    <option value="">Select document type</option>
                    <option value="adhar">Adhar Card</option>
                    <option value="pan">PAN Card</option>
                    <option value="passport">Passport</option>
                    <option value="voter">Voter ID</option>
                    <option value="driving">Driving License</option>

                    <!-- Add other options as needed -->
                </select>
            </div>
            <!-- Image input -->
            <div class="mb-4">
                <label for="image" class="text-gray-700">Image:</label>
                <input type="file" id="image"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="image" required>
            </div>
            <!-- Expiry Date input -->
            <div class="mb-4">
                <label for="expiryDate" class="text-gray-700">Expiry Date:</label>
                <input type="date" id="expiryDate"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    name="expiry_date">
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 0 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10z" />
                </svg>
                Submit
            </button>

            <!-- Close button -->
            <button id="closeModal" type="button"
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
    let modal = document.getElementById("myModal");
    let closeModal = document.getElementById("closeModal");
    // Function to open the modal
    function openModal() {
        modal.classList.remove("hidden");
    }

    // Function to close the modal 
    function closeModalFunction() {
        modal.classList.add("hidden");
    }

    // When the user clicks on the close button or anywhere outside of the modal, close the modal
    closeModal.addEventListener("click", closeModalFunction);

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            closeModalFunction();
        }
    });
</script>
