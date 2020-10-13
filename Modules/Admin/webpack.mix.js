const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

    mix.styles([
        __dirname + '/Resources/assets/css/bootstrap-rtl.min.css',
        __dirname + '/Resources/assets/css/lite-purple.min.css',
        __dirname + '/Resources/assets/css/lite-purple-rtl.css',
        __dirname + '/Resources/assets/css/animate.min.css',
        __dirname + '/Resources/assets/css/rtl.css',
        __dirname + '/Resources/assets/css/datatables.min.css',
    ], 'css/all.css');



    mix.scripts([
        __dirname + '/Resources/assets/js/index.js',
    ], 'js/all.js');

if (mix.inProduction()) {
    mix.version();
}

//                          datepiker.min.css                                            smart_wizard_theme_arrows.css
//                          default.css                                              smart_wizard_theme_arrows.min.css
//                       default.date.css                                         smart_wizard_theme_circles.css
//                    default.time.css                                             smart_wizard_theme_circles.min.css
// classic.css                             dropzone.min.css                        nuslider.min.css                        smart_wizard_theme_dots.css
// classic.date.css                        fullcalendar.min.css                    perfect-scrollbar.css                   smart_wizard_theme_dots.min.css
// classic.time.css                        fullcalendar.print.min.css              quill.bubble.css                        sweetalert2.min.css
// cropper.min.css                         hopscotch.css                           quill.snow.css                          toastr.css ladda-themeless.min.css                                                  toastr.min.css
// dark-purple.min.css                     lite-blue.css                           smart_wizard.css
//                       lite-blue.min.css                       smart_wizard.min.css