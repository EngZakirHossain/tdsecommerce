@extends('backend.layouts.master').
@section('title', 'Orders')
@section('page_title', 'Orders')

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
                <a class="btn btn-primary" href="#"><i class="ti-package"></i>
                    Add Orders
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
                            <th>View Details</th>
                            <th>Order date</th>
                            <th>Sub Total</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal{{ $order->id }}">Order Details</button>
                                    <div class="modal fade" id="modal{{ $order->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modal{{ $order->id }}Title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="width: 800px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="#modal{{ $order->id }}Title">Order
                                                        Number #{{ $order->id }}</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table
                                                                    class="table table-striped table-inverse table-responsive">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Product Name</th>
                                                                            <th>Quantity</th>
                                                                            <th>Unit Price</th>
                                                                            <th>Sub total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($order->orderDetails as $item)
                                                                            <tr>
                                                                                <td>{{ $loop->index + 1 }}</td>
                                                                                <td>{{ $item->product->name }}</td>
                                                                                <td>{{ $item->product_qty }}</td>
                                                                                <td>{{ $item->product_price }}</td>
                                                                                <td>{{ $item->product_price * $item->product_qty }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        <tr class="mb-5">
                                                                            <td colspan="4">
                                                                                Total Payable Amount:
                                                                            </td>
                                                                            <td><strong class="fw-bold text-danger">
                                                                                    ৳{{ $order->total }}</strong></td>
                                                                        </tr>
                                                                        <tr class="mt-5">
                                                                            <td colspan="50">
                                                                                <p class="text-primary">Billing Address:
                                                                                </p>
                                                                                <p>Recipent Name:
                                                                                    {{ $order->billing->name }}</p>
                                                                                <p>Mobile Number:
                                                                                    {{ $order->billing->phone }}
                                                                                </p>
                                                                                <p>Address:
                                                                                    {{ $order->billing->address }}</p>
                                                                                <p>Upazila:
                                                                                    {{ $order->billing->upazila->name }}
                                                                                    Distrcit:
                                                                                    {{ $order->billing->district->name }}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>${{ $order->sub_total }}</td>
                                <td>${{ $order->discount_amount }}({{ $order->coupon_name }})</td>
                                <td>${{ $order->total }}</td>
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a href="#" type="button"
                                            class="btn btn-primary waves-effect waves-light ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="#">
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
                        @empty
                            No Order
                        @endforelse
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
