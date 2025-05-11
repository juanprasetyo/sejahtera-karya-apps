@extends('layouts.admin')

@section('content')
  <div class="flex flex-row flex-wrap">
    <div class="w-full md:w-6/12 lg:w-4/12 px-2 pt-5">
      <div class="card shadow bg-base-100">
        <div class="card-body">
          <div class="flex justify-between">
            <div class="flex-grow">
              <p class="text-sm font-medium text-base-content/80">Jumlah Proyek</p>
              <p class="mt-3 text-2xl font-bold">100</p>
              <div class="mt-3 text-xs font-medium text-base-content/60">
                Last updated
                <span class="text-base-content/80">20 Mei 2025</span>
              </div>
            </div>
            <div class="flex flex-col justify-between">
              <div class="flex justfiy-center items-center bg-base-200 p-2 rounded-md">
                <span class="iconify lucide--briefcase-business size-5"></span>
              </div>
              <a href="#" class="flex justfiy-center items-center bg-success/20 border border-1 border-success p-2 rounded-md">
                <span class="iconify lucide--arrow-big-right size-5"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:w-6/12 lg:w-4/12 px-2 pt-5">
      <div class="card shadow bg-base-100">
        <div class="card-body">
          <div class="flex justify-between">
            <div class="flex-grow">
              <p class="text-sm font-medium text-base-content/80">Waitinglist Pekerja</p>
              <p class="mt-3 text-2xl font-bold">100</p>
              <div class="mt-3 text-xs font-medium text-base-content/60">
                Last updated
                <span class="text-base-content/80">20 Mei 2025</span>
              </div>
            </div>
            <div class="flex flex-col justify-between">
              <div class="flex justfiy-center items-center bg-base-200 p-2 rounded-md">
                <span class="iconify lucide--user-round size-5"></span>
              </div>
              <a href="#" class="flex justfiy-center items-center bg-success/20 border border-1 border-success p-2 rounded-md">
                <span class="iconify lucide--arrow-big-right size-5"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:w-6/12 lg:w-4/12 px-2 pt-5">
      <div class="card shadow bg-base-100">
        <div class="card-body">
          <div class="flex justify-between">
            <div class="flex-grow">
              <p class="text-sm font-medium text-base-content/80">Pekerja Aktif</p>
              <p class="mt-3 text-2xl font-bold">100</p>
              <div class="mt-3 text-xs font-medium text-base-content/60">
                Last updated
                <span class="text-base-content/80">20 Mei 2025</span>
              </div>
            </div>
            <div class="flex flex-col justify-between">
              <div class="flex justfiy-center items-center bg-base-200 p-2 rounded-md">
                <span class="iconify lucide--user-round-check size-5"></span>
              </div>
              <a href="#" class="flex justfiy-center items-center bg-success/20 border border-1 border-success p-2 rounded-md">
                <span class="iconify lucide--arrow-big-right size-5"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 mx-2 card shadow bg-base-100">
    <div class="card-body">
      <span class="text-sm font-medium text-base-content/80">Last Project</span>
      <h2 class="text-4xl font-semibold">Judul Project</h2>
      <p class="text-base-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio est amet maxime deserunt repudiandae nemo maiores ullam, veritatis officiis pariatur fugit porro at eligendi sint!</p>
      <div class="flex items-center space-x-2 text-base-content/60">
        <span class="iconify lucide--calendar-days size-5"></span>
        <span>12 Maret 2025 - 30 Mei 2025</span>
      </div>
    </div>
  </div>
  
  <div class="mt-6 mx-2 card shadow bg-base-100">
    <div class="card-body">
      <div class="px-6">
        <div class="flex justify-between items-start">
          <span class="font-medium">Revenue Statistics</span>
          <div class="tabs tabs-box tabs-xs">
            <div class="tab tw-bha false">Day</div>
            <div class="tab tw-bha false">Month</div>
            <div class="tab tw-bha tab-active">Year</div>
          </div>
        </div>
        <div class="mt-3">
          <div class="flex items-center gap-3">
            <span class="font-semibold text-4xl">$184.78K</span>
            <span class="font-medium text-success">+3.24%</span>
          </div>
          <span class="text-sm text-base-content/60">Total income in this year</span>
        </div>
        <div id="chart" class="mt-3" data-chart="{{ json_encode($dataChart) }}"></div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  @vite(['resources/js/pemdes/dashboard-chart.js'])
@endpush