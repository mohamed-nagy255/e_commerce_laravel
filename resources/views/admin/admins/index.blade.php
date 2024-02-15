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
                        @can('admin-create')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Add Admin
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
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
                                        <th>EMAIL</th>
                                        <th>ROLE NAME</th>
                                        <th>CONTROL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($admins as $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                <span class="right badge badge-warning">
                                                    {{ $row->role_name }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($row->role_name !== 'OWNER')
                                                    {{-- edit --}}
                                                    @can('admin-edit')
                                                        <button type="button" class="btn btn-success mr-2"
                                                            data-bs-toggle="modal" data-bs-target="#updateModal" title="edit"
                                                            data-id="{{ $row->id }}" data-name="{{ $row->name }}"
                                                            data-email="{{ $row->email }}"
                                                            data-role="{{ $row->role_name }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    @endcan
                                                    {{-- delete --}}
                                                    @can('admin-delete')
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal" data-id="{{ $row->id }}"
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

    @include('admin.admins.create_admin_modal')
    @include('admin.admins.edit_admin_modal')
    @include('admin.admins.delete_admin_modal')

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
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Errors!',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
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

    <script>
        // {{-- edit modal --}}
        $('#updateModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var role = button.data('role')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #role').val(role);
        })
        // {{-- delete modal --}}
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection
