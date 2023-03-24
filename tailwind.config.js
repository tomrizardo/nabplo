const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Graphik', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'tablet': '640px',
                // => @media (min-width: 640px) { ... }
          
                'laptop': '1080px',
                // => @media (min-width: 1024px) { ... }
          
                'desktop': '1600px',
                // => @media (min-width: 1280px) { ... }
              },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
