@extends('layouts.admin')

@section('content')
  <h3 class="text-lg font-medium mx-2">Detail Proyek</h3>
  <div class="mt-6 mx-2 card shadow bg-base-100">
    <div class="card-body">
      <h1 class="text-lg font-bold text-center capitalize">{{ $project->name }}</h1>
      <p class="text-center text-sm text-base-content/60">
        <span>Oleh {{ $project->user->name }}.</span>
      </p>
      <p class="text-center text-sm text-base-content/60">
        <span>Dibuat {{ date('d M Y', strtotime($project->created_at)) }}.</span>
        <span>Terakhir diubah {{ date('d M Y', strtotime($project->updated_at)) }}.</span>
      </p>
      <div class="mt-5">
        <h2 class="font-semibold">Tentang Proyek</h2>
        <p class="text-justify">{{ $project->description }}</p>
      </div>
      <div class="mt-3">
        <h2 class="font-semibold">Waktu Proyek</h2>
        <p>
          <span>{{ date('d M Y', strtotime($project->start_date)) }}</span>
          -
          <span>{{ date('d M Y', strtotime($project->end_date)) }}</span>
        </p>
      </div>
      <div class="mt-3">
        <h2 class="font-semibold">Pekerja Dibutuhkan</h2>
        <p>
          Jumlah pekerja yang diperlukan adalah 
          <span class="font-semibold">{{ $project->required_workers}}</span>
          orang.
        </p>
      </div>
      <div class="mt-5 w-full inline-flex justify-end space-x-4">
        <a href="{{ route('pemdes.projects.index') }}" class="btn btn-square bg-info text-white tooltip" data-tip="Kembali">
          <span class="iconify lucide--arrow-left size-4 stroke-3"></span>
        </a>
        <a href="{{ route('pemdes.projects.edit', $project->id) }}" class="btn btn-square bg-success text-white tooltip" data-tip="Edit">
          <span class="iconify lucide--edit size-4"></span>
        </a>
        <button type="button" class="btn-delete btn btn-square bg-error text-white tooltip" data-tip="Hapus" data-id="{{ $project->id }}">
          <span class="iconify lucide--trash-2 size-4"></span>
        </button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  @vite('resources/js/pemdes/project/detail.js')
@endpush