<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="flex">
        <div class="grid-cols-4 w-1/6 h-dvh">
            <livewire:layout.sidebar>
        </div>
        <div class="grid-cols-10 py-12 flex w-full">

            <div class="mx-full sm:px-6 lg:px-8 w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
