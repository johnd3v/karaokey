<div class="container h-full p-4 mx-auto" x-data="{showSearch:@entangle('showSearch'), showToast:@entangle('showToast')}">
    <div class="grid h-full gap-4 md:grid-cols-3">
        <!-- YouTube Iframe Container -->
        <div class="flex flex-col md:col-span-2" wire:ignore>
            <div class="flex-1 p-4 bg-white rounded shadow">
                @if($videoId)
                    <!-- Responsive iframe using padding-top for 16:9 aspect ratio -->
                    <div class="relative" style="padding-top: 56.25%;">
                        <div id="youtube-player" class="absolute top-0 left-0 w-full h-full"></div>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full text-center">
                        <p class="text-lg text-gray-500">No video playing. Add songs to the queue to start playing.</p>
                    </div>
                @endif
            </div>
            <div class="flex justify-center mt-4">
                <button x-on:click="showSearch = true" class="px-4 py-2 mb-4 text-white transition duration-300 bg-blue-500 rounded hover:bg-blue-700">
                    Search Songs
                </button>
            </div>
        </div>

        <!-- QR Code and Queue List Container -->
        <div class="flex flex-col md:col-span-1">
            <div class="flex-1 p-4 bg-white rounded shadow">
                <!-- QR Code Display -->
                <div class="flex items-center justify-center w-full mb-4 rounded" style="height: 200px;">
                    <span class="text-lg text-white">{{ $qrCode }}</span>
                </div>

                <!-- Queue List -->
                <div class="flex-1 w-full p-2 overflow-y-auto bg-gray-200 rounded">
                    <livewire:queue-list/>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="showSearch" class="fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-on:click.away="showSearch = false" class="overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:w-full sm:max-w-lg">
            <livewire-search-songs/>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="showToast" x-transition class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow rtl:divide-x-reverse top-5 right-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">Song added to the queue.</div>
    </div>
</div>

<script>
    function onYouTubeIframeAPIReady() {
        let player = new YT.Player('youtube-player', {
            height: '100%',
            width: '100%',
            videoId: '{{ $videoId }}',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.unMute();
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            Livewire.dispatch('videoEnded');
        }
    }
</script>


