<div class="t-table-dropdown" :class="open ? 'is-active' : ''" x-data="{ open: false }" @click.away="open = false">

  <button @click="open = true" class="t-table-dropdown-menu-btn">
    <div class='icon'>
      <ion-icon src='{{ asset('images/icons/menu.svg') }}'></ion-icon>
    </div>
  </button>

  <div class="t-table-dropdown-content" x-show="open">
    {{ $slot }}
  </div>
</div>
