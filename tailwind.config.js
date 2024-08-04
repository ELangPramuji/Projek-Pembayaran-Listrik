/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            order: {
                '13': "13",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
