@extends('admin.layouts.app')
@section('title', 'Show Role')
@section('css')
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
                    <span>/ Show Role</span>
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
                            <h3 class="card-title">Show Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="roleName" class="form-label">Name Role</label>
                                    <input type="text" class="form-control" id="roleName" value="{{ $role->name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <details class="tree-nav__item is-expandable">
                                        <summary class="tree-nav__item-title">Select Permissions : -</summary>
                                        <div class="tree-nav__item">
                                            @if (!empty($rolePermissions))
                                                @foreach ($rolePermissions as $v)
                                                    <label class="label label-secondary text-dark d-flex">
                                                        {{ $v->name }}
                                                    </label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </details>
                                </div>
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

@endsection
