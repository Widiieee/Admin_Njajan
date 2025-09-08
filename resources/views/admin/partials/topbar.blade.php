<header class="topbar">
  <button id="btn-toggle" class="btn-toggle" aria-label="Toggle sidebar">☰</button>
  <div class="topbar-right">
    <div class="user-info">
      <span class="user-name">{{ auth()->user()->name }}</span>
      <small class="user-role">{{ auth()->user()->role->name ?? '-' }}</small>
    </div>
  </div>
</header>
