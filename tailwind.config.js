import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'rgb(0, 77, 68)',
                secondary: '#0073e6',
                accent: '#00cc66',
                background: '#f4f4f4',
                text: '#333333',
                footer: '#333333',
            },
            animation: {
                'ekg': 'ekg 2s infinite linear',
            },
            keyframes: {
                ekg: {
                    '0%': { 'stroke-dasharray': '1, 150', 'stroke-dashoffset': '0' },
                    '50%': { 'stroke-dasharray': '80, 150', 'stroke-dashoffset': '-20' },
                    '100%': { 'stroke-dasharray': '1, 150', 'stroke-dashoffset': '-100' },
                },
            },
            spacing: {
                '18': '4.5rem',
                '128': '32rem',
            },
            height: {
                'screen-85': '85vh',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
