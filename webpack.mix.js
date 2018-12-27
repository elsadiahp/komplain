const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            files: [
                'resources/views/**/*',
                'Modules/**/Resources/views/**/*.php',
                'Modules/**/**/*.php',
                'Modules/**/**/**/*.php',
                'app/**/*.php',
                '*.js',
                'routes/*.php'
            ]
        }, {reload: false})
    ]
});

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
