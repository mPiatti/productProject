var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create web/build/app.js and web/build/app.css
    .addEntry('app', './web/assets/js/main.js')

    .addStyleEntry('global', './web/assets/css/global.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()
    .autoProvideVariables({ Popper: ['popper.js', 'default'] })

    .enablePostCssLoader((options) => {
        options.config = {
            path: './postcss.config.js'
        };
    })

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning()
;

module.exports = Encore.getWebpackConfig();
