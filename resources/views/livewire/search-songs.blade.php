<div class="p-4 sm:p-6">
    <h3 class="text-lg font-medium leading-6 text-gray-900">
        Search for Songs
    </h3>
    <div class="mt-2">
        <input type="text" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Type to search songs..." wire:model.lazy="searchYoutubeTerm">
    </div>

    <div class="mt-4">
        <button wire:click="search" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
            Search
        </button>
    </div>

    <div class="mt-4">
        @if(!empty($songs))
            <ul class="space-y-2">
                @foreach($songs as $song)
                    <li class="p-4 bg-white rounded shadow sm:flex sm:items-center sm:space-x-4">
                        <div class="flex-shrink-0">
                            <img src="{{ $song->snippet->thumbnails->default->url }}" alt="Thumbnail" class="w-full sm:w-24">
                        </div>
                        <div class="mt-2 sm:mt-0 sm:flex-1">
                            <p>{{ $song->snippet->title}}</p>
                            <button wire:click="addToQueue('{{ $song->id->videoId }}')" class="px-4 py-2 mt-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Add to queue
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
