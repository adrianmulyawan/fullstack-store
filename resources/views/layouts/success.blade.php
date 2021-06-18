<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    {{-- Title Your Website --}}
    <title>@yield('title')</title>

    {{-- menambahkan style diluar dari file scss dengan @stack --}}
    @stack('prepend-style')
    {{-- Include style.blade.php --}}
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>
    {{-- yield Page Content --}}
    @yield('content')

    {{-- Include Footer (includes/footer.blade.php) --}}
    @include('includes.footer')

    @stack('prepend-script')
    {{-- Include script.blade.php --}}
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>