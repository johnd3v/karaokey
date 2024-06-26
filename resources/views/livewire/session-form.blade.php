<div x-data="{ karaokeSessions: @entangle('karaokeSessions') }" class="py-12">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="flex flex-col items-center p-6 text-gray-900">
                <h3 class="mb-4 text-lg font-semibold">
                    {{ __('Your Dashboard') }}
                    {{ $hasCurrent ? "You have an existing karaoke session, scan to connect:" : 'Click here to add a session:' }}
                </h3>

                @if ($hasCurrent)
                    <!-- Display QR Code with Tailwind CSS for styling -->
                    {{-- <div class="p-4 rounded-lg shadow bg-gray-50">
                        {!! $qrCode !!}
                    </div> --}}
                    <button wire:click="joinSession" class="px-6 py-3 mb-4 font-bold text-white transition duration-150 ease-in-out bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        {{ __('Join  Session!') }}
                    </button>
                @else
                    <!-- Button styled with Tailwind CSS -->
                    <button wire:click="createSession" class="px-6 py-3 mb-4 font-bold text-white transition duration-150 ease-in-out bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        {{ __('Create New Session!') }}
                    </button>
                @endif
            </div>
        </div>

        <!-- Session List -->
        <div class="mt-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="mb-4 text-lg font-semibold">{{ __('Your Sessions') }}</h3>
                @if (empty($karaokeSessions))

                @else
                    @foreach ($karaokeSessions as $key => $karaoke)
                    @php
                        $session_type = $karaoke->isActive() ? "Active"  : "Inactive";
                    @endphp
                    <li class="flex items-center justify-between mb-4">
                        <a href="#" class="text-blue-500 hover:underline">Session {{ $key+1 }}</a>
                        <div>
                            <span class="text-sm text-gray-500">{{ $karaoke->created_at->diffForHumans() }}</span>
                            <button class="ml-4 text-sm {{ $session_type == 'Active' ? 'text-green-500' : 'text-red-500' }} hover:underline">{{ $session_type }}</button>
                        </div>
                    </li>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Analytics Overview -->
        <div class="mt-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="mb-4 text-lg font-semibold">{{ __('Analytics Overview') }}</h3>
                <!-- Replace with dynamic analytics content -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h4 class="font-semibold text-md">{{ __('Sessions Created') }}</h4>
                        <p class="text-2xl">{{ $sessions_count ?? '0' }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h4 class="font-semibold text-md">{{ __('Active Users') }}</h4>
                        <p class="text-2xl">{{ $active_users_count ?? '0' }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h4 class="font-semibold text-md">{{ __('Total Sessions') }}</h4>
                        <p class="text-2xl">{{ $total_sessions_count ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Area -->
        <div class="mt-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="mb-4 text-lg font-semibold">{{ __('Notifications') }}</h3>
                <!-- Replace with dynamic notification content -->
                <ul>
                    <li class="mb-4">
                        <span class="text-gray-700">New session created by User A</span>
                        <span class="ml-2 text-sm text-gray-500">2024-06-25</span>
                    </li>
                    <!-- Repeat for other notifications -->
                </ul>
            </div>
        </div>

    </div>
</div>
