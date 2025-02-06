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
        colors: {
            primaryLight: '#F72C5B',
            primaryDark: '#3D5300',
            primaryHeading: '#3D5300',

            white: '#ffffff',
            black: '#000000',
            danger : '#FF0000',
            success: '#4CAF50',
            warning: '#FFFF00',
            info: '#0000FF',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
