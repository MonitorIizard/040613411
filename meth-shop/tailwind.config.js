/** @type {import('tailwind-css').Config} */
// /home/std/cs6520159/public_html/meth-shop/src/pages/index.php
module.exports = {
  content: [
    "./src/pages/*.php",
    "./src/components/*.php",
    "./src/components/*/*.php",
    "./src/pages/admin/**/*.php",
    "./src/pages/customer/**/*.php",
    "./src/pages/admin/workshop/**/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          blue: "#146eb4",
          orange: "#ff9900",
          gray: "#f2f2f2",
        },
      },
      height: {
        102: "450px",
      },
    },
  },
  plugins: [],
};
