<div>
    <div class="flex flex-col justify-center">
        <div class="ml-6 mb-4 flex justify-center gap-3">
            <div class="w-1/2 flex flex-col justify-center">
                <div class="text-[#303845] text-bold text-3xl my-5">CONSULTAS POR CATEGORÍA</div>
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
                <input class="text-[#303845] border border-[#303845] rounded-lg focus:ring-[#303845] focus:border-[#303845] p-2.5"
                       wire:model="selectedCategory"
                       type="radio"
                       id="{{ $label }}"
                       value="{{ $key }}">
                <label for="{{ $label }}">{{ $label }}</label>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center gap-3 mb-4">
            <x-primary-button class="bg-[#303845] w-1/6" wire:click="filterResults">
                <div class="w-full">Buscar</div>
            </x-primary-button>
            <button wire:click="clearInputs" class="px-2 py-1 bg-gray-600 text-white rounded-full w-1/6 hover:opacity-75">Limpiar</button>
        </div>
    </div>
    <div class="flex justify-center mb-4">
        <div class="mb-4 w-full flex justify-center">
            @if($results)
            <table class="w-3/4 text-lg text-left rtl:text-right text-gray-500">
                <thead class="text-lg text-white uppercase bg-[#303845]">
                    <th class="text-center p-3">EXPEDIENTE</th>
                    <th class="text-center p-3">NOMBRE</th>
                    <th class="text-center p-3">ESTADO</th>
                    <th class="text-center p-3">IR A</th>
                </thead>
                <tbody>
                    @forelse($results as $result)
                    <tr class="border-b hover:bg-gray-200 hover:text-[#303845]">
                        <td class="text-center p-3">{{ $result->record }}</td>
                        <td>{{ $result->name }}</td>
                        <td class="text-center">
                            @if($result->status==1)
                                <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route($url) }}" class="px-2 py-1 border border-[#303845] text-[#303845] rounded-full hover:bg-[#303845] hover:text-white">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="bg-white border-b hover:bg-gray-200 hover:text-[#111e60]">
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

