import vue from '@vitejs/plugin-vue';
import path from 'path';

export default ({command}) => ({
    base: command === 'serve' ? '' : '/build/',
    publicDir: 'false',
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            input: 'resources/js/app.js',
        },
    },
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    plugins: [vue()]
});
