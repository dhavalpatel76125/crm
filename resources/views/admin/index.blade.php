@include('sidebar')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('desktopheader')

    @include('mobileside')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Dashboard</h1>
            <div class="flex flex-wrap mt-6">
                <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-plus mr-3"></i> Students
                    </p>
                    <div class="p-6 bg-white">
                        <p>55</p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-check mr-3"></i> Affiliate ammonut
                    </p>
                    <div class="p-6 bg-white">
                        <p>₹ 1000</p>
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


</body>

</html>
