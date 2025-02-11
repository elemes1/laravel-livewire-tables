<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

/**
 * Trait WithSearch.
 */
trait WithSearch
{
    /**
     * Show the search field.
     *
     * @var bool
     */
    public bool $showSearch = true;

    /**
     * @var int|null
     */
    public ?int $searchFilterDebounce = null;

    /**
     * @var bool|null
     */
    public ?bool $searchFilterDefer = null;

    /**
     * @var bool|null
     */
    public ?bool $searchFilterLazy = null;

    /**
     * Remove the search filter when it's empty
     */
    public function updatedFilters(): void
    {
        if (isset($this->filters['search']) && $this->filters['search'] === '') {
            $this->filters['search'] = null;
        }
    }

    /**
     * Build Livewire model options for the search input
     *
     * @return string
     */
    public function getSearchFilterOptionsProperty(): string
    {
        if ($this->searchFilterDebounce) {
            return '.debounce.' . $this->searchFilterDebounce . 'ms';
        }

        if ($this->searchFilterDefer) {
            return '.defer';
        }

        if ($this->searchFilterLazy) {
            return '.lazy';
        }

        return '';
    }
}
