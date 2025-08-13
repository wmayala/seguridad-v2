<div>
    <div class="grid grid-cols-1 bg-[#F5F7FE] rounded-lg">
        <div class="row">
            <div class="text-[#303845] text-bold text-center text-3xl mt-5 mb-5">CONTROL DE ACCESO DE PERSONAL</div>
        </div>

        <div class="row">
            <div class="flex flex-col justify-start items-center gap-2 mb-5">
                <x-input-label class="text-lg uppercase">Ingresar consulta</x-input-label>
                <x-text-input class="text-center"
                    id="query"
                    wire:model="query"
                    wire:keydown.enter="verifyAccess()"
                    maxlength="10"
                    autofocus>
                </x-text-input>
                @error('query')<span class="text-red-500 text-sm font-bold">{{ $message }}</span>@enderror
            </div>
            <div class="text-center mb-5">
                <x-primary-button class="bg-[#303845]" wire:click="verifyAccess()">
                    <div class="w-full">Consultar</div>
                </x-primary-button>

            </div>
        </div>

        @if($result)
            @if (\Carbon\Carbon::parse($result->expirationDate)->gt(today()))
                <div class="row">
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mx-40 my-3" role="alert">
                        <div class="flex justify-center items-center gap-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                            </span>
                            <span class="font-bold text-2xl uppercase">Usuario activo</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mx-40 my-3" role="alert">
                        <div class="flex justify-center items-center gap-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                            </span>
                            <span class="font-bold text-2xl uppercase">Usuario expirado</span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="grid grid-cols-[25%_75%] w-3/4 mx-auto gap-5 mb-3">
                    <div class=" flex items-center justify-center">
                        <img src="{{ $result->photo }}" alt="" class="max-w-full max-h-full">
                    </div>
                    <div class="flex flex-col justify-center ml-20">
                        <span class="text-xs uppercase">Expediente</span>
                        <span class="text-2xl font-bold uppercase p-1 mb-3">{{ $result->record }}</span>
                        <span class="text-xs uppercase">Nombre</span>
                        <span class="text-2xl font-bold uppercase p-1 mb-3">{{ $result->name }}</span>
                        <span class="text-xs uppercase">Institución</span>
                        <span class="text-lg font-bold uppercase p-1 mb-3">{{ $result->institution->name }}</span>
                        <span class="text-xs uppercase">Cargo</span>
                        <span class="text-lg font-bold uppercase p-1 mb-3">{{ $result->position }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="grid grid-cols-3 w-3/4 mx-auto gap-5">
                    <div class="rounded-full bg-[#313846] text-white text-xl font-bold text-center p-2 mr-20">{{ $result->dui }}</div>
                    <div class="flex flex-col">
                        <span class="text-xs uppercase">Expedición</span>
                        <span class="text-2xl font-bold">{{ date('d-m-Y', strtotime($result->issueDate)) }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs uppercase">Vencimiento</span>
                        <span class="text-2xl font-bold">{{  date('d-m-Y', strtotime($result->expirationDate)) }}</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-5 mb-5">
                <button wire:click="confirmAccess()"
                    class="my-5 px-2 py-1 bg-black text-white font-semibold rounded-full w-1/6 hover:opacity-75"
                >
                    OK
                </button>
            </div>
        @endif
    </div>
</div>
