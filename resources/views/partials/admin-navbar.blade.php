<header class="navbar h-[64px] px-3 flex justify-between bg-white shadow-lg border-solid border-b-1 border-base-200">
  <button class="toggle-sidebar btn btn-sm btn-ghost">
    <span class="iconify lucide--menu size-5"></span>
  </button>
  <nav class="menu menu-horizontal inline-flex items-center gap-1.5">
    <div class="dropdown dropdown-bottom dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost rounded-btn px-1.5">
        <div class="flex items-center gap-2">
          <div class="avatar">
            <div class="bg-base-200 mask mask-circle w-8">
              <img alt="Avatar" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp">
            </div>
          </div>
          <div class="-space-y-0.5 text-start">
            <p class="text-sm">{{ Auth::user()->name }}</p>
            <p class="text-base-content/60 text-xs">Profile</p>
          </div>
        </div>
      </div>
      <div tabindex="0" class="dropdown-content bg-base-100 rounded-box w-50 shadow">
        <ul class="menu w-full p-2">
          <li>
            <a href="/pages/settings" data-discover="true">
              <span class="iconify lucide--user size-4"></span>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <a href="/pages/settings" data-discover="true">
              <span class="iconify lucide--settings size-4"></span>
              <span>Settings</span>
            </a>
          </li>
          <li>
            <a href="/pages/get-help" data-discover="true">
              <span class="iconify lucide--help-circle size-4"></span>
              <span>Help</span>
            </a>
          </li>
        </ul>
        <hr class="border-base-300">
        <ul class="menu w-full p-2">
          <li>
            <div>
              <span class="iconify lucide--arrow-left-right size-4"></span>
              <span>Switch Account</span>
            </div>
          </li>
          <li>
            <a class="text-error hover:bg-error/10" href="/auth/login" data-discover="true">
              <span class="iconify lucide--log-out size-4"></span>
              <span>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit">Logout</button>
                </form>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>