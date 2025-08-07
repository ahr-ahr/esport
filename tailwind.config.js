/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.ts",
        "./resources/**/*.jsx",
        "./resources/**/*.tsx",
        "./public/**/*.html",
    ],
    safelist: [
        "bg-red-500",
        "bg-blue-500",
        "text-white",
        "hover:bg-blue-700",
        "text-center",
        "hidden",
        "block",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#1d4ed8", // biru
                secondary: "#f59e0b", // oranye
                danger: "#dc2626", // merah
                success: "#16a34a", // hijau
            },
            fontFamily: {
                sans: ["Inter", "ui-sans-serif", "system-ui"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"), // form styling
        require("@tailwindcss/typography"), // prose class
        require("@tailwindcss/aspect-ratio"), // aspect ratio (16:9, dst)
        require("@tailwindcss/line-clamp"), // batasi jumlah baris teks
        require("@tailwindcss/container-queries"), // container-based responsiveness
        require("tailwind-scrollbar"), // styling scrollbar
        require("tailwindcss-animate"), // animasi utility
        require("daisyui"), // UI komponen siap pakai
    ],
    daisyui: {
        themes: ["light", "dark", "cupcake", "corporate", "synthwave"], // bisa diganti sesuai preferensi
    },
};
