<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">REGISTRO DE VEHÍCULOS DEL SISTEMA FINANCIERO</div>
                        <form wire:submit.prevent="update" >
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
                                                <x-input-label class="uppercase">Vista previa</x-input-label>
                                                <div class="flex justify-center">
                                                    <img src="{{ $photo->temporaryUrl() }}" alt="Vista previa" width="140" class="rounded-md shadow-md">
                                                </div>
                                            </div>
                                        @endif

                                        @if(!$photo && $existingPhoto)
                                            <div class="mt-4">
                                                <x-input-label class="uppercase">Foto Actual</x-input-label>
                                                <div class="flex justify-center">
                                                    <img src="{{ asset('storage/'.$existingPhoto) }}" alt="Foto actual" width="140" class="rounded-md shadow-md">
                                                </div>
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

                                    <div class="flex flex-col justify-center items-center gap-5">
                                        {{-- CARNET FRENTE --}}
                                        <div id="id-card-front" class="w-[517px] h-[325px] border-[12px]">
                                            <div class="flex justify-center gap-3">
                                                <div class="grid grid-cols-[auto_1fr]">
                                                    <div>
                                                        <div class="flex justify-center p-3">
                                                            <img src="{{ asset('assets/img/logo_bcr.png') }}" alt="Logo BCR" width="60px">
                                                        </div>
                                                        <div class="border border-black">
                                                            <div class="w-40 h-32 overflow-hidden">
                                                                <img id="originalImage" src="{{ asset('storage/' . $existingPhoto) }}" alt="Imagen original" class="object-cover w-full h-full cursor-pointer">
                                                            </div>

                                                            <!-- CROPPER -->
                                                            <div id="cropperModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                                                                <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
                                                                <h2 class="mb-4 text-xl font-bold">Ajustar imagen</h2>
                                                                <div class="w-full h-64 overflow-hidden">
                                                                    <img id="imageToCrop" src="{{ asset('storage/' . $existingPhoto) }}" alt="Para recortar" class="w-full">
                                                                </div>
                                                                <div class="flex justify-end mt-4 space-x-2">
                                                                    <button id="cancelButton" class="px-4 py-2 text-white bg-gray-600 rounded">Cancelar</button>
                                                                    <button id="cropButton" class="px-4 py-2 text-white bg-[#111e60]  rounded">Recortar</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!-- FIN CROPPER -->

                                                        </div>
                                                        <div class="mt-2 text-xl text-center">Exp. No.</div>
                                                        <div class="text-2xl font-bold text-center">{{ $record }}</div>
                                                    </div>
                                                    <div class="mx-2">
                                                        <div class="flex flex-col text-center w-full py-1 border-b border-black">
                                                            <span class="mx-2 text-lg font-bold text-center uppercase">Banco Central de Reserva de El Salvador</span>
                                                            <span class="text-sm font-bold uppercase">Tarjeta de autorización</span>
                                                        </div>
                                                        <div class="flex flex-col py-1 mb-1 border-b border-black">
                                                            <p class="text-justify text-sm">
                                                                El Gerente de Operaciones Financieras del Banco Central de Reserva, autoriza el
                                                                vehículo cuyas características aparecen en esta tarjeta, para ingresar a zona restringida de carga y descarga de especies monetarias del Departamento de Tesorería.
                                                            </p>

                                                        </div>

                                                        <div class="flex flex-col w-full text-center border-black">
                                                            <div class="relative flex justify-center h-10">
                                                                <img class="absolute w-32 " src="{{ asset('assets/img/gof-sign.jpeg') }}" alt="Firma Portador" >
                                                            </div>
                                                            <div class="mt-3">
                                                                Gerente de Operaciones Financieras
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- FIN CARNET FRENTE --}}

                                        {{-- CARNET REVERSO --}}
                                        <div id="id-card-back" class="border border-gray-200 w-[514.25px] h-[322px]">
                                            <div class="flex flex-col justify-center gap-3">
                                                <div class="w-full">
                                                    <div class="uppercase text-center text-lg font-bold mt-2">Características del vehículo</div>
                                                </div>
                                                <div class="flex justify-center px-3">
                                                    <table class="w-full border-b border-black">
                                                        <tbody>
                                                            <tr>
                                                                <td class="">CLASE:</td>
                                                                <td class="uppercase">{{ $type }}</td>
                                                                <td class="">MARCA:</td>
                                                                <td class="uppercase">{{ $brand }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="">COLOR:</td>
                                                                <td class="uppercase">{{ $color }}</td>
                                                                <td class="">PLACA:</td>
                                                                <td class="uppercase">{{ $plate }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" class="text-center">EMPRESA: {{ $institution_name }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center">
                                                    <span class="text-sm font-semibold">Nota: Al caducar, deberá devolverse a la Gerencia de Seguridad del BCR</span>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex flex-col justify-center w-1/2 mx-3">
                                                        <img src="{{ asset('assets/img/gs-sign.jpeg') }}" alt="Firma GS" width="250px">
                                                        <span class="border-t border-black text-center">Vo. Bo. Gerencia de Seguridad</span>
                                                    </div>
                                                    <div class="w-1/2 mt-5">
                                                        <div class="text-center">Vencimiento: <strong>{{ date('d-m-Y', strtotime($expirationDate)) }}</strong></div>
                                                        <div class="text-justify text-sm font-bold mx-3 mt-5">En caso de extravío o pérdida, notificar al 2281-8850</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- FIN CARNET REVERSO --}}
                                    </div>

                                    <div class="flex justify-center">
                                        <button id="printButton" class="px-4 py-2 text-sm font-semibold text-white uppercase bg-cyan-400  rounded-md hover:bg-cyan-800">
                                            Generar carnet
                                        </button>
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

