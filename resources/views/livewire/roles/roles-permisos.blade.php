<div>
    @include('layouts.notif')
    <form class="container flex flex-col mx-auto space-y-12">
        <div class="grid grid-cols-12 rounded-md shadow-md  shadow-gray-300  p-4">
            <div class="col-span-full sm:col-span-3 border-r-2 border-r-gray-200 mr-5">
                <div class="space-y-2 col-span-full lg:col-span-1">
                    <p class="font-medium">Roles</p>
                    <p class="text-xs">Son un conjunto de permisos, agrupados para asignárselos a uno o muchos
                        usuarios.</p>
                </div>
            </div>
            <div class="col-span-full sm:col-span-9">
                <div>
                    <select wire:model="selectedRol" class="rounded-md  focus:ring-opacity-25 border-transparent shadow-md"
                            autocomplete="rol" name="roles" id="roles" wire:change="cambiarRol()">

                        <option value="0" disabled selected>Seleccione rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->name }}">{{ $rol->title }}</option>
                        @endforeach
                    </select>

                    @if (Auth::user()->can('crear-rol'))
                        @if (!$nuevoRol)
                            <a wire:click="formNuevoRol(true)" class="p-2 ml-5 transition duration-300 ease-in-out hover:bg-green-200 rounded-md hover:cursor-pointer shadow-xl bg-green-100 shadow-green-500/50 inline-flex hover:shadow-none items-center dark:text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-3" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                                Agregar
                            </a>
                        @else
                            <a wire:click="formNuevoRol(false)" class="p-2 ml-5 transition duration-300 ease-in-out hover:bg-gray-200 rounded-md hover:cursor-pointer shadow-xl bg-gray-100 shadow-gray-500/50 inline-flex hover:shadow-none items-center dark:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-3" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                                Cancelar
                            </a>
                        @endif
                    @endif
                </div>

                @if ($nuevoRol)
                    <div>
                        <input type="text"
                            class="rounded-md m-3 focus:ring-opacity-25 border-transparent shadow-md dark:border-gray-700 dark:text-gray-900 "
                            placeholder="Escriba nuevo rol">

                        <a
                            class="p-2 ml-5 transition duration-300 ease-in-out hover:bg-blue-200 rounded-md hover:cursor-pointer shadow-xl bg-blue-100 shadow-blue-500/50 inline-flex hover:shadow-none items-center dark:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-3" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                            Guardar
                        </a>
                    </div>
                @endif

                <div>
                    <div class="grid gap-y-3 my-10 grid-cols-2 sm:grid-cols-4 ">
                        @foreach ($permisos as $permiso)
                            <div class="flex items-start space-x-3 py-2 ">
                                <input type="checkbox" value="{{ $permiso->id }}" wire:model="permisosSeleccionados"
                                    class="rounded h-5 w-5 border-transparent shadow-sm shadow-gray-400" @if(in_array($permiso->id, $permisosSeleccionados)) checked @endif>
                                <div class="flex flex-col">
                                    <label for="permiso" class="block">{{ $permiso->title }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                @if (Auth::user()->can('modificar-rol'))
                    <div class="flex">
                        <x-primary-button wire:click.prevent="create">Guardar</x-primary-button>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
