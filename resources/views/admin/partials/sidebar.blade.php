<aside class="sidebar" id="admin-sidebar">
  <div class="brand">
    <img src="{{ asset('images/logo.png') }}" alt="Njajan" class="brand-logo" />
    <span class="brand-name">Njajan - Admin</span>
  </div>

  <nav class="nav">
    <a class="nav-item" href="{{ route('admin.dashboard') }}">
      Dashboard
    </a>

    {{-- Manager Pemasaran & CEO --}}
    @if(auth()->user()->role && in_array(auth()->user()->role->name, ['Manager Pemasaran','CEO','Kepala Manager']))
      <a class="nav-item" href="{{ route('admin.products.index') }}">Produk</a>
    @endif

    {{-- Manager Logistik & CEO --}}
    @if(auth()->user()->role && in_array(auth()->user()->role->name, ['Manager Logistik','CEO','Kepala Manager']))
      <a class="nav-item" href="{{ route('admin.orders.index') }}">Pesanan</a>
    @endif

    {{-- Manager Keuangan & CEO --}}
    @if(auth()->user()->role && in_array(auth()->user()->role->name, ['Manager Keuangan','CEO','Kepala Manager']))
      <a class="nav-item" href="{{ route('admin.expenses.index') }}">Keuangan</a>
    @endif

    {{-- Manager SDM & CEO --}}
    @if(auth()->user()->role && in_array(auth()->user()->role->name, ['Manager SDM','CEO','Kepala Manager']))
      <a class="nav-item" href="{{ route('admin.employees.index') }}">SDM</a>
    @endif

    {{-- CEO saja --}}
    @if(auth()->user()->role && auth()->user()->role->name === 'CEO')
      <a class="nav-item" href="{{ route('admin.users.index') }}">Manajemen Pengguna</a>
    @endif
  </nav>

  <div class="sidebar-bottom">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn-link" type="submit">Logout</button>
    </form>
  </div>
</aside>
