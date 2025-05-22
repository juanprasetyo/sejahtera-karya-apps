@extends('layouts.admin')

@section('content')
  @php
      parse_str(parse_url($data->url($data->currentPage()))['query'], $params);
      $keywords = $params['keywords'];
  @endphp
  
  <h3 class="text-lg font-medium mx-2">Proyek</h3>
  <div class="mt-6 mx-2 card shadow bg-base-100">
    <div class="card-body" id="projects_list">
      <div class="flex items-center justify-end px-5 pt-5">
        <a href="{{ route('pemdes.projects.create') }}" class="btn btn-primary btn-sm max-sm:btn-square" data-discover="true" aria-label="Create product link">
          <span class="iconify lucide--plus size-4"></span>
          <span class="hidden md:inline">Proyek Baru</span>
        </a>
      </div>
      <div class="inline-flex flex-wrap items-center justify-center md:justify-between px-5 pt-3">
        <div class="text-base-content/80 flex justify-center gap-2 text-sm">
          <span class="hidden md:inline text-sm">Per Halaman</span>
          <select class="select select-xs w-18" aria-label="Per page">
            <option value="10" {{ $data->perPage() == "10" ? "selected" : "" }}>10</option>
            <option value="20" {{ $data->perPage() == "20" ? "selected" : "" }}>20</option>
            <option value="50" {{ $data->perPage() == "50" ? "selected" : "" }}>50</option>
            <option value="100" {{ $data->perPage() == "100" ? "selected" : "" }}>100</option>
          </select>
        </div>
        <div class="inline-flex items-center gap-3 mt-3 md:mt-0">
          <label class="input input-sm">
            <span class="iconify lucide--search text-base-content/80 size-3.5"></span>
            <input class="w-24 md:w-36" placeholder="Cari Proyek" aria-label="Cari Proyek" value="{{ $keywords }}" type="search">
          </label>
        </div>
      </div>
      <div id="projects_table">
        @include('partials.table')
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  @vite('resources/js/pemdes/project/index.js')
@endpush