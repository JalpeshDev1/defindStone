import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'

export default defineConfig({
  plugins: [
    liveReload([
      '**/*.php',
      '**/*.scss',
      '**/*.js'
    ])
  ],
  build: {
    manifest: true,
    rollupOptions: {
      input: {
        js: 'resources/js/app.js',
        css: 'resources/sass/app.scss'
      },
    },
    minify: 'esbuild',
    target: 'es2015',
    commonjsOptions: {
      transformMixedEsModules: true
    },
    watch: false
  }
})

