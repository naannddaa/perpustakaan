<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>

{{-- cara 12 no 4 --}}
<head>
    @stack('styles')
</head>
<body>
    @yield('content')
    @stack('script')
</body>
