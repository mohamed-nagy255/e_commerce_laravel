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
                    <h1 class="m-0 d-inline">Categories </h1>
                    <span>/ {{ $title }}</span>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="breadcrumb float-sm-right">
                        @can('admin-create')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Add Category
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
                                        <th>CATEGORY NAME</th>
                                        <th>SLUG</th>
                                        <th>HOME PAGE</th>
                                        <th>IMAGE</th>
                                        <th>CONTROL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($categories as $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->category_name }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>
                                                @if ($row->home_page === 1)
                                                    <span class="right badge badge-success">show Home Page</span>
                                                @else
                                                    <span class="right badge badge-danger">Unshow Home Page</span>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ URL::asset('admin_assets/uploade/categories/' . $row->image) }}"
                                                    height="60" width="60">
                                            </td>
                                            <td>
                                                {{-- edit --}}
                                                <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal" title="edit"
                                                    data-id="{{ $row->id }}" data-name="{{ $row->category_name }}"
                                                    data-home="{{ $row->home_page }}" data-image="{{ $row->image }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                {{-- delete --}}
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" data-id="" title="delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
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

    @include('admin.categories.create_category_modal')
    @include('admin.categories.edit_category_modal')

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

    <script>
        // {{-- edit modal --}}
        $('#updateModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var home = button.data('home')
            var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #home').val(home);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #preview-image').attr('src',
                '{{ URL::asset('admin_assets/uploade/categories') }}' + '/' + image);
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
