import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {

            colors: {

                primary: '#090F31',

                secondary: '#FFCC00',

                success: '#00D739',

            },

            fontFamily: {

                inter: ['Inter', 'sans-serif'],

                audiowide: ['Audiowide', 'cursive'],

            },

        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
}