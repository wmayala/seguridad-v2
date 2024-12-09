<div>
    <div class="flex flex-col justify-center">
        <div class="ml-6 mb-4  flex justify-center gap-3">
            <div class="w-1/2 flex flex-col justify-center">
                <x-input-label class="uppercase">Buscar</x-input-label>
                <x-text-input
                    id="search"
                    wire:model="search"
                    wire:keydown.enter="filterResults"
                    placeholder="Escriba el nombre del personal a buscar..."
                    autofocus>
                </x-text-input>
                @error('search')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="flex justify-center gap-6 mb-4">
            @foreach($categories as $key=>$label)
            <div class="flex gap-2">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="selectedCategory"
                       type="radio"
                       id="{{ $label }}"
                       value="{{ $key }}">
                <label for="{{ $label }}">{{ $label }}</label>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center gap-3 mb-4">
            <x-primary-button class="w-1/6" wire:click="filterResults">
                <div class="w-full">Buscar</div>
            </x-primary-button>
            <button wire:click="clearInputs" class="px-2 py-1 bg-red-400 text-white rounded w-1/6">Limpiar</button>
        </div>
    </div>
    <div class="flex justify-center mb-4">
        <div class="mb-4 w-full">
            @if($results)
            <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-lg text-white uppercase bg-[#111e60] dark:bg-gray-700 dark:text-gray-400">
                    <th class="text-center p-3">EXPEDIENTE</th>
                    <th class="text-center p-3">NOMBRE</th>
                    <th class="text-center p-3">ESTADO</th>
                    <th class="text-center p-3">IR A</th>
                </thead>
                <tbody>
                    @forelse($results as $result)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60] p-3">
                        <td class="text-center">{{ $result->record }}</td>
                        <td>{{ $result->name }}</td>
                        <td class="text-center">
                            @if($result->status==1)
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route($url) }}" class="px-2 py-1 bg-yellow-400 text-white rounded">{{ $cat }}</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                            No se encontraron resultados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

