<div class="flex">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">AGREGAR PERSONAL SISTEMA FINANCIERO</div>
                        <form wire:submit.prevent="create">
                            <div class="flex justify-center">
                                <div class="flex flex-col gap-5 w-1/2">
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Expediente No.</x-input-label>
                                        <x-text-input id="record" wire:model="record" placeholder="####" autofocus></x-text-input>
                                        @error('record')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Zona restringida</x-input-label>
                                        <div class="flex justify-center gap-5">
                                            <div class="flex gap-3">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="zone"
                                                       type="radio"
                                                       id="zoneA"
                                                       value="1">
                                                <label for="zoneA">Clase A</label>
                                            </div>
                                            <div class="flex gap-2">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="zone"
                                                       type="radio"
                                                       id="zoneB"
                                                       value="2">
                                                <label for="zoneB">Clase B</label>
                                            </div>
                                            <div class="flex gap-3">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="zone"
                                                       type="radio"
                                                       id="zoneC"
                                                       value="3">
                                                <label for="zoneC">Clase C</label>
                                            </div>
                                            <div class="flex gap-2">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="zone"
                                                       type="radio"
                                                       id="zoneN"
                                                       value="0">
                                                <label for="zoneN">No Definida</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Nombre</x-input-label>
                                        <x-text-input id="name" wire:model="name" placeholder="Nombre completo de la persona"></x-text-input>
                                        @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Cargo</x-input-label>
                                        <x-text-input id="position" wire:model="position" placeholder="Ej.: Agente de seguridad"></x-text-input>
                                        @error('position')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">DUI</x-input-label>
                                        <x-text-input id="dui" wire:model="dui" maxlength="10" placeholder="Ej.: 12345678-9"></x-text-input>
                                        @error('dui')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Lugar de expedición DUI</x-input-label>
                                        <x-text-input id="duiPlace" wire:model="duiPlace" placeholder="Ej.: San Salvador, San Salvador"></x-text-input>
                                        @error('duiPlace')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Fecha de expedición DUI</x-input-label>
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" wire:model="duiDate" id="duiDate">
                                        @error('duiDate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Dirección particular</x-input-label>
                                        <x-text-input id="address" wire:model="address" placeholder="Ej.: Colonia Las Rosas, calle 1, pasaje 1, casa #1, San Salvador"></x-text-input>
                                        @error('address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Lugar de nacimiento</x-input-label>
                                        <x-text-input id="birthPlace" wire:model="birthPlace" placeholder="Ej.: San Salvador, San Salvador" autofocus></x-text-input>
                                        @error('birthPlace')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Fecha de nacimiento</x-input-label>
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" wire:model="birthDate" id="birthDate">
                                        @error('birthDate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">Institución</x-input-label>
                                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="institution_id" id="institution_id">
                                            <option selected>Seleccionar</option>
                                            @foreach($institutions as $institution)
                                                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                            @endforeach
                                        </select>
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
                                        <a href="{{ route('sfstaff.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-[#111e60]-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
