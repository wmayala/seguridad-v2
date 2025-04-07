<div class="flex h-dvh overflow-y-auto">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-[#F5F7FE] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#303845] text-bold text-3xl mb-5">PERSONAL POR EMPRESAS</div>
                        @if(Auth::user()->can('crear-personal-emp'))
                            <div>
                                <a href="{{ route('cstaff.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-[#303845] border border-transparent rounded-full font-semibold text-md text-white uppercase tracking-widest hover:opacity-80 focus:bg-[#303845]-700 active:bg-[#303845]-900 focus:outline-none focus:ring-2 focus:ring-[#303845] focus:ring-offset-2 transition ease-in-out duration-150">Agregar personal</a>
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
                            <label class="relative inline-flex items-center cursor-pointer">
                                <button
                                    class="bg-[#303845] hover:opacity-80  text-white font-bold py-1 px-3 rounded-full"
                                    wire:click="viewAll">
                                        <span>Ver inactivos</span>
                                </button>
                            </label>
                        </div>
                    </div>
                    <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-white uppercase bg-[#303845] dark:bg-gray-700 dark:text-gray-400">
                            <th></th>
                            <th class="text-center p-3">EXPEDIENTE</th>
                            <th class="text-center p-3">ZONA</th>
                            <th class="text-center p-3">NOMBRE</th>
                            <th class="text-center p-3">DUI</th>
                            <th class="text-center p-3">EMISIÓN</th>
                            <th class="text-center p-3">VENCIMIENTO</th>
                            <th class="text-center p-3">ESTADO</th>
                            <th class="text-center p-3">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($CStaff as $cstaff)
                            <tr class="border-b hover:bg-gray-200 hover:text-[#303845]">
                                <td class="text-lg p-3"><img src="{{ asset('storage/'.$cstaff->photo) }}" alt="" width="50"></td>
                                <td class="text-lg text-center p-3">{{ $cstaff->record }}</td>
                                <td class="text-lg text-center p-3">
                                    {{ $cstaff->zone===0?'No Definida':
                                        ($cstaff->zone===1?'A':
                                        ($cstaff->zone===2?'B':
                                        ($cstaff->zone===3?'C':''))) }}
                                </td>
                                <td class="text-lg p-3">{{ $cstaff->name }}</td>
                                <td class="text-lg text-center p-3">{{ $cstaff->dui }}</td>
                                <td class="text-lg text-center p-3">{{ date('d-m-Y', strtotime($cstaff->issueDate)) }}</td>
                                <td class="text-lg text-center p-3">{{ date('d-m-Y', strtotime($cstaff->expirationDate)) }}</td>
                                <td class="text-lg p-3">
                                    @if($cstaff->status==1)
                                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(Auth::user()->can('modificar-personal-emp'))
                                        <button wire:click="redirectTo('cstaff.edit',{{ $cstaff->id }})"
                                            class="px-2 border border-[#303845] text-[#303845] rounded-full hover:bg-[#303845] hover:text-white">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                    @if(Auth::user()->can('eliminar-personal-emp'))
                                        <button onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $cstaff->id }})"
                                            class="px-2 border border-[#303845] text-[#303845] rounded-full hover:bg-[#303845] hover:text-white">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $CStaff->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
