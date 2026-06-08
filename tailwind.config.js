import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#185FA5',
                    50: '#e8f0f8',
                    100: '#c5daf0',
                    200: '#a3c3e8',
                    300: '#80ade0',
                    400: '#5d96d8',
                    500: '#3a80d0',
                    600: '#2e66a6',
                    700: '#234d7d',
                    800: '#173353',
                    900: '#0c1a2a',
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
