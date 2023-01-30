@extends('backend.layouts.master').
@section('title', 'Products')
@section('page_title', 'Products')

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

@section('add_button')
    <div class="col-md-4">
        <div class="float-end d-none d-md-block">
            <div class="dropdown">
                <a class="btn btn-primary" href="{{ route('admin.products.create') }}"><i class="ti-package"></i>
                    Add New
                </a>
            </div>
        </div>
    </div>
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Alert Quantity</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/uploads/products/thumbnail') }}/{{ $product->product_thumbnail }}"
                                        class="avatar-sm rounded-circle me-2"
                                        onerror="this.src='{{ asset('assets/backend/images/product/product.png') }}'">
                                </td>
                                <td>{{ $product->subCategory->name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td><span class="badge bg-success">{{ $product->product_stock }}</span></td>
                                <td><span class="badge bg-danger">{{ $product->product_alertQuantity }}</td>
                                <td>{!! str_repeat('<span class="mdi mdi-star text-primary"></span>', 0 + $product->product_rating) !!}</td>
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a href="{{ route('admin.products.edit', $product->slug) }}"
                                            type="button" class="btn btn-primary waves-effect waves-light ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST"
                                            action="{{ route('admin.products.destroy', $product->slug) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-primary waves-effect waves-light show_confirm"
                                                id="sa-warning">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>

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

<script src="{{ asset('assets/backend') }}/js/pages/form-advanced.init.js"></script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        let form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
                title: `Are you sure ?`,
                text: "You won't able to revert this !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted',
                        'your File Has Been Deleted',
                        'success'
                    )
                }
            });
    });
</script>
@endpush
