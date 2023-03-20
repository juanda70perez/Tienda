const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors:{
            yellow: colors.yellow,
            trueGray: colors.neutral,
            Orange: colors.orange,
            greenLime: colors.lime,
            red: colors.red,
            indigo: colors.indigo,
            gray: colors.gray,
            'white': '#ffffff',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
