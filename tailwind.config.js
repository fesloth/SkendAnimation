/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                "open-sans": ["Open Sans", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                customBlue: "#F0E1E1",
                theme: "#B76A6A",
                hoverTheme: "#BA7979",
                font: "#814C4C",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
