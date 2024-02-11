@extends('admin.layouts.app')
@section('title', 'Create Role')
@section('css')
    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sweetalert/css/sweetalert.css') }}">
    <style>
        .tree-nav__item {
            display: block;
            white-space: nowrap;
            position: relative;
        }

        .tree-nav__item.is-expandable::before {
            border-left: 1px solid #333;
            content: "";
            height: 100%;
            left: 0.8rem;
            position: absolute;
            top: 2.4rem;
            height: calc(100% - 2.4rem);
        }

        .tree-nav__item .tree-nav__item {
            margin-left: 2.4rem;
        }

        .tree-nav__item.is-expandable[open]>.tree-nav__item-title::before {
            font-family: "ionicons";
            transform: rotate(90deg);
        }

        .tree-nav__item-title {
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            line-height: 3.2rem;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 d-inline">Users </h1>
                    <span>/ Create Role</span>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="breadcrumb float-sm-right">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">
                            back
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('roles.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="roleName" class="form-label">Name Role</label>
                                    <input type="text" name="name" class="form-control" id="roleName">
                                </div>
                                <div class="mb-3">
                                    <details class="tree-nav__item is-expandable">
                                        <summary class="tree-nav__item-title">Select Permissions : -</summary>
                                        <div class="tree-nav__item">
                                            @foreach ($permission as $value)
                                                <label>
                                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                                        class="">
                                                    {{ $value->name }}
                                                </label>
                                                <br />
                                            @endforeach
                                        </div>
                                    </details>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Role</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('js')
    <!-- SweetAleert -->
    <script src="{{ URL::asset('admin_assets/plugins/sweetalert/js/sweetalert2.js') }}"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: '{{ $error }}',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                    customClass: {
                        popup: 'swal2-toast',
                        title: 'swal2-toast-title',
                    }
                });
            @endforeach
        @endif
    </script>
@endsection
