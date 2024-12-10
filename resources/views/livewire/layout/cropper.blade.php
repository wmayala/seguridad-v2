<div>
    <!-- Imagen original -->
    <div class="h-40 w-32 border overflow-hidden">
        <img id="originalImage" src="{{ asset('storage/' . $existingPhoto) }}" alt="Imagen original" class="cursor-pointer w-full h-full object-cover">
    </div>

    <!-- Modal para editar la imagen -->
    <div id="cropperModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-4 w-[90%] md:w-1/2">
        <h2 class="text-xl font-bold mb-4">Ajusta tu imagen</h2>
        <div class="w-full h-64 overflow-hidden">
            <img id="imageToCrop" src="ruta-de-la-imagen.jpg" alt="Para recortar" class="w-full">
        </div>
        <div class="flex justify-end mt-4 space-x-2">
            <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
            <button id="cropButton" class="bg-blue-500 text-white px-4 py-2 rounded">Recortar</button>
        </div>
        </div>
    </div>
</div>
