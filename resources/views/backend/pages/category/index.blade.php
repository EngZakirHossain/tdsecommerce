@extends('backend.layouts.master').
@section('title', 'Category')
@section('page_title', 'Category')

@push('admin_style')
    <!-- DataTables -->
    <link href="{{ asset('assets/backend') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/backend') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css">

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/backend') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css">
    <!-- Sweet Alert-->
    <link href="{{ asset('assets/backend') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
@endpush

@section('admin_content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <!-- end col -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name Of Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">
                                    Is Active
                                </label>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Add Category</button>
                        </div>
                        <!-- end col -->
                    </form><!-- end form -->
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List Of Categories </h4>
                    <p class="card-title-desc">All you need to do to use it with your project.
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->updated_at->format('d M y') }}</td>
                                    <td>
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                id="sa-warning"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@push('admin_script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/backend') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/backend') }}/js/pages/datatables.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/backend') }}/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/backend') }}/js/pages/sweet-alerts.init.js"></script>

@endpush
