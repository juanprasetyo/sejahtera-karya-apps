import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fg from 'fast-glob';

export default defineConfig({
    plugins: [
        laravel({
            input: fg.sync([
                'resources/js/**/*.js',
                'resources/css/**/*.css',
            ]),
            refresh: true,
        }),
        tailwindcss(),
    ],
});
