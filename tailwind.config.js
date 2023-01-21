const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/filament/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    safelist: [
      'kn-block-basic',
      'kn-block-info',
      'kn-block-success',
      'kn-block-danger',
      'kn-block-warning',
      'text-gray-400',
      'text-sm',
      '-mt-4',
      'max-w-md',
      'mx-auto',
      'h-px',
      'my-8',
      'bg-gray-200',
      'border-0',
      'dark:bg-gray-700',
    ]
}
