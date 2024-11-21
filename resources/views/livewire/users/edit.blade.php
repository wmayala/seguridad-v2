<div class="flex">
    <div class="py-6 flex w-full">
        <div class="mx-full sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-[#111e60] text-bold text-3xl mb-5">ACTUALIZAR USUARIO</div>
                        <form wire:submit.prevent="update">
                            <div class="flex justify-center">
                                <div class="flex flex-col gap-5 w-1/2">
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">
                                            Nombre
                                        </x-input-label>
                                        <x-text-input id="name" wire:model="name" disabled></x-text-input>
                                        @error('name')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">
                                            Correo electrónico
                                        </x-input-label>
                                        <x-text-input id="name" wire:model="email" disabled></x-text-input>
                                        @error('email')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-input-label class="uppercase">
                                            Estado del registro
                                        </x-input-label>
                                        <div class="flex justify-center gap-8">
                                            <div class="flex gap-2">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="status"
                                                       type="radio"
                                                       id="act"
                                                       value="1">
                                                <label for="act">ACTIVO</label>
                                            </div>
                                            <div class="flex gap-2">
                                                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                                                       wire:model="status"
                                                       type="radio"
                                                       id="inact"
                                                       value="0">
                                                <label for="inact">INACTIVO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center gap-3 mt-5">
                                        <x-primary-button>
                                            Guardar
                                        </x-primary-button>
                                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-[#111e60]-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
