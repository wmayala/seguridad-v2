document.addEventListener('DOMContentLoaded', () => {

    const initCropper = () => {
        const originalImage = document.getElementById('originalImage');
        const imageToCrop = document.getElementById('imageToCrop');
        const cropperModal = document.getElementById('cropperModal');
        const cropButton = document.getElementById('cropButton');
        const cancelButton = document.getElementById('cancelButton');

        if (!originalImage || !imageToCrop || !cropperModal || !cropButton || !cancelButton) {
            // Rompe la ejecución porque hay un elemento en el DOM que no se ha cargado
            return;
        }

        // Evitar duplicar eventos
        if (originalImage.dataset.cropperInitialized) return;
        originalImage.dataset.cropperInitialized = "true";

        let cropper = null;

        // Mostrar el modal y activar cropper al hacer clic en la imagen
        originalImage.addEventListener('click', () => {
            cropperModal.classList.remove('hidden');
            cropper = new Cropper(imageToCrop, {
                aspectRatio: 1,
                viewMode: 1,
            });
        });

        // Recortar la imagen y actualizar el elemento original
        cropButton.addEventListener('click', (event) => {
            event.preventDefault();
            if (!cropper) return;

            const croppedCanvas = cropper.getCroppedCanvas({
                width: 256,
                height: 256,
            });

            const croppedDataUrl = croppedCanvas.toDataURL();
            originalImage.src = croppedDataUrl;

            cropper.destroy();
            cropper = null;
            cropperModal.classList.add('hidden');
        });

        // Cancelar y cerrar el modal
        cancelButton.addEventListener('click', (event) => {
            event.preventDefault();
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            cropperModal.classList.add('hidden');
        });
    };

    // Inicialización al cargar la página
    initCropper();

    // Re-inicialización para Livewire u otros cambios dinámicos
    if (window.Livewire) {
        Livewire.hook('message.processed', initCropper);
    }

    // Observador del DOM para elementos añadidos dinámicamente fuera de Livewire
    const observer = new MutationObserver(initCropper);
    observer.observe(document.body, { childList: true, subtree: true });
});
