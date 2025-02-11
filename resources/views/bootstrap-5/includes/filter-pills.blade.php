@if ($showFilters && count(array_filter($filters)) && !(count(array_filter($filters)) === 1 && isset($filters['search'])))
    <div class="mb-3">
        <small>@lang('Applied Filters'):</small>

        @foreach($filters as $key => $value)
            @if ($key !== 'search' && strlen($value))
                <span
                    wire:key="filter-pill-{{ $key }}"
                    class="badge rounded-pill bg-info d-inline-flex align-items-center"
                >
                    {{ $filterNames[$key] ?? ucwords(strtr($key, ['_' => ' ', '-' => ' '])) }}:
                    @if(isset($customFilters[$key]) && method_exists($customFilters[$key], 'options'))
                        {{ $customFilters[$key]->options()[$value] ?? $value }}
                    @else
                        {{ ucwords(strtr($value, ['_' => ' ', '-' => ' '])) }}
                    @endif

                    <a
                        href="#"
                        wire:click.prevent="removeFilter('{{ $key }}')"
                        class="text-white ms-2"
                    >
                        <span class="visually-hidden">@lang('Remove filter option')</span>
                        <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                        </svg>
                    </a>
                </span>
            @endif
        @endforeach

        <a
            href="#"
            wire:click.prevent="resetFilters"
            class="badge rounded-pill bg-light text-dark text-decoration-none"
        >
            @lang('Clear')
        </a>
    </div>
@endif
