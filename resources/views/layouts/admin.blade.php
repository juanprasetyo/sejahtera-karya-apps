<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Admin | Dashboard</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <!-- Styles / Scripts -->
      @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
          @vite(['resources/css/app.css', 'resources/js/app.js'])
      @endif
  </head>

  <body>
    <div class="relative flex text-sm">
      {{-- Sidebar --}}
      @include('partials.admin-sidebar')
      {{-- Content --}}
      <div class="min-w-0 grow h-screen flex flex-col">
        {{-- Topbar --}}
        @include('partials.admin-navbar')
        <main class="p-6 bg-background grow overflow-y-auto">
          @yield('content')
        </main>
      </div>
    </div>
    {{-- @yield('content') --}}

    <script>
      const buttonsSidebar = document.querySelectorAll('.toggle-sidebar');
      const closeSidebar = document.querySelector('.close-sidebar');
      const sidebarElement = document.querySelector('#sidebar');

      buttonsSidebar.forEach(buttonSidebar => {
        buttonSidebar.addEventListener('click', function(event) {
          event.preventDefault();
          sidebarElement.classList.toggle('lg:hidden');
          sidebarElement.classList.toggle('ms-0');
          closeSidebar.classList.toggle('hidden');
        })
      });

      closeSidebar.addEventListener('click', function () {
        sidebarElement.classList.toggle('lg:hidden');
        sidebarElement.classList.toggle('ms-0');
        closeSidebar.classList.toggle('hidden');
      });
    </script>
    @stack('scripts')
  </body>

</html>
