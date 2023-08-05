<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100;0,500;0,700;1,600&display=swap" rel="stylesheet"> 

    <!-- Fetch project name dynamically -->
    <title>Vue Inertia</title>

    <!-- Scripts -->
    @vite('resources/js/app.js') @inertiaHead
  </head>

  <style>
    body{
      font-family: 'Albert Sans', sans-serif;
    }
  </style>

  <body class="antialiased bg-gray-50 dark:bg-gray-900 dark:text-white">
    @inertia
  </body>
</html>