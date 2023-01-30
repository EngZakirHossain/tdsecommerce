@extends('backend.layouts.master').
@section('title', 'Add Testimonial')
@section('page_title', 'Testimonial')

@push('admin_style')
    <!-- Plugins css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('admin_content')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Product</h4>

                        <div class="mt-3">
                            <label for="subCategory_id" class="form-label">Category Name</label>
                            <select class="form-select @error('subCategory_id') is-invalid @enderror"
                                aria-label="Default select example" name="subCategory_id">
                                <option selected>Select Category Name</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                            @error('subCategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label>Product Name</label>
                            <input type="text" name="product_name" name="thresholdconfig"
                                class="form-control @error('product_name') is-invalid @enderror" id="thresholdconfig"
                                placeholder="Enter Product Name">
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <label>Product Sku</label>
                                    <input type="text" name="product_sku" name="thresholdconfig"
                                        class="form-control @error('product_sku') is-invalid @enderror" id="thresholdconfig"
                                        placeholder="Enter Product Sku">
                                    @error('product_sku')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Product Size</label>
                                    <input type="text" name="product_size" name="thresholdconfig"
                                        class="form-control @error('product_size') is-invalid @enderror"
                                        id="thresholdconfig" placeholder="Enter Product Size">
                                    @error('product_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <label>Product Stock</label>
                                    <input type="number" name="product_stock" placeholder="Enter Product Stock"
                                        class="form-control @error('product_stock') is-invalid @enderror" name="alloptions"
                                        id="alloptions" min="1">
                                    @error('product_stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Product Quantity Alert</label>
                                    <input type="number" name="product_alertQuantity" name="thresholdconfig"
                                        class="form-control @error('product_alertQuantity') is-invalid @enderror"
                                        id="thresholdconfig" placeholder="Enter Quantity Alert" min="1">
                                    @error('product_alertQuantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <label>Product Price</label>
                                    <input type="number" name="product_price" placeholder="Enter Product Price"
                                        class="form-control @error('product_price') is-invalid @enderror" name="alloptions"
                                        id="alloptions" min="0">
                                    @error('product_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Product Making Cost</label>
                                    <input type="number" name="product_cost" name="thresholdconfig"
                                        class="form-control @error('product_cost') is-invalid @enderror"
                                        id="thresholdconfig" placeholder="Enter Product Cost" min="0">
                                    @error('product_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label>Product Details</label>
                            <textarea id="textarea" name="product_shippingDetails" class="form-control" rows="3"
                                placeholder="Enter Product Details"></textarea>
                        </div>
                        <div class="mt-3">
                            <label>Product Shipping Details</label>
                            <textarea id="textarea" name="product_details" class="form-control" rows="3"
                                placeholder="Enter Product Shipping Details"></textarea>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check form-switch" name="is_active" type="checkbox" id="switch3"
                                switch="bool">
                            <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>

                    </div>
                    <!-- end cradbody -->
                </div>
                <!-- end card -->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body ">
                        <div class="mb-5">
                            <label for="product_thumbnail" class="form-label">Product Thumhnail (1288*1000 px)</label>
                            <input type="file" class="form-control dropify" name="product_thumbnail" id="">
                            @error('product_thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--multiple Image Section --}}
                        <div class="mb-5">
                            <label for="product_multiple_image" class="form-label">Product Images (1288*1000 px)</label>
                            <input type="file" class="form-control dropify" multiple name="product_multiple_image[]"
                                id="">
                            @error('product_multiple_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
