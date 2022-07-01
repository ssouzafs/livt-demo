/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js, vue}"],
    theme: {
        extend: {
            colors: {
                brand: {
                    500: '#8257E6'
                }
            },
            borderRadius: {
                md: '4px'
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}