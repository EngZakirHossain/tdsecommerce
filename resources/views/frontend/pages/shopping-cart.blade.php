@extends('frontend.layouts.master')

@section('title', 'Shopping Cart')

@section('frontedn_content')

    <main id="MainContent" class="content-for-layout">
        <div class="cart-page mt-100">
            <div class="container">
                <div class="cart-page-wrapper">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <table class="cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">Price</th>
                                        <th class="cart-caption text-end heading_18">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cartItems as $cartItem)
                                        <tr class="cart-item">
                                            <td class="cart-item-media">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img"
                                                        src="{{ asset('storage/uploads/products/thumbnail') }}/{{ $cartItem->options->product_thumbnail }}"
                                                        alt="product-img"
                                                        onerror="this.src='{{ asset('assets/backend/images/product/product.png') }}'">

                                                </div>
                                            </td>
                                            <td class="cart-item-details">
                                                <h2 class="product-title"><a href="#">{{ $cartItem->name }}</a></h2>
                                                <p class="product-vendor">${{ $cartItem->price }} x {{ $cartItem->qty }}</p>
                                            </td>
                                            <td class="cart-item-quantity">
                                                <div class="quantity d-flex align-items-center justify-content-between">
                                                    <button class="qty-btn dec-qty"><img
                                                            src="{{ asset('assets/frontend') }}/img/icon/minus.svg"
                                                            alt="minus"></button>
                                                    <input class="qty-input" type="number" name="qty"
                                                        value="{{ $cartItem->qty }}" min="0">
                                                    <button class="qty-btn inc-qty"><img
                                                            src="{{ asset('assets/frontend') }}/img/icon/plus.svg"
                                                            alt="plus"></button>
                                                </div>
                                                <a href="{{ route('removeFromCart', ['cart_id' => $cartItem->rowId]) }}"
                                                    class="product-remove mt-2">Remove</a>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">${{ $cartItem->price }}</div>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">${{ $cartItem->price * $cartItem->qty }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=" col-lg-5 mt-4 checkout-promo-code">
                                <a href="{{ route('shop') }}" class="position-relative btn-primary text-uppercase mt-3">
                                    Continue Shoping
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="cart-total-area">
                                <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                                    <div class="cart-total-box mt-4">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">${{ $subTotal }}</p>
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
                                                <p class="subtotal-value">${{ $subTotal }}</p>
                                            </div>
                                        @endif

                                        <div class="subtotal-item discount-box mt-3">
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

                                        <p class="shipping_text">Shipping & taxes calculated at checkout</p>
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="checkout.html" class="position-relative btn-primary text-uppercase">
                                                Procced to checkout
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
