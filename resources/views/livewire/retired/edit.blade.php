<div class="flex overflow-y-auto h-dvh">
    <div class="flex w-full py-6">
        <div class="w-full mx-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">ACTUALIZAR DATOS DE JUBILADO</div>
                    <form wire:submit.prevent="update">
                        <div class="flex justify-center">
                            <div class="flex flex-col w-1/2 gap-5">
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Expediente No.</x-input-label>
                                    <x-text-input id="record" wire:model="record" placeholder="###-###"
                                        autofocus></x-text-input>
                                    @error('record')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre</x-input-label>
                                    <x-text-input id="name" wire:model="name"
                                        placeholder="Nombre del jubilado"></x-text-input>
                                    @error('name')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">DUI</x-input-label>
                                    <x-text-input id="dui" wire:model="dui"
                                        placeholder="12345678-9"></x-text-input>
                                    @error('dui')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de emisión</x-input-label>
                                    <input
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        type="date" wire:model="issueDate" id="issueDate">
                                    @error('issueDate')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de vencimiento</x-input-label>
                                    <input class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" wire:model="expirationDate" id="expirationDate">
                                    @error('expirationDate')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
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
                                <div id="retired-card-front" class="w-[517px] h-[325px] border-[12px]  border-green-600">
                                    <div class="flex justify-center gap-3">
                                        <div class="grid grid-cols-[auto_1fr]">
                                            <div>
                                                <div class="border-black ">
                                                    <div class="w-32 h-40 overflow-hidden">
                                                        <img id="originalImage" src="{{ asset('storage/' . $existingPhoto) }}" alt="Imagen original" class="object-cover w-full h-full cursor-pointer">
                                                    </div>

                                                    <!-- CROPPER -->
                                                    <div id="cropperModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-black bg-opacity-50">
                                                        <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
                                                        <h2 class="mb-4 text-xl font-bold">Ajusta tu imagen</h2>
                                                        <div class="w-full h-64 overflow-hidden">
                                                            <img id="imageToCrop" src="{{ asset('storage/' . $existingPhoto) }}" alt="Para recortar" class="w-full">
                                                        </div>
                                                        <div class="flex justify-end mt-4 space-x-2">
                                                            <button id="cancelButton" class="px-4 py-2 text-white bg-gray-500 rounded">Cancelar</button>
                                                            <button id="cropButton" class="px-4 py-2 text-white bg-blue-500 rounded">Recortar</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!-- FIN CROPPER -->

                                                </div>
                                                <div class="mt-6 text-xl text-center">Exp. No.</div>
                                                <div class="text-2xl font-bold text-center">{{ $record }}</div>
                                            </div>
                                            <div class="mx-2">
                                                <div class="flex w-full py-2 pl-2 border-b border-black">
                                                    <img src="{{ asset('assets/img/logo_bcr.png') }}" alt="Logo BCR" width="60px">
                                                    <span class="mx-2 text-lg font-bold text-center uppercase">Banco Central de Reserva de El Salvador</span>
                                                </div>
                                                <div class="flex flex-row py-2 pl-2 border-b border-black">
                                                    <div>Nombre: </div>
                                                    <div class="flex flex-col pl-3">
                                                        <span class="text-xl uppercase">{{ $name }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row py-2 pl-2 border-b border-black">
                                                    <div>Cargo: </div>
                                                    <div class="pl-3 text-xl uppercase">{{ $position }}</div>
                                                </div>
                                                <div class="flex justify-between py-2 border-b border-black flew-row">
                                                    <div class="flex flex-col pl-2">
                                                        <div>Dui No.</div>
                                                        <div class="text-center">{{ $dui }}</div>
                                                    </div>
                                                    <div class="flex flex-col pr-2">
                                                        <div>Vencimiento</div>
                                                        <div class="text-center">{{ $expirationDate }}</div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col w-full pl-2 text-center border-black">
                                                    <div class="relative flex justify-center h-10">
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
                                <div id="retired-card-back" class="border border-gray-200 w-[514.25px] h-[322px]">
                                    <div class="flex justify-center gap-3">
                                        <div class="grid grid-cols-[auto_1fr]  ">
                                            <div>
                                                <div class="flex w-full py-2 pl-2">
                                                    <p class="p-3 mx-2 text-justify">
                                                        Este carnet debe portarlo en forma visible al ingreso y durante su permanencia en el BCR.
                                                        En caso de extravío o pérdida notificar al Tel.: 2281-8850. El costo de reposición por pérdida
                                                        es de $10.00
                                                    </p>
                                                </div>
                                                <div class="flex flex-col w-full pl-2 text-center">
                                                    <div class="flex justify-center my-2">
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
                                    <button id="printButton" class="px-4 py-2 text-sm font-semibold text-white uppercase bg-green-800 rounded-md hover:bg-green-600">
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
