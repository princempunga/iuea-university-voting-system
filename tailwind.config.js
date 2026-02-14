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
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Outfit', 'sans-serif'],
            },
            colors: {
                'iuea-red': {
                    DEFAULT: '#8B0000',
                    light: '#A50000',
                    dark: '#660000',
                },
                'iuea-gold': '#D4AF37',
                'charcoal': '#1A1A1A',
                'surface': '#FFFFFF',
            },
            boxShadow: {
                'premium': '0 10px 30px -5px rgba(0, 0, 0, 0.04), 0 4px 12px -3px rgba(0, 0, 0, 0.02)',
            },
        },
    },

    plugins: [forms],
};
