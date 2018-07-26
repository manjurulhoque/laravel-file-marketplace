<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    @yield('content')
    @include('layouts.partials._script')
</body>
</html>
