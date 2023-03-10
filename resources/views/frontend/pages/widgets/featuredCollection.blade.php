 <!-- collection start -->
 <div class="featured-collection mt-100 overflow-hidden">
     <div class="collection-tab-inner">
         <div class="container">
             <div class="section-header text-center">
                 <h2 class="section-heading">Popular Products</h2>
             </div>
             <div class="row">
                 @foreach ($products as $product)
                     <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                         <div class="product-card">
                             <div class="product-card-img">
                                 <a class="hover-switch" href="{{ route('productDetails.page', $product->slug) }}">
                                     <img src="{{ asset('storage/uploads/products/thumbnail') }}/{{ $product->product_thumbnail }}"
                                         class="secondary-img"
                                         onerror="this.src='{{ asset('assets/backend/images/product/product.png') }}'">
                                     <img src="{{ asset('storage/uploads/products/thumbnail') }}/{{ $product->product_thumbnail }}"
                                         class="primary-img"
                                         onerror="this.src='{{ asset('assets/backend/images/product/product.png') }}'">

                                 </a>

                                 <div class="product-card-action product-card-action-2">
                                     <a href="#quickview-modal{{ $product->slug }}" class="quickview-btn btn-primary"
                                         data-bs-toggle="modal">QUICKVIEW</a>
                                     <a href="{{ route('productDetails.page',$product->slug) }}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                 </div>

                                 <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                     <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                             fill="black" />
                                     </svg>
                                 </a>
                             </div>
                             <div class="product-card-details text-center">
                                 <h3 class="product-card-title">
                                     <a
                                         href="{{ route('productDetails.page', $product->slug) }}">{{ $product->product_name }}</a>
                                 </h3>
                                 <div class="product-card-price">
                                     <span class="card-price-regular">${{ $product->product_price }}</span>
                                     {{-- <span class="card-price-compare text-decoration-line-through">$1759</span> --}}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- product quickview start -->
                     @include('frontend.pages.widgets.productQuickView')
                     <!-- product quickview end -->
                 @endforeach
             </div>
         </div>
     </div>
 </div>
 <!-- collection start -->
