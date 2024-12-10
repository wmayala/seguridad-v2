import html2canvas from 'html2canvas';

document.getElementById('printButton').addEventListener('click', (event) => {
    event.preventDefault();

    const front = document.getElementById('activity-card-front');
    const back = document.getElementById('activity-card-back');

    if (!front || !back) {
        console.error("No se encontró uno de los elementos requeridos para la impresión.");
        return;
    }

    const generateImage = (element) => {
        return html2canvas(element, { scale: 3 }).then(canvas => {
            return canvas.toDataURL('image/png', 1.0);
        });
    };

    Promise.all([generateImage(front), generateImage(back)]).then(([imgDataFront, imgDataBack]) => {
        const printWindow = window.open('', '_blank');
        if (printWindow) {
            printWindow.document.write(`
                <html>
                    <head>
                        <style>
                            @media print {
                                body, html {
                                    margin: 0;
                                    padding: 0;
                                    width: 8.5cm;
                                    height: 5.4cm;
                                }
                                .card-container {
                                    width: 8.5cm;
                                    height: 5.4cm;
                                    display: block;
                                    page-break-after: always;
                                }
                                img {
                                    width: 100%;
                                    height: 100%;
                                }
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
                printWindow.print();
                printWindow.close();
            };
        }
    }).catch(error => {
        console.error("Error al generar las imágenes para impresión:", error);
    });
});
