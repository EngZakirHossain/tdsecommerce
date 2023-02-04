@extends('frontend.layouts.master')

@section('title', 'Checkout Page')
@push('frontend_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('frontedn_content')
    <main id="MainContent" class="content-for-layout">
        <div class="checkout-page mt-100">
            <div class="container">
                <div class="checkout-page-wrapper">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                            <div class="section-header mb-3">
                                <h2 class="section-heading">Check out</h2>
                            </div>

                            <div class="checkout-progress overflow-hidden">
                                <ol class="checkout-bar px-0">
                                    <li class="progress-step step-done"><a href="{{ route('cart.page') }}">Cart</a></li>
                                    <li class="progress-step step-done"><a href="{{ route('customer.checkoutpage') }}">Your
                                            Details</a></li>
                                    <li class="progress-step step-done"><a
                                            href="{{ route('customer.checkoutpage') }}">Shipping</a></li>
                                    <li class="progress-step step-done"><a href="checkout.html">Payment</a></li>
                                    <li class="progress-step step-active"><a href="checkout.html">Review</a></li>
                                </ol>
                            </div>
                            <form action="{{ route('customer.placeorder') }}" class="shipping-address-form common-form"
                                method="POST">
                                @csrf

                                <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                                    <div class="checkout-user-img me-4">
                                        <img src="{{ asset('assets/frontend') }}/img/checkout/user.jpg" alt="img">
                                    </div>
                                    <div
                                        class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                        <div class="checkout-user-info">
                                            <h2 class="checkout-user-name">{{ $user->name }}</h2>
                                            <p class="checkout-user-address mb-0">{{ $user->phone }}</p>
                                            <p class="checkout-user-address mb-0">{{ $user->email }}</p>
                                        </div>
                                        <a href="#" class="edit-user btn-secondary">PROFILE</a>
                                    </div>
                                </div>

                                <div class="shipping-address-area">
                                    <h2 class="shipping-address-heading pb-1">Shipping address</h2>
                                    <div class="shipping-address-form-wrapper">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Full name</label>
                                                    <input type="text" name="name" value="{{ $user->name }}"
                                                        @error('name') is-invalid @enderror />
                                                </fieldset>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Email address</label>
                                                    <input type="email" name="email" value="{{ $user->email }}"
                                                        @error('email') is-invalid @enderror />
                                                </fieldset>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Phone number</label>
                                                    <input type="text" name="phone" value="{{ $user->phone }}"
                                                        @error('email') is-invalid @enderror />
                                                </fieldset>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">District</label>
                                                    <select class="form-select js-example-basic-single" id="district_id"
                                                        name="district_id">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">{{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Upazila</label>
                                                    <select class="form-select js-example-basic-single" id="upazila_id"
                                                        name="upazila_id">
                                                        <option value="">Slect Upazila</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Zip code</label>
                                                    <input type="text" name="zip_code" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Address</label>
                                                    <input type="text" name="address" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Order Note</label>
                                                    <input type="text" name="note" />
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shipping-address-area billing-area">
                                    <h2 class="shipping-address-heading pb-1">Payment Method</h2>
                                    <div class="form-checkbox d-flex align-items-center mt-4">
                                        <input class="form-check-input mt-0" type="checkbox" name="payment_method">
                                        <label class="form-check-label ms-2">
                                            Cash On Delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="shipping-address-area billing-area">
                                    <div
                                        class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a href="{{ route('cart.page') }}"
                                            class="checkout-page-btn minicart-btn btn-secondary">BACK TO
                                            CART</a>
                                        <button type="submit" class="checkout-page-btn minicart-btn btn-primary">Place
                                            Order</button>
                                    </div>
                                </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                            <div class="cart-total-area checkout-summary-area">
                                <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>
                                    @foreach ($carts as $cart)
                                        <div class="minicart-item d-flex">
                                            <div class="mini-img-wrapper">
                                                <img class="mini-img"
                                                    src="{{ asset('storage/uploads/products/thumbnail') }}/{{ $cart->options->product_thumbnail }}"
                                                    alt="product-img"
                                                    onerror="this.src='{{ asset('assets/backend/images/product/product.png') }}'">
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="#">{{ $cart->name }}</a>
                                                </h2>
                                                <p class="product-vendor">${{ $cart->price }} x {{ $cart->qty }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="cart-total-box mt-4 bg-transparent p-0">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">${{ $total_price }}</p>
                                        </div>
                                        <div class="subtotal-item shipping-box">
                                            <h4 class="subtotal-title">Shipping:</h4>
                                            <p class="subtotal-value">$10.00</p>
                                        </div>
                                        @if (Session::has('coupon'))
                                            <div class="subtotal-item discount-box">
                                                <h4 class="subtotal-title">Discount:</h4>
                                                <p class="subtotal-value">
                                                    ${{ Session::get('coupon')['discount_amount'] }}
                                                </p>
                                            </div>
                                            <hr />
                                            <div class="subtotal-item discount-box">
                                                <h4 class="subtotal-title">Total:</h4>
                                                <p class="subtotal-value">
                                                    <span
                                                        class="card-price-compare text-decoration-line-through">${{ Session::get('coupon')['cart_total'] }}</span>
                                                    ${{ Session::get('coupon')['balance'] }}

                                                </p>
                                            </div>
                                        @else
                                            <hr />
                                            <div class="subtotal-item discount-box">
                                                <h4 class="subtotal-title">Total:</h4>
                                                <p class="subtotal-value">${{ $total_price }}</p>
                                            </div>
                                        @endif
                                        <hr />
                                        <div class="mt-4 checkout-promo-code">
                                            <form action="{{ route('customer.couponApply') }}" method="POST">
                                                @csrf
                                                <input class="input-promo-code" type="text" name="coupon_name"
                                                    placeholder="Promo code" />
                                                <button type="submit" class="btn btn-secondary text-uppercase mt-2">
                                                    Apply Code
                                                </button>
                                            </form>
                                            @if (Session::has('coupon'))
                                                <b> {{ Session::get('coupon')['name'] }} </b> is Applied
                                                <a href="{{ route('customer.couponremove', 'coupon_name') }}"
                                                    class="product-remove">Remove</a>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('frontend_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/upzilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // console.log(data)
                            var d = $('#upazila_id').empty();
                            $.each(data, function(key, value) {
                                $('#upazila_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                    });
                }
            });
        });
    </script>
@endpush
