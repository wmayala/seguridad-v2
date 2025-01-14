<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">ACTUALIZAR PERSONAL DE EMPRESA</div>
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
                                    <x-input-label class="uppercase">Zona restringida</x-input-label>
                                    <div class="flex justify-center gap-5">
                                        <div class="flex gap-3">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="zone" type="radio" id="zoneA" value="1">
                                            <label for="zoneA">Clase A</label>
                                        </div>
                                        <div class="flex gap-2">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="zone" type="radio" id="zoneB" value="2">
                                            <label for="zoneB">Clase B</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="zone" type="radio" id="zoneC" value="3">
                                            <label for="zoneC">Clase C</label>
                                        </div>
                                        <div class="flex gap-2">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="zone" type="radio" id="zoneN" value="0">
                                            <label for="zoneN">No Definida</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre</x-input-label>
                                    <x-text-input id="name" wire:model="name"
                                        placeholder="Nombre completo de la persona"></x-text-input>
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Cargo</x-input-label>
                                    <x-text-input id="position" wire:model="position"
                                        placeholder="Ej.: Agente de seguridad"></x-text-input>
                                    @error('position')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Género</x-input-label>
                                    <div class="flex justify-center gap-5">
                                        <div class="flex gap-3">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="gender" type="radio" id="masculino" value="1"
                                                checked>
                                            <label for="masculino">Masculino</label>
                                        </div>
                                        <div class="flex gap-2">
                                            <input
                                                class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                wire:model="gender" type="radio" id="femenino" value="0">
                                            <label for="femenino">Femenino</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Lugar de nacimiento</x-input-label>
                                    <x-text-input id="birthPlace" wire:model="birthPlace"
                                        placeholder="Ej.: San Salvador, San Salvador" autofocus></x-text-input>
                                    @error('birthPlace')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de nacimiento</x-input-label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="date" wire:model="birthDate" id="birthDate">
                                    @error('birthDate')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Dirección particular</x-input-label>
                                    <x-text-input id="address" wire:model="address"
                                        placeholder="Ej.: Colonia Las Rosas, calle 1, pasaje 1, casa #1, San Salvador"></x-text-input>
                                    @error('address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Teléfono</x-input-label>
                                    <x-text-input id="phone" wire:model="phone" maxlength="8"
                                        placeholder="Ej.: 22334455"></x-text-input>
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Móvil</x-input-label>
                                    <x-text-input id="mobile" wire:model="mobile" maxlength="8"
                                        placeholder="Ej.: 77889900"></x-text-input>
                                    @error('mobile')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">DUI</x-input-label>
                                    <x-text-input id="dui" wire:model="dui" maxlength="10"
                                        placeholder="Ej.: 12345678-9"></x-text-input>
                                    @error('dui')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Lugar de expedición DUI</x-input-label>
                                    <x-text-input id="duiPlace" wire:model="duiPlace"
                                        placeholder="Ej.: San Salvador, San Salvador"></x-text-input>
                                    @error('duiPlace')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de expedición DUI</x-input-label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="date" wire:model="duiDate" id="duiDate">
                                    @error('duiDate')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Profesión según DUI</x-input-label>
                                    <x-text-input id="duiProfession" wire:model="duiProfession"
                                        placeholder="Ej.: Empleado"></x-text-input>
                                    @error('duiProfession')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Licencia de conducir</x-input-label>
                                    <x-text-input id="driverLicense" wire:model="driverLicense" maxlength="14"
                                        placeholder="Ej.: 06145588991001"></x-text-input>
                                    @error('driverLicense')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Lugar de trabajo</x-input-label>
                                    <x-text-input id="workPlace" wire:model="workPlace"
                                        placeholder="Ej.: La Compañía S.A."></x-text-input>
                                    @error('workPlace')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Dirección de trabajo</x-input-label>
                                    <x-text-input id="workAddress" wire:model="workAddress"
                                        placeholder="Ej.: San Salvador, San Salvador"></x-text-input>
                                    @error('workAddress')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Teléfono de trabajo</x-input-label>
                                    <x-text-input id="workPhone" wire:model="workPhone" maxlength="8"
                                        placeholder="Ej.: 22334455"></x-text-input>
                                    @error('workPhone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Cónyuge</x-input-label>
                                    <x-text-input id="spouse" wire:model="spouse"
                                        placeholder="Nombre completo de cónyuge"></x-text-input>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre de la madre</x-input-label>
                                    <x-text-input id="motherName" wire:model="motherName"
                                        placeholder="Nombre completo de la madre"></x-text-input>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Nombre del padre</x-input-label>
                                    <x-text-input id="fatherName" wire:model="fatherName"
                                        placeholder="Nombre completo del padre"></x-text-input>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Dirección de los padres</x-input-label>
                                    <x-text-input id="parentsAddress" wire:model="parentsAddress"
                                        placeholder="Ej.: Colonia Las Rosas, calle 1, pasaje 1, casa #1, San Salvador"></x-text-input>
                                </div>
                                @error('parentsAddress')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Color de piel</x-input-label>
                                    <x-text-input id="skinColor" wire:model="skinColor"
                                        placeholder="Ej.: Trigueño(a)"></x-text-input>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Empresa</x-input-label>
                                    <select
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model.lazy="company_id" id="company_id">
                                        <option selected>Seleccionar</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Fecha de registro</x-input-label>
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
                                    @if (!$photo && $existingPhoto)
                                        <div class="mt-4">
                                            <x-input-label class="uppercase">Foto Actual</x-input-label>
                                            <div class="flex justify-center">
                                                <img src="{{ asset('storage/' . $existingPhoto) }}"
                                                    alt="Foto actual" width="140"
                                                    class="rounded-md shadow-md">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-input-label class="uppercase">Documento <span class="text-xs">(Puede adjuntar 1
                                            PDF)</span></x-input-label>
                                    <input type="file" wire:model="document" id="document" accept=".pdf"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                    <div wire:loading wire:target="document">Cargando documento...</div>
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
                                                <div>
                                                    <div class="border border-black ml-2">
                                                        <div class="w-32 h-40 overflow-hidden">
                                                            <img id="originalImage"
                                                                src="{{ asset('storage/' . $existingPhoto) }}"
                                                                alt="Imagen original"
                                                                class="object-cover w-full h-full cursor-pointer">
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
                                                    <div class="mt-6 text-xl text-center">Exp. No.</div>
                                                    <div class="text-2xl font-bold text-center">{{ $record }}
                                                    </div>
                                                </div>
                                                <div class="mx-2">
                                                    <div class="flex w-full py-1 border-b border-black">
                                                        <img src="{{ asset('assets/img/logo_bcr.png') }}"
                                                            alt="Logo BCR" width="60px">
                                                        <span
                                                            class="mx-2 text-lg font-bold text-center uppercase">Banco
                                                            Central de Reserva de El Salvador</span>
                                                    </div>
                                                    <div class="flex flex-col py-1 mb-1 border-b border-black">
                                                        <span>Nombre: </span>
                                                        <span
                                                            class="text-lg font-semibold uppercase flex items-center">{{ $name }}</span>
                                                    </div>
                                                    <div class="flex flex-row items-center py-1 border-b border-black">
                                                        <div>Empresa: </div>
                                                        <div
                                                            class="pl-2 w-[300px] h-[40px] truncate text-ellipsis text-lg font-semibold uppercase flex items-center ">
                                                            {{ $company_name }}</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between py-1 border-b border-black flew-row">
                                                        <div class="flex flex-col">
                                                            <div>Dui No.</div>
                                                            <div class="text-center">{{ $dui }}</div>
                                                        </div>
                                                        <div class="flex flex-col pr-2">
                                                            <div>Vencimiento</div>
                                                            <div class="text-center">
                                                                {{ date('d-m-Y', strtotime($expirationDate)) }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col w-full pl-2 text-center border-black">
                                                        <div class="relative flex justify-center h-10">
                                                            <img class="absolute w-10"
                                                                src="{{ asset('storage/' . $existingSign) }}"
                                                                alt="Firma Portador">
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
                                    <div id="id-card-back" class="border border-gray-200 w-[514.25px] h-[322px]">
                                        <div class="flex justify-center gap-3">
                                            <div class="grid grid-cols-[auto_1fr]  ">
                                                <div>
                                                    <div class="flex w-full py-2">
                                                        <p class="p-3 mx-2 text-justify">
                                                            Este carnet debe portarlo en forma visible al ingreso y
                                                            durante su permanencia en el BCR.
                                                            En caso de extravío o pérdida notificar al Tel.: 2281-8850.
                                                            El costo de reposición por pérdida
                                                            es de $10.00
                                                        </p>
                                                    </div>
                                                    <div class="flex flex-col w-full pl-2 text-center">
                                                        <div class="flex justify-center my-2">
                                                            <img src="{{ asset('assets/img/gs-sign.jpeg') }}"
                                                                alt="Firma GS" width="275px">
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

                                </div>
                                <div class="flex justify-center">
                                    <button id="printButton"
                                        class="px-4 py-2 text-sm font-semibold text-white uppercase bg-cyan-400  rounded-md hover:bg-cyan-800">
                                        Generar carnet
                                    </button>
                                </div>
                                <div class="flex justify-center gap-3 mt-5">
                                    <x-primary-button>Guardar</x-primary-button>
                                    <a href="{{ route('cstaff.index') }}"
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
