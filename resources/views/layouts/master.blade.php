<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Obuca</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  @include('layouts.navbar')
  <div class="container">
    <div class="row">
      <div class="col-12">
        @yield('main')
        @yield('content')
      </div>
    </div>
  </div>
  @include('layouts.footer')
  @yield('scripts')
</body>
</html>