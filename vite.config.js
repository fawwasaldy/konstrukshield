import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1', // Allows external access
        port: 5173,       // Ensure this port is open and correct
        cors: true,       // Ensure CORS is enabled
        strictPort: true  // Ensures the server will stop if the port is taken
    }
    
});
