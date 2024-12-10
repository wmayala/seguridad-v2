<div class="flex">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        @include('layouts.notif')
                        <div class="text-[#111e60] text-bold text-3xl mb-5">EMPRESAS</div>

                        @if (Auth::user()->can('crear-compania'))
                            <div>
                                <a href="{{ route('companies.create') }}" class="inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-[#111e60] focus:bg-[#111e60]-700 active:bg-[#111e60]-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar empresa</a>
                            </div>
                        @endif
                    </div>
                    <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-white uppercase bg-[#111e60] dark:bg-gray-700 dark:text-gray-400">
                            <th class="p-3">NOMBRE DE LA EMPRESA</th>
                            <th class="p-3">ESTADO</th>
                            <th class="text-center p-3">ACCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 hover:text-[#111e60]">
                                <td class="text-lg p-3">{{ $company->name }}</td>
                                <td class="text-lg p-3">
                                    @if($company->status==1)
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs uppercase text-green-700 ring-1 ring-inset ring-green-600/20">Activo</span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs uppercase text-red-700 ring-1 ring-inset ring-red-600/10">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (Auth::user()->can('modificar-compania'))
                                        <button wire:click="redirectTo('companies.edit',{{ $company->id }})" class="px-2 py-1 bg-yellow-400 text-white rounded">Editar</button>
                                    @endif

                                    @if (Auth::user()->can('eliminar-compania'))
                                        <button wire:click="delete({{ $company->id }})" class="px-2 py-1 bg-red-400 text-white rounded">Eliminar</button>
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
