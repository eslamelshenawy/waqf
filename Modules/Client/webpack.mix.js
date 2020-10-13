
const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();



mix.js(__dirname + '/Resources/assets/js/app.js', 'js/client.js')
    .js(__dirname + '/Resources/assets/js/script.js', 'js/client.js')
    .sass(__dirname + '/Resources/assets/css/app_ar.scss', 'css/client.css');
// .sass(__dirname + '/Resources/assets/css/app-ltr.scss', 'css/client.css');





// .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/app.scss');

if (mix.inProduction()) {
    mix.version();
}