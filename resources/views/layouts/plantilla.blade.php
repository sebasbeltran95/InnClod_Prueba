<!DOCTYPE html>
<html lang="es">
    @include('layouts.comun.header')
<body>
    @yield('content') 
    @include('layouts.comun.footer')
    @stack('javascript')
</body>
</html>