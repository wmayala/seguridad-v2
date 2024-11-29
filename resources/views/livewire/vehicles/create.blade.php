<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">REGISTRO DE VEHÍCULOS DEL SISTEMA FINANCIERO</div>
                        <form wire:submit.prevent="create" >
                            <div class="flex justify-center">
                                <div class="flex flex-col gap-5 w-1/2">
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Expediente No.</x-input-label>
                                        <x-text-input id="record" wire:model="record" placeholder="####" autofocus></x-text-input>
                                        @error('record')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Empresa</x-input-label>
                                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="institution_id" id="institution_id">
                                            <option selected>Seleccionar</option>
                                            @foreach($institutions as $institution)
                                                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Clase del vehículo</x-input-label>
                                        {{-- <x-text-input id="type" wire:model="type" placeholder="Ej.: Pick Up"></x-text-input> --}}
                                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="type" id="type">
                                            <option selected>Seleccionar</option>
                                            <option value="Panel">Panel</option>
                                            <option value="Pick Up">Pick Up</option>
                                            <option value="Camión Pesado">Camión Pesado</option>
                                        </select>
                                        @error('type')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Marca</x-input-label>
                                        <x-text-input id="brand" wire:model="brand" placeholder="Ej.: Ford"></x-text-input>
                                        @error('brand')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Color</x-input-label>
                                        <x-text-input id="color" wire:model="color" placeholder="Ej.: San Salvador, San Salvador" autofocus></x-text-input>
                                        @error('color')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Placa</x-input-label>
                                        <x-text-input id="plate" wire:model="plate" placeholder="Ej.: C123456-2011" autofocus></x-text-input>
                                        @error('plate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Fecha de emisión</x-input-label>
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" wire:model="issueDate" id="issueDate">
                                        @error('issueDate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Fecha de vencimiento</x-input-label>
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" wire:model="expirationDate" id="expirationDate">
                                        @error('expirationDate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Fotografía</x-input-label>
                                        <input type="file" wire:model="photo" id="photo" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                        <div wire:loading wire:target="photo">Cargando imagen...</div>
                                        @if($photo)
                                            <div class="mt-4">
                                                <p class="text-sm font-medium text-gray-500">Vista previa:</p>
                                                <img src="{{ $photo->temporaryUrl() }}" alt="Vista previa" class="w-1/6 h-auto rounded-md shadow-md">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Estado del registro</x-input-label>
                                        <div class="flex justify-center gap-5">
                                            <div class="flex gap-3">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="status"
                                                       type="radio"
                                                       id="act"
                                                       value="1"
                                                       checked>
                                                <label for="act">ACTIVO</label>
                                            </div>
                                            <div class="flex gap-2">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="status"
                                                       type="radio"
                                                       id="inact"
                                                       value="0">
                                                <label for="inact">INACTIVO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center gap-3 mt-5">
                                        <x-primary-button>Guardar</x-primary-button>
                                        <a href="{{ route('vehicles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-[#111e60]-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
