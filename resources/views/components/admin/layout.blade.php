<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite ('resources/css/app.css')
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

    <!-- Navbar -->
    <x-admin.navbar />

    <!-- Sidebar -->
    <x-admin.sidebar />

    <main class="p-4 md:ml-64 h-auto pt-20">
      <div class="nx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>
</html>
