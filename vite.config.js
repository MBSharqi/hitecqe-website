import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/frontend.css',
                'resources/css/home.css',
                'resources/js/frontend.js',
                'resources/js/home.js',
                'resources/css/backend.css',
                'resources/js/backend.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
