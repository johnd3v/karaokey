<div class="container p-4 mx-auto">
    <div class="grid gap-4 md:grid-cols-3">
        <!-- YouTube Iframe Container -->
        <!-- On small screens, this takes full width, on medium screens and up, it takes 2/3 of the width -->
        <div class="p-4 bg-white rounded shadow md:col-span-2">
            <!-- Responsive iframe using padding-top for 16:9 aspect ratio -->
            <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/ChukpOHfAI8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <!-- QR Code and Queue List Container -->
        <!-- On small screens, this takes full width, on medium screens and up, it takes 1/3 of the width -->
        <div class="flex flex-col items-center p-4 bg-white rounded shadow">
            <!-- QR Code Display (simulated as a gray box) -->
            <div class="flex items-center justify-center w-full mb-4 bg-gray-300 rounded" style="height: 200px;">
                <span class="text-lg text-white">QR Code</span>
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
</div>
