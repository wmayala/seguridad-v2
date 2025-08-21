import html2canvas from 'html2canvas';

const printButton = document.getElementById('printButton');

if (printButton) {
    printButton.addEventListener('click', async (event) => {
        event.preventDefault();

        const front = document.getElementById('id-card-front');
        const back = document.getElementById('id-card-back');

        if (!front || !back) {
            console.error("No se encontró uno de los elementos requeridos para la impresión.");
            return;
        }

        const generateImage = async (element) => {
            const canvas = await html2canvas(element, { scale: 3, useCORS: true });
            return canvas.toDataURL('image/png', 1.0);
        };

        try {
            const [imgDataFront, imgDataBack] = await Promise.all([
                generateImage(front),
                generateImage(back)
            ]);

            const printWindow = window.open('', '_blank');

            if (printWindow) {

                printWindow.document.open();
                printWindow.document.write(`
                    <html>
                        <head>
                            <title>Impresión</title>
                            <style>
                                @page {
                                    size: 8.5cm 5.4cm;
                                    margin: 0;
                                }
                                body, html {
                                    margin: 0;
                                    padding: 0;
                                }
                                .card-container {
                                    width: 8.5cm;
                                    height: 5.4cm;
                                    display: block;
                                    page-break-after: always;
                                }
                                img {
                                    width: 100%;
                                    height: auto;
                                    object-fit: block;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="card-container">
                                <img src="${imgDataFront}" alt="Front" />
                            </div>
                            <div class="card-container">
                                <img src="${imgDataBack}" alt="Back" />
                            </div>
                        </body>
                    </html>
                `);
                printWindow.document.close();

                printWindow.onload = () => {
                    setTimeout(() => {
                        printWindow.print();
                        printWindow.close();
                    }, 250);
                };
            }
        } catch (error) {
            console.error("Error al generar las imágenes para impresión:", error);
        }
    });
} else {
    console.error("No se encontró el botón con ID 'printButton'. Verifica el DOM.");
}
