@if (count($bulkActions))
    <div class="dropdown mb-3 mb-md-0 d-block d-md-inline">
        <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" id="bulkActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('Bulk Actions') }}
        </button>

        <div class="dropdown-menu dropdown-menu-end w-100" aria-labelledby="bulkActions">
            @foreach($bulkActions as $action => $title)
                <a
                    href="#"
                    wire:click.prevent="{{ $action }}"
                    wire:key="bulk-action-{{ $action }}"
                    class="dropdown-item"
                >
                    {{ $title }}
                </a>
            @endforeach
        </div>
    </div>
@endif
