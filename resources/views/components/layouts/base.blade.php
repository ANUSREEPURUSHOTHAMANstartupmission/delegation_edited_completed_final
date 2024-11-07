<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Kerala Startup Mission, Government of Kerala, Startup, Kerala, Integrated Startup Complex, Kerala Technology Innovation Zone">
    <meta property="og:title" content="Home | Kerala Startup Mission" />
    <meta property="og:description" content="Kerala Startup Mission is the central agency of the Government of Kerala for entrepreneurship development and incubation activities in Kerala, India." />
    <meta property="og:url" content="https://startupmission.kerala.gov.in/index.php" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Kerala Startup Mission" />
    <meta property="og:image" content="https://startupmission.kerala.gov.in/img/fb_image.jpg" />
    <title>{{ config('app.name') }}</title>

    <style>[x-cloak] { display: none !important; }</style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
{{-- alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  </head>

  <body class="antialiased">
      {{ $slot }}

      @livewire('notifications')
      @livewire('livewire-ui-modal')

      <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>
{{-- alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@yield('scripts')
  </body>
</html>
