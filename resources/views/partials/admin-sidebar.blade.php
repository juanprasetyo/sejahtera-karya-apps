{{-- Sidebar --}}
<div id="sidebar" class="-ms-[250px] fixed lg:relative z-50 lg:ms-0 w-[250px] h-screen flex flex-col bg-white border-solid border-e-1 border-base-200">
  <a href="{{ url('/') }}" class="navbar flex justify-center text-lg font-semibold">
    <img src="/logo.png" alt="Logo" class="w-8 mr-3">
    Kode E
  </a>
  <div class="relative min-h-0 grow flex flex-col overflow-y-auto">
    <div class="text-sm px-2 mb-4">
      @if (explode(".", Route::currentRouteName())[0] === "pemdes")
        <a href="{{ route('pemdes.index') }}" class="h-8 flex items-center space-x-2 px-3 hover:bg-base-200 rounded-sm">
          <span class="iconify lucide--home size-4"></span>
          <span class="grow">Dashboard</span>
        </a>
        <p class="mx-2.5 my-2 text-base-content/70 font-medium">Proyek</p>
        <div class="collapse group">
          <input type="checkbox" class="!min-h-0" {{ str_contains(Route::currentRouteName(), "pemdes.projects") ? "checked" : "" }}/>
          <div class="collapse-title min-h-0 h-8 px-2.5 py-0 flex items-center space-x-2 px-3 hover:bg-base-200 rounded-sm">
            <span class="iconify lucide--construction size-4"></span>
            <span class="grow">Proyek</span>
            <span class="iconify lucide--chevron-right size-4 group-has-checked:rotate-90 transition-transform duration-500 ease-in-out bg-base-content/70"></span>
          </div>
          <div class="collapse-content relative p-0 ms-6 group-has-checked:p-0 text-sm before:absolute before:w-[2px] before:h-full before:-start-2 before:bg-base-content/10">
            <a href="{{ route('pemdes.projects.index') }}" class="h-8 flex items-center px-3 hover:bg-base-200 rounded-sm {{ Route::currentRouteName() === "pemdes.projects.index" ? "bg-base-200" : ""}}">
              <span class="grow">List Proyek</span>
            </a>
            <a href="{{ route('pemdes.projects.index') }}" class="h-8 flex items-center px-3 hover:bg-base-200 rounded-sm">
              <span class="grow">Tambah Proyek</span>
            </a>
          </div>
        </div>
      @endif

      @if (explode(".", Route::currentRouteName())[0] === "admin")
        <p class="mx-2.5 my-2 font-medium">Pemdes</p>
        <a href="{{ route('admin.index') }}" class="h-8 flex items-center space-x-2 px-3 hover:bg-base-200 rounded-sm">
          <span class="iconify lucide--home size-4"></span>
          <span class="grow">Dashboard</span>
        </a>
        <a href="#home" class="h-8 flex items-center space-x-2 px-3 hover:bg-base-200 rounded-sm">
          <span class="iconify lucide--home size-4"></span>
          <span class="grow">Home</span>
        </a>
      @endif
    </div>
  </div>
</div>
<div class="close-sidebar absolute h-screen w-screen z-40 hidden lg:hidden bg-base-300/30"></div>