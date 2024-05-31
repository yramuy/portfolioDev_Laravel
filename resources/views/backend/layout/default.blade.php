<html>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('backend.layout.header')
    <div class="wrapper">
        @include('backend.layout.navbar')
        @include('backend.layout.sidebar')

        <div class="content">
            @yield('content')
        </div>
        @include('backend.layout.footer')
    </div>
</body>

</html>
