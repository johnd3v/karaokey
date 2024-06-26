<div class="container p-4 mx-auto" x-data="{open:false}">
    <div class="grid gap-4 md:grid-cols-3">
        <!-- YouTube Iframe Container -->
        <!-- On small screens, this takes full width, on medium screens and up, it takes 2/3 of the width -->
        <div class="p-4 bg-white rounded shadow md:col-span-2">
            <!-- Responsive iframe using padding-top for 16:9 aspect ratio -->
            <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <!-- QR Code and Queue List Container -->
        <!-- On small screens, this takes full width, on medium screens and up, it takes 1/3 of the width -->
        <div class="flex flex-col items-center p-4 bg-white rounded shadow">
            <!-- QR Code Display (simulated as a gray box) -->
            <div class="flex items-center justify-center w-full mb-4 rounded" style="height: 200px;">
                <span class="text-lg text-white">{{ $qrCode }}</span>
            </div>

            <!-- Queue List -->
            <div class="flex-1 w-full p-2 overflow-auto bg-gray-200 rounded">
                <ul class="list-disc list-inside">
                    <!-- Sample List Items -->
                    <li>Queue Item 1</li>
                    <li>Queue Item 2</li>
                    <li>Queue Item 3</li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </div>
    </div>

    <button x-on:click="open = true" class="px-4 py-2 mb-4 text-white transition duration-300 bg-blue-500 rounded hover:bg-blue-700">
        Search Songs
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-on:click.away="open = false" class="overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:w-full sm:max-w-lg">
            <livewire-search-songs/>
        </div>
    </div>
</div>
