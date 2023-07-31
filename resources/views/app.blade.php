<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Fetch project name dynamically -->
    <title>Vue Inertia</title>

    <!-- Scripts -->
    @vite('resources/js/app.js') @inertiaHead
  </head>

  <body class="font-inter antialiased bg-gray-50 dark:bg-gray-900 dark:text-white">
    @inertia
  </body>
</html>