import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',
    
    safelist: [
        'w-0',
        'px-0',
        'ml-60',
        'w-[100%]',
        '!w-[calc(100%-15rem)]',
        'bg-gray-900/50',
        'dark:bg-gray-900/80',
        'fixed',
        'inset-0',
        'z-40',
        'overflow-y-hidden',
        'overflow-y-auto'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            
            colors: {
                'primary': '#053985',
                'primary-dark': '#052f6b',
                'primary-light': '#1c56aa',
                'primary-lighter': '#3062aa',
                'primary-lightest': '#85b8ff',
                'secondary': '#fc712c',
                'secondary-dark': "#fb5604"
            }
        },

    },

    plugins: [forms],
};
