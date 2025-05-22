@extends('layouts.admin')

@section('content')
  <h3 class="text-lg font-medium mx-2">Tambah Proyek</h3>
  <div class="mt-6 mx-2 card shadow bg-base-100">
    <div class="card-body">
      
      @if (session('status'))
        <div role="alert" class="alert alert-{{ session('status') }}">
          @if (session('status') === 'success')
            <span class="iconify lucide--circle-check size-6"></span>
          @elseif (session('status') === 'error')
            <span class="iconify lucide--circle-x size-6"></span>
          @endif
          <span>{{ session('message') }}</span>
        </div>
      @endif

      <form action="{{ route('pemdes.projects.store') }}" method="POST" class="grid grid-cols-12 gap-6">
        @csrf
        <div class="col-span-12 lg:col-span-6">
          <fieldset class="fieldset">
            <legend class="fieldset-legend">Nama Proyek</legend>
            <input type="text" class="input w-full @error('name') {{ 'border border-error' }} @enderror" name="name" placeholder="Nama Proyek" minlength="3" maxlength="50" required value="{{ old('name') }}"/>
            @error('name')
              <p class="text-error">{{ $message }}</p>
            @enderror
          </fieldset>
          <fieldset class="fieldset">
            <legend class="fieldset-legend">Deskripsi</legend>
            <textarea class="textarea w-full h-24 @error('description') {{ 'border border-error' }} @enderror" name="description" placeholder="Deskripsi" minlength="20" maxlength="500" required>{{ old('description') }}</textarea>
            @error('description')
              <p class="text-error">{{ $message }}</p>
            @enderror
          </fieldset>
        </div>
        <div class="col-span-12 lg:col-span-6">
          <fieldset class="fieldset">
            <legend class="fieldset-legend">Tanggal Mulai Proyek</legend>
            <input type="date" class="input w-full @error('start_date') {{ 'border border-error' }} @enderror" name="start_date" min="{{ date('Y-m-d') }}" required value="{{ old('start_date') }}" />
            @error('start_date')
              <p class="text-error">{{ $message }}</p>
            @enderror
          </fieldset>
          <fieldset class="fieldset">
            <legend class="fieldset-legend">Tanggal Selesai Proyek</legend>
            <input type="date" class="input w-full @error('end_date') {{ 'border border-error' }} @enderror" name="end_date" min="{{ date('Y-m-d') }}" required value="{{ old('end_date') }}"/>
            @error('end_date')
              <p class="text-error">{{ $message }}</p>
            @enderror
          </fieldset>
          <fieldset class="fieldset">
            <legend class="fieldset-legend">Jumlah Pekerja</legend>
            <input type="number" class="input w-full @error('required_workers') {{ 'border border-error' }} @enderror" name="required_workers" placeholder="Jumlah Pekerja" min="1" required value="{{ old('required_workers') }}"/>
            @error('required_workers')
              <p class="text-error">{{ $message }}</p>
            @enderror
          </fieldset>
        </div>
        <div class="col-span-12">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
@endsection