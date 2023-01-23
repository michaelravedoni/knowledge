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
                brand: {
                    50: 'var(--color-brand-50)',
                    100: 'var(--color-brand-100)',
                    200: 'var(--color-brand-200)',
                    300: 'var(--color-brand-300)',
                    400: 'var(--color-brand-400)',
                    500: 'var(--color-brand-500)',
                    600: 'var(--color-brand-600)',
                    700: 'var(--color-brand-700)',
                    800: 'var(--color-brand-800)',
                    900: 'var(--color-brand-900)',
                },
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
