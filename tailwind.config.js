/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./views/**/*.php"
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}