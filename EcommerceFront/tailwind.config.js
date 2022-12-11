/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    container: {
      padding: '1rem'
    },
    extend: {
      colors:{
        primary:'#fd3d57'
      }
    },
  },
  plugins: [],
}
