const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#F84453",
                secondary: "#1D1D1D",
                "bar-gray": "#222222",
                "placeholder-gray": "#303030",
                link: "#FFCC34",
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
