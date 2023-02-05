@extends('backend.layouts.master').
@section('title', 'Add Setting')
@section('page_title', 'Setting')

@push('admin_style')
    <!-- Plugins css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('admin_content')
    <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    @php($name = \App\Models\Setting::where('key', 'name')->first()->value)
                    <label for="example-email-input" class="form-label">Company Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $name }}">
                </div>
                <div class="mb-3">
                    @php($address = \App\Models\Setting::where('key', 'address')->first()->value)
                    <label for="example-url-input" class="form-label">Company Address</label>
                    <input class="form-control" type="text" name="address" value="{{ $address }}">
                </div>
                <div class="mb-3">
                    @php($email = \App\Models\Setting::where('key', 'email')->first()->value)
                    <label for="example-url-input" class="form-label">Company Email</label>
                    <input class="form-control" type="text" name="email" value="{{ $email }}">
                </div>
                <div class="mb-3">
                    @php($phone = \App\Models\Setting::where('key', 'phone')->first()->value)
                    <label for="example-url-input" class="form-label">Company Phone</label>
                    <input class="form-control" type="text" name="phone" value="{{ $phone }}">
                </div>
                <div class="mb-3">
                    @php($logo = \App\Models\Setting::where('key', 'logo')->first()->value)

                    <label for="logo" class="form-label">Company Logo (100*200 px)</label>
                    <input type="file" class="form-control dropify" name="logo"
                        data-default-file="{{ asset('storage/uploads/company') }}/{{ $logo }}">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    @php($fb_link = \App\Models\Setting::where('key', 'fb_link')->first()->value)
                    <label for="example-url-input" class="form-label">Facebook link</label>
                    <input class="form-control" type="text" name="fb_link" value="{{ $fb_link }}">
                </div>
                <div class="mb-3">
                    @php($youtube_link = \App\Models\Setting::where('key', 'youtube_link')->first()->value)
                    <label for="example-url-input" class="form-label">Youtube link</label>
                    <input class="form-control" type="text" name="youtube_link" value="{{ $youtube_link }}">
                </div>
                <div class="mb-3">
                    @php($instagram_link = \App\Models\Setting::where('key', 'instagram_link')->first()->value)
                    <label for="example-url-input" class="form-label">Instagram link</label>
                    <input class="form-control" type="text" name="instagram_link" value="{{ $instagram_link }}">
                </div>
                <div class="mb-3">
                    @php($behance_link = \App\Models\Setting::where('key', 'behance_link')->first()->value)
                    <label for="example-url-input" class="form-label">Behance link</label>
                    <input class="form-control" type="text" name="behance_link" value="{{ $behance_link }}">
                </div>
                <div class="mb-3">
                    @php($pinterest_link = \App\Models\Setting::where('key', 'pinterest_link')->first()->value)
                    <label for="example-url-input" class="form-label">Pinterest link</label>
                    <input class="form-control" type="text" name="pinterest_link" value="{{ $pinterest_link }}">
                </div>
                <div class="mb-3">
                    @php($linkedin_link = \App\Models\Setting::where('key', 'linkedin_link')->first()->value)
                    <label for="example-url-input" class="form-label">Linkedin link</label>
                    <input class="form-control" type="text" name="linkedin_link" value="{{ $linkedin_link }}">
                </div>
            </div>
        </div>
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
