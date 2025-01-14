<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#111e60] text-bold text-3xl mb-5">FIRMAS AUTORIZADAS</div>
                        <div>
                            <a href="{{ route('signatures.create') }}" class="inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-[#111e60] focus:bg-[#111e60]-700 active:bg-[#111e60]-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar documento</a>
                        </div>
                    </div>
                    <div  class="flex justify-end p-3">
                        <div class="flex items-center">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <button
                                    class="bg-[#111e60] hover:opacity-80  text-white font-bold py-1 px-3 rounded-full"
                                    wire:click="viewAll">
                                        <span>Ver inactivos</span>
                                </button>
                            </label>
                        </div>
                    </div>
                    <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-white uppercase bg-[#111e60] dark:bg-gray-700 dark:text-gray-400">
                            <th class="text-center p-3">EXPEDIENTE</th>
                            <th class="text-center p-3">INSTITUCIÓN</th>
                            <th class="text-center p-3">DOCUMENTO</th>
                            <th class="text-center p-3">DESCRIPCIÓN</th>
                            <th class="text-center p-3">EMISIÓN</th>
                            <th class="text-center p-3">VENCIMIENTO</th>
                            <th class="text-center p-3">ESTADO</th>
                            <th class="text-center p-3">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($signatures as $sign)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                                <td class="text-lg text-center p-3">{{ $sign->record }}</td>
                                <td class="text-lg p-3">
                                    @foreach($institutions as $institution)
                                        @if($sign->institution_id===$institution->id)
                                            {{ $institution->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-lg text-center p-3">
                                    <a href="{{ asset('storage').'/'.$sign->document }}" target="_blank">
                                        <div class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-small rounded-full text-xs px-3 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" >
                                            Ver documento
                                        </div>
                                    </a>
                                </td>
                                <td class="text-lg text-center p-3">{{ $sign->description?'':'N/A' }}</td>
                                <td class="text-lg text-center p-3">{{ $sign->issueDate }}</td>
                                <td class="text-lg text-center p-3">{{ $sign->expirationDate }}</td>
                                <td class="text-lg text-center p-3">
                                    @if($sign->status==1)
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button wire:click="redirectTo('signatures.edit',{{ $sign->id }})" class="px-2 py-1 bg-yellow-400 text-white rounded">Editar</button>
                                    <button onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click="delete({{ $sign->id }})" class="px-2 py-1 bg-red-400 text-white rounded">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
