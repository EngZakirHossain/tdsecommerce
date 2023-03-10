@extends('backend.layouts.master').
@section('title', 'Add Banner')
@section('page_title', 'Add Banner')

@push('admin_style')
    <!-- Plugins css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('admin_content')
    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Product</h4>
                        <div class="mt-3">
                            <label for="banner_type" class="form-label">Category Name</label>
                            <select class="form-select @error('banner_type') is-invalid @enderror"
                                aria-label="Default select example" name="banner_type">
                                <option selected>Select Category Name</option>
                                <option value="1">Main Slider</option>
                                <option value="2">Vedio Slider</option>
                                <option value="3">Short Banner</option>
                            </select>
                            @error('banner_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label>Banner Name</label>
                            <input type="text" name="banner_name"
                                class="form-control @error('banner_name') is-invalid @enderror" id="thresholdconfig"
                                placeholder="Enter Banner Name">
                            @error('banner_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <label for="image" class="form-label">Banner Thumhnail (1920*600 px)</label>
                            <input type="file" class="form-control dropify" name="image" id="">
                            @error('image')
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
