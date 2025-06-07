import preset from './vendor/filament/support/tailwind.config.preset'

import colors from 'tailwindcss/colors'

export default {
    presets: [preset],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: colors.yellow,
                gray: colors.neutral
            },
            listStyleType: {
                square: 'square',
                circle: 'circle',
                roman: 'upper-roman',
            }

        },
    },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.{js,ts}",
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("@designbycode/tailwindcss-text-shadow"),
        require("@designbycode/tailwindcss-mask-image"),

    ],
}
