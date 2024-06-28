<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  @vite('resources/css/app.scss')

  @vite('resources/js/app.js')
  <!-- HTMX Extensions -->
  <script type="module" src="https://unpkg.com/htmx-ext-head-support@2.0.0/head-support.js"></script>
  <script type="module" src="https://unpkg.com/htmx-ext-ajax-header@2.0.1/ajax-header.js"></script>
  @if (App::isLocal())
    <script type="module">
      // window.htmx.logAll();
    </script>
  @endif
</head>

<body class="font-inter" hx-push-url="true" hx-ext="ajax-header,head-support">

  <div class="min-h-screen" hx-boost="true" hx-swap="innerHTML">
    @yield('body')

    @yield('endbody')
  </div>

</body>

</html>
