@extends('backend.layouts.master').
@section('title', 'Update Sub Category')
@section('page_title', 'Update Sub-Category')

@push('admin_style')
    <!-- Plugins css -->
@endpush

@section('admin_content')
    <form action="{{ route('admin.subCategory.update', $subCategory->slug) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Sub-Category</h4>

                        <div class="mt-3">
                            <label for="category_id" class="form-label">Category Name</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example" name="category_id">
                                <option selected>Select Category Name</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $subCategory->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="subCategory_name" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control @error('subCategory_name') is-invalid @enderror"
                                name="subCategory_name" id="name" value="{{ $subCategory->name }}"
                                placeholder="Enter Sub Category Name">
                            @error('subCategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check form-switch" name="is_active" type="checkbox" id="switch3"
                                switch="bool" @if ($subCategory->is_active) checked @endif>
                            <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>

                    </div>
                    <!-- end cradbody -->
                </div>
                <!-- end card -->
            </div>
        </div><!-- end card -->
        <!-- end card -->
        <button type="submit" class="btn btn-primary">Update</button>
        </div> <!-- end col -->
        </div>

    </form>
@endsection

@push('admin_script')
    <script src="{{ asset('assets/backend') }}/js/pages/form-advanced.init.js"></script>
    <!-- Plugins js -->
@endpush
