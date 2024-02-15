@extends('admin.layouts.app')
@section('title', 'Home')
@section('css')
    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sweetalert/css/sweetalert.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
        {{-- 
            ###########################################
                Users 
            ###########################################
        --}}
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-2"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">All Users</span>
                            <span class="info-box-number">{{ number_format($users) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- Admins --}}

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-2">
                            <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Admins</span>
                            <span class="info-box-number">{{ number_format($admins) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                {{-- Custemors --}}

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-2">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Custemors</span>
                            <span class="info-box-number">{{ number_format($custemors) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                {{-- Roles --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-2">
                            <i class="fa-solid fa-user-gear"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Roles</span>
                            <span class="info-box-number">{{ number_format($roles) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        {{-- 
            ###########################################
                Categories 
            ###########################################
        --}}
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-2">
                            <i class="fa-solid fa-rectangle-list"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">All Categories</span>
                            <span class="info-box-number">{{ number_format($categories) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                {{-- Sub_Categories --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-2">
                            <i class="fa-solid fa-list"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Admins</span>
                            <span class="info-box-number">{{ number_format($admins) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                {{-- Custemors --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-2">
                            <i class="fa-solid fa-list-check"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Custemors</span>
                            <span class="info-box-number">{{ number_format($custemors) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                {{-- Brands --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-2">
                            <i class="fa-solid fa-brazilian-real-sign"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Roles</span>
                            <span class="info-box-number">{{ number_format($roles) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
@section('js')
    <!-- SweetAleert -->
    <script src="{{ URL::asset('admin_assets/plugins/sweetalert/js/sweetalert2.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    popup: 'swal2-toast',
                    title: 'swal2-toast-title',
                }
            });
        @endif
    </script>
@endsection
