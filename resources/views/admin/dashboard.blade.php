@extends('layouts.admin')

@section('content')
  <div class="card bg-base-100 cursor-pointer shadow transition-all hover:shadow-md">
    <div class="card-body p-4">
      <div class="bg-base-200 rounded-box w-fit p-2"><img class="size-6" alt="" src="/images/apps/files/one-drive.svg"></div>
        <div class="mt-3 flex items-center justify-between">
            <p class="text-sm font-medium">One Drive</p>
            <span class="text-base-content/80 text-xs">34%</span>
        </div>
        <progress max="250" value="85" class="progress progress-primary mt-1.5 h-1.5"></progress>
        <div class="mt-1.5 flex items-center justify-between">
          <span class="text-sm font-medium">85 GB</span>
          <span class="text-base-content/80 text-xs">250 GB</span>
        </div>
    </div>
  </div>
@endsection