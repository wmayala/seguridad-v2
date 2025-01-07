<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">ACTUALIZAR BENEFICIARIO</div>
                    <form wire:submit.prevent="update">
                        <div class="flex justify-center">
                            <div class="flex flex-col gap-5 w-1/2">
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Expediente No.</x-input-label>
                                    <x-text-input id="record" wire:model="record" placeholder="####"
                                        autofocus></x-text-input>
                                    @error('record')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre</x-input-label>
                                    <x-text-input id="name" wire:model="name"
                                        placeholder="Nombre del beneficiario"></x-text-input>
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Edad</x-input-label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="number" id="age" wire:model="age" placeholder="Escriba la edad">
                                    @error('age')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Parentesco</x-input-label>
                                    <select
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model="relationship" id="relationship">
                                        <option value="">Seleccionar</option>
                                        <option value="Esposo(a)">Esposo(a)</option>
                                        <option value="Hijo(a)">Hijo(a)</option>
                                        <option value="Hermano(a)">Hermano(a)</option>
                                        <option value="Padre/Madre">Padre/Madre</option>
                                    </select>
                                    @error('relationship')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Código de empleado</x-input-label>
                                    <x-text-input id="empCode" wire:model="empCode"
                                        placeholder="Código de empleado"></x-text-input>
                                    @error('empCode')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre del empleado</x-input-label>
                                    <x-text-input id="empName" wire:model="empName"
                                        placeholder="Nombre del empleado"></x-text-input>
                                    @error('empName')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Institución</x-input-label>
                                    <select
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model="institution" id="institution">
                                        <option value="">Seleccionar</option>
                                        <option value="BCR">Banco Central de Reserva</option>
                                    </select>
                                    @error('institution')
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
                                    <input
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="date" wire:model="expirationDate" id="expirationDate">
                                    @error('expirationDate')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
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
                                    @if (file_exists(asset('storage/' . $existingPhoto)))

                                        @if (!$photo && $existingPhoto)
                                            <div class="mt-4">
                                                <x-input-label class="uppercase">Foto Actual</x-input-label>
                                                <div class="flex justify-center">
                                                    <img src="{{ asset('storage/' . $existingPhoto) }}"
                                                        alt="Foto actual" width="140" class="rounded-md shadow-md">
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
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

                                <div class="flex flex-col justify-center items-center gap-5">
                                    {{-- CARNET FRENTE --}}
                                    <div id="id-card-front" class="w-[517px] h-[325px] border border-gray-200 p-2">
                                        <div class="flex justify-center gap-3">
                                            <div class="grid grid-cols-[auto_1fr]">
                                                <div class="flex justify-center p-1 ">
                                                    <img src="{{ asset('assets/img/logo_bcr.png') }}" alt="Logo BCR"
                                                        width="80px" height="80px">
                                                </div>
                                                <div class="flex flex-col w-full py-1">
                                                    <span class="mx-2 text-lg font-bold text-center uppercase">Centro
                                                        de Recreación y Deportes del Banco Central de Reserva</span>
                                                    <span class="text-base font-bold text-center uppercase">Carné de
                                                        Beneficiario</span>
                                                </div>
                                                <div>
                                                    <div class="border border-black ">
                                                        <div class="w-32 h-40 overflow-hidden">
                                                            @if (file_exists(asset('storage/' . $existingPhoto)))
                                                                <img id="originalImage"
                                                                    src="{{ asset('storage/' . $existingPhoto) }}"
                                                                    alt="Imagen original"
                                                                    class="object-cover w-full h-full cursor-pointer">
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-12 h-12">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                            @endif
                                                        </div>

                                                        <!-- CROPPER -->
                                                        <div id="cropperModal"
                                                            class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                                                            <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
                                                                <h2 class="mb-4 text-xl font-bold">Ajustar imagen</h2>
                                                                <div class="w-full h-64 overflow-hidden">
                                                                    <img id="imageToCrop"
                                                                        src="{{ asset('storage/' . $existingPhoto) }}"
                                                                        alt="Para recortar" class="w-full">
                                                                </div>
                                                                <div class="flex justify-end mt-4 space-x-2">
                                                                    <button id="cancelButton"
                                                                        class="px-4 py-2 text-white bg-gray-600 rounded">Cancelar</button>
                                                                    <button id="cropButton"
                                                                        class="px-4 py-2 text-white bg-[#111e60]  rounded">Recortar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN CROPPER -->

                                                    </div>
                                                    <div class="text-lg text-center">Exp. No.</div>
                                                    <div class="text-lg font-bold text-center">{{ $record }}
                                                    </div>
                                                </div>
                                                <div class="mx-2">
                                                    <div class="flex flex-col py-1 border-b border-black">
                                                        <span>Nombre: </span>
                                                        <span
                                                            class="text-lg font-semibold uppercase flex items-center">{{ $name }}</span>
                                                    </div>
                                                    <div
                                                        class="flex flex-row justify-between py-1 border-b border-black">
                                                        <div><span>Parentesco: </span><span>{{ $relationship }}</span>
                                                        </div>
                                                        <div><span>Edad: </span><span>{{ $age }}</span></div>
                                                    </div>
                                                    <div class="flex flex-col py-1 border-b border-black">
                                                        <div class="flex flex-row justify-between">
                                                            <span>Empleado: </span>
                                                            <div>
                                                                <span>No. Empleado: </span>
                                                                <span class="font-bold">{{ $empCode }}</span>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-lg font-semibold uppercase flex items-center">{{ $empName }}</span>
                                                    </div>

                                                    <div class="flex flex-row justify-between py-1 flew-row">
                                                        <div class="flex flex-col mt-2">
                                                            <div>Vencimiento</div>
                                                            <div class="text-center">
                                                                {{ date('d-m-Y', strtotime($expirationDate)) }}</div>
                                                        </div>
                                                        <div class="flex flex-col w-1/2 pl-2 text-center border-black">
                                                            <div class="relative flex justify-center h-10">
                                                                @if (file_exists(asset('storage/' . $existingSign)))
                                                                    <img class="absolute w-10"
                                                                        src="{{ asset('storage/' . $existingSign) }}"
                                                                        alt="Firma Portador">
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="size-6">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                    </svg>
                                                                @endif
                                                            </div>
                                                            <div class="mb-2">
                                                                Firma del Portador
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- FIN CARNET FRENTE --}}

                                    {{-- CARNET REVERSO --}}
                                    <div id="id-card-back" class="border border-gray-200 w-[514.25px] h-[322px]">
                                        <div class="flex justify-center gap-3">
                                            <div class="grid grid-cols-[auto_1fr]  ">
                                                <div>
                                                    <div class="flex w-full pt-2">
                                                        <p class="p-2 text-sm text-justify">
                                                            La Comisión Administradora del Centro de Recreación y
                                                            Deportes del
                                                            Banco Central de Reserva de El Salvador, hace constar que el
                                                            portador,
                                                            cuya fotografía aparece en esta credencial, está autorizado
                                                            para ingresar
                                                            a las instalaciones, con CINCO acompañantes, sometiéndose en
                                                            todo al
                                                            cumplimiento de la Normativa respectiva y demás
                                                            disposiciones que se emitan
                                                            para el uso de las instalaciones. <br>
                                                            El costo de reposición por pérdida es de $10.00 <br>
                                                            En caso de extravío o pérdida notificar al 22818850
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="flex flex-col text-center justify-center relative mt-2">
                                                        <div class="flex justify-center  p-1">
                                                            <img src="{{ asset('assets/img/gs-sign.jpeg') }}"
                                                                alt="Firma GS" width="250px">
                                                        </div>
                                                        <div
                                                            class="flex flex-col justify-center absolute bottom-0 left-32 ">
                                                            <div>Autorizado</div>
                                                            <div>Gerencia de Seguridad Bancaria</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- FIN CARNET REVERSO --}}
                                </div>

                                <div class="flex justify-center">
                                    <button id="printButton"
                                        class="px-4 py-2 text-sm font-semibold text-white uppercase bg-cyan-400  rounded-md hover:bg-cyan-800">
                                        Generar carnet
                                    </button>
                                </div>

                                <div class="flex justify-center gap-3 mt-5">
                                    <x-primary-button>Guardar</x-primary-button>
                                    <a href="{{ route('beneficiaries.index') }}"
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
</div>
