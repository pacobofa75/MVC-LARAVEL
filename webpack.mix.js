const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .options({
    // Add Tailwind
    plugins: [
      tailwindcss('./tailwind.config.js'),
    ],
  });