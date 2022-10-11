<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/app/plugins/fontawesome-free/css/all.min.css') }}">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('assets/app/plugins/sweetalert2/sweetalert2.min.css') }}">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        <!-- Custom CSS link per page -->
        @stack('style-link')

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/app/css/adminlte.min.css') }}">

        <!-- Custom style -->
        <link rel="stylesheet" href="{{ asset('assets/app/css/custom.min.css') }}">

        <!-- Custom CSS code per page -->
        @stack('style-code')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.navbar')

            <!-- Main Sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content-header')
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content-main')
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Content outside the main content -->
            @yield('content-outside')

            <!-- Footer -->
            @include('layouts.footer')
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('assets/app/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/app/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- SweetAlert2 -->
        <script src="{{ asset('assets/app/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <!-- Custom JS link per page -->
        @stack('script-link')

        <!-- AdminLTE App -->
        <script src="{{ asset('assets/app/js/adminlte.min.js') }}"></script>

        <!-- Custom JS code per page -->
        @stack('script-code')

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            @if(session()->has('message-toast'))
                Toast.fire({
                    icon: "{{ session('message-toast.type') }}",
                    title: "{{ session('message-toast.message') }}"
                })
            @endif
        </script>
    </body>
</html>
