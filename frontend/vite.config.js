import { defineConfig } from "vite";
import codeigniter from "vite-plugin-codeigniter";

/*
export default defineConfig({
  root: "public",
  base: "/assets/",
  build: {
    outDir: "assets",
    assetsDir: "",
    manifest: true,
    rollupOptions: {
      input: {
        main: "public/main.js",
      },
    },
    server: {
      hmr: {
        host: "localhost",
      },
    },
  },
});
*/

export default defineConfig(() => ({
  plugins: [codeigniter()],
}));
