<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('tittle')</title>
    @include('templateFrontEnd.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('templateFrontEnd.navbar')
    @yield('content')
    @include('templateFrontEnd.footer')
</body>

</html>