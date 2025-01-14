<div class="flex overflow-y-auto h-dvh">
    <div class="flex w-full py-6">
        <div class="w-full mx-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#111e60] text-bold text-3xl mb-5">INSTITUCIONES DEL SISTEMA FINANCIERO</div>
                        @if (Auth::user()->can('crear-institucion'))
                            <div>
                                <a href="{{ route('institutions.create') }}" class="inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-[#111e60] focus:bg-[#111e60]-700 active:bg-[#111e60]-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar institución</a>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-center my-4">
                        <x-text-input
                            id="search"
                            class="w-3/5"
                            wire:model.live="search"
                            placeholder="Escriba la institución a buscar..."
                            autofocus>
                        </x-text-input>
                    </div>
                    <table class="w-full text-lg text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-lg text-white uppercase bg-[#111e60] dark:bg-gray-700 dark:text-gray-400">
                            <th class="p-3">NOMBRE DE LA INSTITUCIÓN</th>
                            <th class="p-3">ESTADO</th>
                            <th class="p-3 text-center">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                                <td class="p-3 text-lg">{{ $institution->name }}</td>
                                <td class="p-3 text-lg">
                                    @if($institution->status==1)
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-green-700 uppercase rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">Activo</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-red-700 uppercase rounded-md bg-red-50 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($institution->id!=1000)
                                        @if (Auth::user()->can('modificar-institucion'))
                                            <button wire:click="redirectTo('institutions.edit',{{ $institution->id }})" class="px-2 py-1 text-white bg-yellow-400 rounded">Editar</button>
                                        @endif
                                        @if (Auth::user()->can('eliminar-institucion'))
                                            <button onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click="delete({{ $institution->id }})" class="px-2 py-1 text-white bg-red-400 rounded">Eliminar</button>
                                        @endif
                                    @endif
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
