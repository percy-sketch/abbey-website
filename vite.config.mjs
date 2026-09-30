import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';

export default defineConfig({
  plugins: [
    jigsaw({
      input: ['source/_assets/css/app.css', 'source/_assets/js/app.js'],
      refresh: true,
    }),
  ],
});
