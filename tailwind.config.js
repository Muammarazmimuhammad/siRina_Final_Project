import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors'; // <-- 1. Impor warna

/** @type {import('tailwindcss').Config} */
export default {
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
            // 2. Tambahkan palet warna kustom di sini
            colors: {
                sky: colors.sky,
                cyan: colors.cyan,
                teal: colors.teal,
            }
        },
    },

    plugins: [forms],
};