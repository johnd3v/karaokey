<div>
    <div x-data="{ open: @entangle('isOpen') }" x-init="if (localStorage.getItem('guestId')) { open = false } else { open = true }">    <!-- Modal -->
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="w-11/12 p-6 bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-1/3">
                <h2 class="mb-4 text-xl font-bold">Enter your name</h2>
                <form wire:submit.prevent="saveGuest">
                    <input type="text" wire:model="name" class="w-full p-2 mb-4 border border-gray-300 rounded" placeholder="Your name">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <livewire:search-songs :hash="$hash"/>

    <div x-show="showToast" x-transition class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow rtl:divide-x-reverse top-5 right-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">Song added to the queue.</div>
    </div>
</div>


<script>
    document.addEventListener('store-name', event => {
        console.log(event)
        localStorage.setItem('fullname', event.detail[0].fullname);
        localStorage.setItem('guestId', event.detail[0].guestId);
        localStorage.setItem('karaoke_session_id', event.detail[0].karaoke_session_id);
    });
</script>
