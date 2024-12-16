<div class="flex">
    @include('layouts.notif')
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">AGREGAR USUARIO</div>
                        <form>
                            <div class="flex justify-center">
                                <div class="flex flex-col gap-5 w-1/2">
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">CORREO</x-input-label>
                                        <div class="flex">
                                            <x-text-input class="w-full" id="correo" wire:model="correo" placeholder="Correo del usuario" autofocus></x-text-input>
                                            
                                            <button wire:click.prevent="getUsuario()" class="ml-8 bg-gray-600 rounded-full p-3 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('correo')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="pt-3">
                                            <label class="lbl-title" for="Nombre">Nombre:</label>
                                            <span class="font-bold">{{ $usuario }}</span>
                                        </div>

                                        @if ($guardar)
                                            <div class="pt-5">
                                                <label class="lbl-title" for="rol">Asignar rol:</label>
                                                <div class="mt-3">
                                                    @foreach ($roles as $rol)
                                                        <input type="checkbox" class="rounded-sm" value="{{ $rol->id }}" wire:model="rolSeleccionados">
                                                        <span class="font-bold mr-5">{{ $rol->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex justify-center gap-3 mt-5">
                                        @if ($guardar)
                                            <x-primary-button wire:click.prevent="create">Guardar</x-primary-button>
                                        @endif

                                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-[#111e60]-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
