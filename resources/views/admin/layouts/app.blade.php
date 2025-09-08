<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'Admin Njajan')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">
  @include('admin.partials.sidebar')

  <div class="main-content">
    @include('admin.partials.topbar')

    <main class="content">
      @include('admin.partials.alerts')
      @yield('content')
    </main>

    <footer class="admin-footer">
      &copy; {{ date('Y') }} Njajan - Admin Panel
    </footer>
  </div>

  <script src="{{ asset('js/admin.js') }}" defer></script>
</body>
</html>
