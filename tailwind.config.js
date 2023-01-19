const { camelCase } = require("lodash");

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
                "col-mobile": "calc(100% - 30px)",
                "col-tablet": "calc(100%/3 - 30px)",
                "col-2-card": "calc(50% - 30px)",
                "col-2-detail": "calc(50% - 20px)",
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
