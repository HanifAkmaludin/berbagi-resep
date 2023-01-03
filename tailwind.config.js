/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            width: {
                "col-4": "calc(25% - 30px)",
                "col-3": "calc(100%/3 - 30px)",
                "col-2": "calc(50% - 25px)",
            },
            colors: {
                primary: "#EB5757",
                secondary: "#333333",
                ylw: "#F2C94C",
            },
            container: {
                screens: {
                    xl: "1170px",
                },
                center: true,
            },
        },
    },
    plugins: [],
};
