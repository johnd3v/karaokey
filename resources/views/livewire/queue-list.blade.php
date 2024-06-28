<ul class="space-y-2">
    @forelse ($queues as $queue)
        @php
            $queue['youtube_data'] = json_decode($queue['youtube_data'], true);
        @endphp
        <li class="flex items-center p-2 bg-white rounded shadow">
            <img src="{{ $queue['youtube_data']['thumbnail'] }}" alt="Thumbnail" class="w-20 h-20 mr-4 rounded">
            <span>{{ $queue['youtube_data']['title'] }}</span>
        </li>
    @empty
        <li class="text-center text-gray-500">No queue items available</li>
    @endforelse
</ul>
