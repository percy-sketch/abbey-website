import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';

export default defineConfig({
  server: { host: '0.0.0.0', port: 5273, strictPort: true, origin: 'http://localhost:5273' },
  plugins: [
    jigsaw({
      input: ['source/_assets/css/app.css', 'source/_assets/js/app.js'],
      refresh: true,
    }),
  ],
});
