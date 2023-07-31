/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "node_modules/preline/dist/*.js",
  ],
  theme: {
    fontFamily: {
      'inter' : 'Inter, sans-serif',
    },
    container: {
      padding: '2rem',
    },
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
}

