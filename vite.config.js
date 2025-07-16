import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import { resolve } from 'path';

export default defineConfig({
	plugins: [vue()],
	build: {
		outDir: 'public/dist',
		manifest: true,
		rollupOptions: {
			input: {
				main: resolve(__dirname, 'resources/js/main.js'),
			},
		},
	},
	server: {
		port: 5173,
		strictPort: true,
		hmr: {
			host: 'localhost',
		},
	},
});
