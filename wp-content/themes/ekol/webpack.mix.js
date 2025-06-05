const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');


glob.sync('src/scss/page_templates/*.scss').forEach(file => {
    const filename = path.basename(file, '.scss');

    mix.sass(file, `dist/css/page_templates/${filename}.css`);
});

glob.sync('src/js/page_templates/*.js').forEach(file => {
    const filename = path.basename(file, '.js');

    mix.js(file, `dist/js/page_templates/${filename}.js`);
});


mix
    .alias({
        '@': 'src',
        '@scss': 'src/scss',
        '@scss_blocks': 'src/scss/blocks',
        '@scss_global': 'src/scss/global',
        '@js': 'src/js',
        '@js_blocks': 'src/js/blocks',
    })
    .options({
        processCssUrls: false
    })
    .js('src/js/script.js', 'dist/js/')
    .sass('src/scss/style.scss', 'dist/css')
    .copy('src/img', 'dist/img')
    .copy('src/font', 'dist/font')
    .browserSync({
        proxy: "nginx",
        files: ['dist/css', 'dist/js', './**/*.php'],
    }).sourceMaps();
