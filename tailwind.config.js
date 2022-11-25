const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/filament/forms/resources/views/**/*.blade.php',
        './vendor/filament/tables/resources/views/**/*.blade.php',
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
    ],
    darkMode: 'media',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.red,
                success: colors.green,
                warning: colors.yellow,
            },
        },

    },
    variants: {
        extend: {

        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],



}
