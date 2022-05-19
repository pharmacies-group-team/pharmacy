<div class="t-table-dropdown" x-data="{ open: false }" @click.away="open = false">

  <button @click="open = true">
    open
  </button>

  <div class="t-table-dropdown-content" x-show="open">
    {{ $slot }}
  </div>
</div>
