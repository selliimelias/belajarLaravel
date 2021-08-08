<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('tittle')</title>
    @include('template.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('template.navbar')
    @include('template.sidebar')
    @yield('content')
    @include('template.footer')
</body>

</html>