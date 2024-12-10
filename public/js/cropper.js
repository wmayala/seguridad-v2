document.addEventListener('DOMContentLoaded', () => {
    const originalImage = document.getElementById('originalImage');
    const imageToCrop = document.getElementById('imageToCrop');
    const cropperModal = document.getElementById('cropperModal');
    const cropButton = document.getElementById('cropButton');
    const cancelButton = document.getElementById('cancelButton');

    let cropper = null;

    // Mostrar el modal y activar Cropper.js al hacer clic en la imagen
    originalImage.addEventListener('click', () => {
        cropperModal.classList.remove('hidden'); // Mostrar modal
        cropper = new Cropper(imageToCrop, {
            aspectRatio: 1, // Relación de aspecto 1:1
            viewMode: 1,    // Mantener la imagen dentro del canvas
        });
    });

    // Recortar la imagen y actualizar el elemento original
    cropButton.addEventListener('click', (event) => {
        event.preventDefault();

        const croppedCanvas = cropper.getCroppedCanvas({
            width: 256, // Ancho del resultado
            height: 256, // Altura del resultado
        });

        // Actualizar la imagen original
        const croppedDataUrl = croppedCanvas.toDataURL();
        originalImage.src = croppedDataUrl;

        // Limpiar el modal y destruir el cropper
        cropper.destroy();
        cropper = null;
        cropperModal.classList.add('hidden'); // Ocultar modal
    });

    // Cancelar y cerrar el modal
    cancelButton.addEventListener('click', () => {
        cropper.destroy();
        cropper = null;
        cropperModal.classList.add('hidden'); // Ocultar modal
    });
});
