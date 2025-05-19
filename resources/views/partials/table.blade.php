@if ($data)
  @if (count($data) > 0)
    @php
        $columns = array_keys($data->first()->getAttributes());
        $rootUrlNameArray = explode(".", Route::currentRouteName());
        array_pop($rootUrlNameArray);
        $rootUrlName = join(".", $rootUrlNameArray);
    @endphp

    <div class="overflow-x-auto mt-4">
      <table class="table relative">
        <thead class="text-base-content/60">
          <tr>
            <th class="text-center sticky z-10 left-0 bg-base-100">No</th>
            @foreach ($columns as $column)
              @if ($column === "id")
                @continue
              @endif
              <th class="text-center capitalize">{{ join(" ", explode("_", $column)) }}</th>
            @endforeach
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $item)
            <tr>
              <th class="text-center sticky z-10 left-0 bg-base-100">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</th>
              @foreach ($columns as $column)
                @if ($column === "id")
                  @continue
                @endif 
                <td class="text-center">{{ $item[$column] }}</td>
              @endforeach
              <td class="flex justify-center items-center space-x-3">
                <a href="{{ route($rootUrlName . '.show', $item->id) }}" class="btn btn-square bg-info text-white">
                  <span class="iconify lucide--eye size-4"></span>
                </a>
                <a href="{{ route($rootUrlName . '.edit', $item->id) }}" class="btn btn-square bg-success text-white">
                  <span class="iconify lucide--edit size-4"></span>
                </a>
                <button type="button" class="btn-delete btn btn-square bg-error text-white" data-id="{{ $item->id }}">
                  <span class="iconify lucide--trash-2 size-4"></span>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $data->links() }}
  @else
    <p class="text-center pt-4">Data Tidak Ditemukan</p>
  @endif
@endif