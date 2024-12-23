<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div  class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#111e60] text-bold text-3xl mb-5">JUBILADOS</div>

                        @if (Auth::user()->can('crear-jubilado'))
                            <div>
                                <a href="{{ route('retired.create') }}" class="inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-[#111e60] focus:bg-[#111e60]-700 active:bg-[#111e60]-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar jubilado</a>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-center my-4">
                        <x-text-input
                            id="search"
                            class="w-3/5"
                            wire:model.live="search"
                            placeholder="Escriba el nombre del personal a buscar..."
                            autofocus>
                        </x-text-input>
                    </div>
                    <div  class="flex justify-end p-3">
                        <div class="flex items-center">
                            <span class="text-gray-700 mr-3">Ver inactivos</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" class="sr-only peer" wire:model.live="showInactive">
                              <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-500 peer-focus:ring-offset-2 rounded-full peer peer-checked:bg-blue-500 peer-checked:after:translate-x-5 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                            </label>
                            {{-- <span class="text-gray-700 ml-3">On</span> --}}
                        </div>
                    </div>

                    <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-white uppercase bg-[#111e60] dark:bg-gray-700 dark:text-gray-400">
                            <th></th>
                            <th class="text-center p-3">EXPEDIENTE</th>
                            <th class="text-center p-3">NOMBRE</th>
                            <th class="text-center p-3">DUI</th>
                            <th class="text-center p-3">EMISIÓN</th>
                            <th class="text-center p-3">ESTADO</th>
                            <th class="text-center p-3">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($retired as $ret)

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                                    <td class="text-lg p-3"><img src="{{ asset('storage/'.$ret->photo) }}" alt="" width="100"></td>
                                    <td class="text-center text-lg p-3">{{ $ret->record }}</td>
                                    <td class="text-lg p-3">{{ $ret->name }}</td>
                                    <td class="text-center text-lg p-3">{{ $ret->dui }}</td>
                                    <td class="text-center text-lg p-3">{{ $ret->issueDate }}</td>
                                    <td class="text-center text-lg p-3">
                                        @if($ret->status==1)
                                            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                                        @else
                                            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (Auth::user()->can('modificar-jubilado'))
                                            <button wire:click="redirectTo('retired.edit',{{ $ret->id }})" class="px-2 py-1 bg-yellow-400 text-white rounded">Editar</button>
                                        @endif

                                        @if (Auth::user()->can('eliminar-jubilado'))
                                            <button wire:click="delete({{ $ret->id }})" class="px-2 py-1 bg-red-400 text-white rounded">Eliminar</button>
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
