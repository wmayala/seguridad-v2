<div class="flex h-dvh overflow-y-auto">
    @include('layouts.notif')
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-[#F5F7FE] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-[#303845] text-bold text-3xl mb-5">REPORTE DE ACCESOS</div>
                        <div class="mb-5">
                            <select name="filterType" id="filterType" wire:model.lazy="filterType"
                                class="border-gray-300 focus:border-[#303845] focus:ring-[#303845] rounded-md shadow-sm">
                                <option value = "" disabled>Seleccione una opción</option>
                                <option value = "1">Personal Sistema Financiero (Zona A)</option>
                                <option value = "2">Vehículos Sistema Financiero</option>
                                <option value = "3">Beneficiarios</option>
                            </select>
                        </div>
                        @if($filterType)
                            <div class="flex gap-3 mb-3">
                                <div class="flex flex-col">
                                    <label for="start">Fecha inicio:</label>
                                    <input type="date" id="start" wire:model.lazy="start" class="border-gray-300 focus:border-[#303845] focus:ring-[#303845] rounded-md shadow-sm">
                                </div>
                                <div class="flex flex-col">
                                    <label for="end">Fecha fin:</label>
                                    <input type="date" id="end" wire:model.lazy="end" class="border-gray-300 focus:border-[#303845] focus:ring-[#303845] rounded-md shadow-sm">
                                </div>
                            </div>
                            <button wire:click="clearInputs()"
                                class="bg-[#303845] border rounded-full font-semibold text-white text-sm uppercase py-2 px-4 tracking-widest hover:opacity-85 active:bg-[#303845] focus:outline-none focus:ring-2 focus:ring-[#303845] focus:ring-offset-2 transition ease-in-out duration-150 mb-3"
                            >
                                Limpiar
                            </button>
                        @endif
                    </div>

                    @if($filterType == 1)
                        <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-white uppercase bg-[#303845]">
                                <th class="p-2">#</th>
                                <th class="p-2">DUI</th>
                                <th class="p-2">NOMBRE</th>
                                <th class="p-2">CARGO</th>
                                <th class="p-2">INSTITUCION</th>
                                <th class="p-2">ENTRADA</th>
                                <th class="p-2">SALIDA</th>
                            </thead>
                            <tbody>
                                @foreach($accesses as $access)
                                <tr class="text-sm border-b hover:bg-gray-200 hover:text-[#303845]">
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $access->identifier }}</td>
                                    <td class="p-2">{{ $access->sf_staff?->name }}</td>
                                    <td class="p-2">{{ $access->sf_staff?->position }}</td>
                                    <td class="p-2">{{ $access->sf_staff?->institution?->name }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($access->start_at)->format('d/m/Y - H:i:s') }}</td>
                                    <td class="p-2">{{ $access->end_at != null ?? \Carbon\Carbon::parse($access->end_at)->format('d/m/Y - H:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif($filterType == 2)
                        <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-white uppercase bg-[#303845]">
                                <th class="p-2">#</th>
                                <th class="p-2">PLACA</th>
                                <th class="p-2">INSTITUCION</th>
                                <th class="p-2">MARCA</th>
                                <th class="p-2">COLOR</th>
                                <th class="p-2">ENTRADA</th>
                                <th class="p-2">SALIDA</th>
                            </thead>
                            <tbody>
                                @foreach($accesses as $access)
                                <tr class="text-sm border-b hover:bg-gray-200 hover:text-[#303845]">
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $access->identifier }}</td>
                                    <td class="p-2">{{ $access->sf_vehicle?->institution?->name }}</td>
                                    <td class="p-2">{{ $access->sf_vehicle?->brand }}</td>
                                    <td class="p-2">{{ $access->sf_vehicle?->color }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($access->start_at)->format('d/m/Y - H:i:s') }}</td>
                                    <td class="p-2">{{ $access->end_at != null ?? \Carbon\Carbon::parse($access->end_at)->format('d/m/Y - H:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif($filterType == 3)
                        <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white uppercase bg-[#303845]">
                            <th class="p-2">#</th>
                            <th class="p-2">EXPEDIENTE</th>
                            <th class="p-2">NOMBRE</th>
                            <th class="p-2">PARENTESCO</th>
                            <th class="p-2">EMPLEADO</th>
                            <th class="p-2">ENTRADA</th>
                            <th class="p-2">SALIDA</th>
                        </thead>
                        <tbody>
                             @foreach($accesses as $access)
                            <tr class="text-sm border-b hover:bg-gray-200 hover:text-[#303845]">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $access->identifier }}</td>
                                <td class="p-2">{{ $access->beneficiary?->name }}</td>
                                <td class="p-2">{{ $access->beneficiary?->relationship }}</td>
                                <td class="p-2">{{ $access->beneficiary?->empName }}</td>
                                <td class="p-2">{{ \Carbon\Carbon::parse($access->start_at)->format('d/m/Y - H:i:s') }}</td>
                                <td class="p-2">{{ $access->end_at != null ?? \Carbon\Carbon::parse($access->end_at)->format('d/m/Y - H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                    @if(Auth::user()->can('generar-reporte') && $filterType)
                        <div class="flex justify-center mt-5">
                            <button wire:click="exportPDF()" class="inline-flex items-center px-4 py-2 bg-[#303845] border rounded-full font-semibold text-md text-white uppercase tracking-widest hover:opacity-85 active:bg-[#303845] focus:outline-none focus:ring-2 focus:ring-[#303845] focus:ring-offset-2 transition ease-in-out duration-150">
                                Generar reporte PDF
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
