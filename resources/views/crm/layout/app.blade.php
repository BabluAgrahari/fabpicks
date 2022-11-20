@include('crm.layout.header')

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- header include start -->
        @include('admin.layout.sidebar')
        <!-- header include end -->
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <header class="header">
                <a id="btn-collapse" href="#">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
                <a id="btn-toggle" href="#" class="sidebar-toggler break-point-lg">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
            </header>
            <main class="content">
                <!-- content include start -->
                @yield('content')
                <!-- content include end -->

                <!-- footer include start -->
                @include('admin.layout.footer')
                <!-- footer include end -->
            </main>
            <div class="overlay"></div>
        </div>
    </div>
    <!-- Jquery  -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="assets/js/main.js"></script>

    @stack('js')
</body>

</html>