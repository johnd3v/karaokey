<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Player') }}
        </h2>
    </x-slot>
    <div class="min-h-screen bg-gray-100">
        <livewire:player-form></livewire:player-form>
    </div>

</x-app-layout>
