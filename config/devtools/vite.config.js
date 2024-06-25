import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'config/public/build',
  },
  css: {
    postcss: 'config/devtools/postcss.config.js',
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@/': 'resources/js/',
      '@css/': 'resources/css/',
    },
  },
});
