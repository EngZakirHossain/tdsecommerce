@extends('backend.layouts.master').
@section('title', 'Add Coupon')
@section('page_title', 'Add Coupon')

@push('admin_style')
    <!-- Plugins css -->
@endpush

@section('admin_content')
    <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Coupon</h4>

                        <div class="mt-3">
                            <label for="coupon_name" class="form-label">Coupon Name</label>
                            <input type="text" class="form-control @error('coupon_name') is-invalid @enderror"
                                name="coupon_name" id="coupon_name" placeholder="Enter Coupon Name">
                            @error('coupon_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="discount_amount" class="form-label">Coupon Percentage</label>
                            <input type="number" class="form-control @error('discount_amount') is-invalid @enderror"
                                name="discount_amount" id="discount_amount" placeholder="Enter Coupon Percentage"
                                min="0">
                            @error('discount_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="minimum_purchase_amount" class="form-label">Minimum Purchage Amount</label>
                            <input type="number"
                                class="form-control @error('minimum_purchase_amount') is-invalid @enderror"
                                name="minimum_purchase_amount" id="minimum_purchase_amount"
                                placeholder="Minimum Purchage Amount" min="0">
                            @error('minimum_purchase_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="validity_till" class="form-label">Coupon Expiry Date</label>
                            <input type="date" class="form-control @error('validity_till') is-invalid @enderror"
                                name="validity_till" id="validity_till" placeholder="Minimum Purchage Amount">
                            @error('validity_till')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check form-switch " name="is_active" type="checkbox" id="switch3"
                                switch="bool" checked>
                            <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>

                    </div>
                    <!-- end cradbody -->
                </div>
                <!-- end card -->
            </div>
        </div><!-- end card -->
        <!-- end card -->
        <button type="submit" class="btn btn-primary">Submit</button>
        </div> <!-- end col -->
        </div>

    </form>
@endsection

@push('admin_script')
    <script src="{{ asset('assets/backend') }}/js/pages/form-advanced.init.js"></script>
    <!-- Plugins js -->
@endpush
