let mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

require('./nova.mix')

mix
    .setPublicPath('dist')
    .js('resources/js/field.js', 'js')
    .vue({ version: 3 })
    .sass("resources/sass/field.scss", "css")
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('tailwind.config.js') ],
    })
    .nova('oceanapplications/nova-toggle')
