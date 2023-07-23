import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/normalize.scss',
                'resources/scss/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/payment.js',
            ],
            refresh: true,
        }),
    ],
});
