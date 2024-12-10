<div class="flex justify-center gap-3 mt-5">
    <div class="grid grid-cols-[auto_1fr] border-4 border-green-600 ">
        <div>
            <div class="border border-black">
                <div class="h-40 w-32 border overflow-hidden">
                    <img id="originalImage" src="{{ asset('storage/' . $existingPhoto) }}" alt="Imagen original" class="cursor-pointer w-full h-full object-cover">
                </div>

                <!-- CROPPER -->
                <div id="cropperModal" class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
                    <h2 class="text-xl font-bold mb-4">Ajusta tu imagen</h2>
                    <div class="w-full h-64 overflow-hidden">
                        <img id="imageToCrop" src="{{ asset('storage/' . $existingPhoto) }}" alt="Para recortar" class="w-full">
                    </div>
                    <div class="flex justify-end mt-4 space-x-2">
                        <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                        <button id="cropButton" class="bg-blue-500 text-white px-4 py-2 rounded">Recortar</button>
                    </div>
                    </div>
                </div>
                <!-- FIN CROPPER -->

            </div>
            <div class="text-center text-xl mt-6">Exp. No.</div>
            <div class="text-center text-2xl font-bold">{{ $record }}</div>
        </div>
        <div>
            <div class="flex border border-black w-full pl-2 py-2">
                <img src="{{ asset('assets/img/logo_bcr.png') }}" alt="Logo BCR" width="60px">
                <span class="text-xl text-center font-bold uppercase">Banco Central de Reserva de El Salvador</span>
            </div>
            <div class="flex flex-row border pl-2  border-black py-2">
                <div>Nombre: </div>
                <div class="flex flex-col pl-3">
                    <span class="text-xl uppercase">{{ $name }}</span>
                </div>
            </div>
            <div class="flex flex-row border pl-2 border-black py-2">
                <div>Cargo: </div>
                <div class="uppercase pl-3 text-xl">{{ $position }}</div>
            </div>
            <div class="flex flew-row justify-between border border-black">
                <div class="flex flex-col pl-2">
                    <div>Dui No.</div>
                    <div class="text-center">{{ $dui }}</div>
                </div>
                <div class="flex flex-col pr-2">
                    <div>Vencimiento</div>
                    <div class="text-center">{{ $expirationDate }}</div>
                </div>
            </div>
            <div class="flex flex-col text-center pl-2 w-full border border-black">
                <div class="flex justify-center relative h-10">
                    <img class="absolute w-10" src="{{ asset('assets/img/firma-removebg.png') }}" alt="Firma Portador" >
                </div>
                <div class="mb-2">
                    Firma del Portador
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FIN CARNET FRENTE --}}
