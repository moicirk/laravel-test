<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App | @yield('title')</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    @vite(['resources/css/app.css'])
</head>
<body>
    @hasSection('full-width')
        @yield('full-width')
    @endif

    @hasSection('content')
        <div class="container">
            @yield('content')
        </div>
    @endif

    @hasSection('content-fluid')
        <div class="container-fluid">
            @yield('content-fluid')
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    {{-- @vite(['resources/js/app.js']) --}}
</body>
</html>
