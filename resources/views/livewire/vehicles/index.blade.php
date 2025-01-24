<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#111e60] text-bold text-3xl mb-5">VEHÍCULOS DEL SISTEMA FINANCIERO</div>
                        @if(Auth::user()->can('crear-usuario'))
                            <div>
                                <a href="{{ route('vehicles.create') }}" class="inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-[#111e60] focus:bg-[#111e60]-700 active:bg-[#111e60]-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar vehículo</a>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-center my-4">
                        <x-text-input
                            id="search"
                            class="w-3/5"
                            wire:model.live="search"
                            placeholder="Escriba el número de placa a buscar..."
                            autofocus>
                        </x-text-input>
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
                            <th class="text-center p-3">PLACA</th>
                            <th class="text-center p-3">CLASE</th>
                            <th class="text-center p-3">MARCA</th>
                            <th class="text-center p-3">COLOR</th>
                            <th class="text-center p-3">EMISIÓN</th>
                            <th class="text-center p-3">VENCIMIENTO</th>
                            <th class="text-center p-3">ESTADO</th>
                            <th class="text-center p-3">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                                <td class="text-lg text-center p-3">{{ $vehicle->record }}</td>
                                <td class="text-lg text-center p-3">{{ $vehicle->plate }}</td>
                                <td class="text-lg text-center p-3">{{ $vehicle->type }}</td>
                                <td class="text-lg text-center p-3">{{ $vehicle->brand }}</td>
                                <td class="text-lg text-center p-3">{{ $vehicle->color }}</td>
                                <td class="text-lg text-center p-3">{{ date('d-m-Y', strtotime($vehicle->issueDate)) }}</td>
                                <td class="text-lg text-center p-3">{{ date('d-m-Y', strtotime($vehicle->expirationDate)) }}</td>
                                <td class="text-lg p-3">
                                    @if($vehicle->status==1)
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(Auth::user()->can('modificar-vehiculo'))
                                        <button wire:click="redirectTo('vehicles.edit',{{ $vehicle->id }})" class="px-2 py-1 bg-yellow-400 text-white rounded">Editar</button>
                                    @endif
                                    @if(Auth::user()->can('eliminar-vehiculo'))
                                        <button onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click="delete({{ $vehicle->id }})" class="px-2 py-1 bg-red-400 text-white rounded">Eliminar</button>
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
