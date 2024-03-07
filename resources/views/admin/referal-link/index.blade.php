@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">My Referal Link</h1>
            <div class="flex flex-wrap mt-6">
                <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-plus mr-3"></i> Link
                    </p>

                    <div class="grid grid-cols-8 gap-2 w-full max-w-[23rem]">
                        <label for="referral-link" class="sr-only">Referral Link</label>
                        <input id="referral-link" type="text"
                            class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $referralLink }}" readonly>
                        <button id="copy-button"
                            class="col-span-2 text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center inline-flex justify-center">
                            <span id="default-message">Copy</span>
                            <span id="success-message" class="hidden inline-flex items-center">
                                <i class="fas fa-check text-white me-1.5"></i>
                                Copied!
                            </span>
                        </button>
                    </div>


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
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyButton = document.getElementById('copy-button');
        const successMessage = document.getElementById('success-message');

        copyButton.addEventListener('click', function() {
            const referralLink = document.getElementById('referral-link');
            referralLink.select();
            document.execCommand('copy');

            // Show success message
            // successMessage.classList.remove('hidden');
            setTimeout(function() {
                alert('Copied to clipboard');
            }, 1000); // Hide success message after 2 seconds
        });
    });
</script>

</body>

</html>
