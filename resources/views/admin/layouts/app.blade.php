<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Dashboard</title>
        @include('admin.layouts.head_css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            @include('admin.layouts.navigation')

            <!-- Main Sidebar Container -->
            @include('admin.layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                @yield('content')

            </div>
            <!-- Main Footer -->
            @include('admin.layouts.footer')
        </div>

        <!-- REQUIRED SCRIPTS -->
        @include('admin.layouts.footer_js')
    </body>
</html>    