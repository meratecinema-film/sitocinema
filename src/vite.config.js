import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { bunny } from "laravel-vite-plugin/fonts";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/bootstrap.css",
                "resources/css/reset.css",
                "resources/css/custom.css",
                "resources/css/layout.css",
                "resources/js/app.js",
            ],
            refresh: true,
            fonts: [
                bunny("Afacad Flux", {
                    weights: [300, 400, 500, 600, 700],
                    fallbacks: ["system-ui", "sans-serif"],
                    preload: [{ weight: 300 }, { weight: 400 }],
                }),
            ],
        }),
        tailwindcss(),
    ],

    server: {
        host: "0.0.0.0", // ← OBBLIGATORIO in Docker
        port: 5173, // ← Forziamo la porta corretta
        strictPort: true, // ← Non usare porte alternative
        hmr: {
            host: "localhost", // ← Forza IPv4
            port: 5173,
        },
        watch: {
            //usePolling: true, // react to CSS changes, warning: increase CPU usage
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
