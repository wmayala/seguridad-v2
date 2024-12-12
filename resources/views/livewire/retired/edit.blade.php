<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">ACTUALIZAR DATOS DE JUBILADO</div>
                    <form wire:submit.prevent="update">
                        <div class="flex justify-center">
                            <div class="flex flex-col gap-5 w-1/2">
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Expediente No.</x-input-label>
                                    <x-text-input id="record" wire:model="record" placeholder="###-###"
                                        autofocus></x-text-input>
                                    @error('record')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre</x-input-label>
                                    <x-text-input id="name" wire:model="name"
                                        placeholder="Nombre del jubilado"></x-text-input>
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">DUI</x-input-label>
                                    <x-text-input id="dui" wire:model="dui"
                                        placeholder="12345678-9"></x-text-input>
                                    @error('dui')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de emisión</x-input-label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="date" wire:model="issueDate" id="issueDate">
                                    @error('issueDate')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de vencimiento</x-input-label>
                                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" wire:model="expirationDate" id="expirationDate">
                                    @error('expirationDate')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fotografía</x-input-label>
                                    <input type="file" wire:model="photo" id="photo" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                    <div wire:loading wire:target="photo">Cargando imagen...</div>

                                    @if ($photo)
                                        <div class="mt-4">
                                            <x-input-label class="uppercase">Vista previa</x-input-label>
                                            <div class="flex justify-center">
                                                <img src="{{ $photo->temporaryUrl() }}" alt="Vista previa"
                                                    width="140" class="rounded-md shadow-md">
                                            </div>
                                        </div>
                                    @endif

                                    @if (!$photo && $existingPhoto)
                                        <div class="mt-4">
                                            <x-input-label class="uppercase">Foto Actual</x-input-label>
                                            <div class="flex justify-center">
                                                <img src="{{ asset('storage/' . $existingPhoto) }}" alt="Foto actual"
                                                    width="140" class="rounded-md shadow-md">
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Estado del registro</x-input-label>
                                    <div class="flex justify-center gap-5">
                                        <div class="flex gap-3">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="status" type="radio" id="act" value="1"
                                                checked>
                                            <label for="act">ACTIVO</label>
                                        </div>
                                        <div class="flex gap-2">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="status" type="radio" id="inact" value="0">
                                            <label for="inact">INACTIVO</label>
                                        </div>
                                    </div>
                                </div>


                                {{-- CARNET FRENTE --}}
                                <div id="retired-card-front">
                                    <div class="flex justify-center gap-3 mt-5">
                                        <div class="grid grid-cols-[auto_1fr] border-4 border-green-600 ">
                                            <div>
                                                <div class="border border-black">
                                                    <div class="h-40 w-32 border overflow-hidden">
                                                        <img id="originalImage" src="{{ asset('storage/' . $existingPhoto) }}" alt="Imagen original" class="cursor-pointer w-full h-full object-cover">
                                                    </div>

                                                    <!-- CROPPER -->
                                                    <div id="cropperModal" class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center hidden z-50">
                                                        <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
                                                        <h2 class="text-xl font-bold mb-4">Ajusta tu imagen</h2>
                                                        <div class="w-full h-64 overflow-hidden">
                                                            <img id="imageToCrop" src="{{ asset('storage/' . $existingPhoto) }}" alt="Para recortar" class="w-full">
                                                        </div>
                                                        <div class="flex justify-end mt-4 space-x-2">
                                                            <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                                                            <button id="cropButton" class="bg-blue-500 text-white px-4 py-2 rounded">Recortar</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!-- FIN CROPPER -->

                                                </div>
                                                <div class="text-center text-xl mt-6">Exp. No.</div>
                                                <div class="text-center text-2xl font-bold">{{ $record }}</div>
                                            </div>
                                            <div>
                                                <div class="flex border border-black w-full pl-2 py-2">
                                                    <img src="{{ asset('assets/img/logo_bcr.png') }}" alt="Logo BCR" width="60px">
                                                    <span class="text-xl text-center font-bold uppercase">Banco Central de Reserva de El Salvador</span>
                                                </div>
                                                <div class="flex flex-row border pl-2  border-black py-2">
                                                    <div>Nombre: </div>
                                                    <div class="flex flex-col pl-3">
                                                        <span class="text-xl uppercase">{{ $name }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row border pl-2 border-black py-2">
                                                    <div>Cargo: </div>
                                                    <div class="uppercase pl-3 text-xl">{{ $position }}</div>
                                                </div>
                                                <div class="flex flew-row justify-between border border-black">
                                                    <div class="flex flex-col pl-2">
                                                        <div>Dui No.</div>
                                                        <div class="text-center">{{ $dui }}</div>
                                                    </div>
                                                    <div class="flex flex-col pr-2">
                                                        <div>Vencimiento</div>
                                                        <div class="text-center">{{ $expirationDate }}</div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col text-center pl-2 w-full border border-black">
                                                    <div class="flex justify-center relative h-10">
                                                        <img class="absolute w-10" src="{{ asset('assets/img/firma-removebg.png') }}" alt="Firma Portador" >
                                                    </div>
                                                    <div class="mb-2">
                                                        Firma del Portador
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN CARNET FRENTE --}}

                                {{-- CARNET REVERSO --}}
                                <div id="retired-card-back">
                                    <div class="flex justify-center gap-3 mt-5">
                                        <div class="grid grid-cols-[auto_1fr] border border-gray-900 ">
                                            <div>
                                                <div class="flex w-full pl-2 py-2">
                                                    <p class="text-justify mx-2 p-3">
                                                        Este carnet debe portarlo en forma visible al ingreso y durante su permanencia en el BCR.
                                                        En caso de extravío o pérdida notificar al Tel.: 2281-8850. El costo de reposición por pérdida
                                                        es de $10.00
                                                    </p>
                                                </div>
                                                <div class="flex flex-col text-center pl-2 w-full">
                                                    <div class="flex justify-center">
                                                        <img src="{{ asset('assets/img/gs-sign.jpeg') }}" alt="Firma GS" width="275px">
                                                    </div>
                                                    <div class="mb-3">
                                                        Autorizado
                                                        <br>
                                                        Gerencia de Seguridad Bancaria
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN CARNET REVERSO --}}

                                <div class="flex justify-center">
                                    <button id="printButton" class="px-4 py-2 bg-green-800 text-white rounded-md hover:bg-green-600 font-semibold text-sm uppercase">
                                        Generar carnet
                                    </button>
                                </div>

                                <div class="flex justify-center gap-3 mt-5">
                                    <x-primary-button>Guardar</x-primary-button>
                                    <a href="{{ route('retired.index') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-[#111e60]-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
