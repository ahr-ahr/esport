import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import mkcert from "vite-plugin-mkcert";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        https: true,
        cors: true,
        hmr: {
            protocol: "wss",
            host: "192.168.1.10", // <== domain dari Ngrok
        },
        allowedHosts: ["all"], // <== tambahkan ini
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
        mkcert(),
    ],
});
