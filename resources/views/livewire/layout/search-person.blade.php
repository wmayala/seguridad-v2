<div>
    <div class="flex justify-center">
        <div class="mb-4 w-4/5">
            <x-input-label class="uppercase">Buscar</x-input-label>
            <x-text-input class="w-4/5" id="searchTerm" wire:model="searchTerm" placeholder="Escriba el nombre del personal a buscar..."></x-text-input>
            <x-primary-button class="w-1/6" wire:click="search"><div class="w-full">Buscar</div></x-primary-button>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <div class="mb-4 w-full">
            {{ $staff }}

        </div>
    </div>
</div>

