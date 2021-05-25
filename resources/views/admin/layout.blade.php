<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('admin.include.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('admin.include.nav')

<!-- Main Sidebar Container -->
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin.include.footer')
</div>
@include('admin.include.js')
</body>
</html>
