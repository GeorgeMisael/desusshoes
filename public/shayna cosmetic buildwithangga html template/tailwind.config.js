/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                "cosmetics-greylight": "#E3E3E4",
                "cosmetics-grey": "#8C8582",
                "cosmetics-purple": "#360CAC",
                "cosmetics-pink": "#FF4D9E",
            },
            backgroundImage: {
                "cosmetics-gradient-purple-pink": "linear-gradient(180deg, #360CAC 0%, #FF4D9F 100%)",
                "cosmetics-gradient-pink-white": "linear-gradient(90.54deg, #FF4D9E 36.33%, #FF97BD 99.53%)",
            },
            
        },
    },
    plugins: [
        
    ],
};
