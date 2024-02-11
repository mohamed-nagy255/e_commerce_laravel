@extends('admin.layouts.app')
@section('title', $title)
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sweetalert/css/sweetalert.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 d-inline">Users </h1>
                    <span>/ {{ $title }}</span>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="breadcrumb float-sm-right">
                        @can('role-create')
                            <a href="{{ route('roles.create') }}" type="button" class="btn btn-primary">
                                Add Role
                                <i class="fa-solid fa-user-gear"></i>
                            </a>
                        @endcan
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
                            <h3 class="card-title">{{ $title }} Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>CONTROL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($roles as $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>
                                                {{-- show --}}
                                                @can('role-show')
                                                    <a href="{{ route('roles.show', $row->id) }}" class="btn btn-primary">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @if ($row->name !== 'OWNER')
                                                    {{-- edit --}}
                                                    @can('role-edit')
                                                        <a href="{{ route('roles.edit', $row->id) }}" class="btn btn-success"
                                                            title="edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    @endcan
                                                    {{-- delete --}}
                                                    @can('role-delete')
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop" data-id="{{ $row->id }}"
                                                            title="delete">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    @endcan
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    @include('admin.roles.delete_role_modal')

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

    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    {{-- delete modal --}}
    <script>
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-footer #id').val(id);
        })
    </script>
@endsection
