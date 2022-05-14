@if ($paginator->hasPages())
  <nav>
    <ul class="pagination pagination-c">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span class="page-link page-link-c radius-right" aria-hidden="true">&lsaquo;</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link page-link-c radius-right" wire:click="previousPage" wire:loading.attr="disabled" style="cursor: pointer ;" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator--}}
        @if (is_string($element))
          <li class="page-item page-link-c disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links--}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item page-link-c active" aria-current="page"><span class="page-link" style="background-color : #4E7DCB !important;">{{ $page }}</span></li>
            @else
              <li class="page-item"><a class="page-link page-link-c" wire:click="gotoPage({{ $url }})" style="color: #4E7DCB !important;">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item">
          <a class="page-link page-link-c radius-left" wire:click="nextPage" wire:loading.attr="disabled" style="cursor: pointer ;" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
      @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span class="page-link page-link-c radius-left" aria-hidden="true">&rsaquo;</span>
        </li>
      @endif
    </ul>
  </nav>
@endif
