import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'https://seguridadbancaria-dev.bcr.gob.sv',
        https: true
    },
    plugins: [

        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/js/print-card.js',
            ],
            refresh: true,
        }),
    ],
});
