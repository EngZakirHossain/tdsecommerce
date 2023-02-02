@extends('frontend.layouts.master')

@section('title', 'User Registration')

@section('frontedn_content')
    <main id="MainContent" class="content-for-layout">
        <div class="login-page mt-100">
            <div class="container">
                <form action="{{ route('register.store') }}" method="post" class="login-form common-form mx-auto">
                    @csrf
                    <div class="section-header mb-3">
                        <h2 class="section-heading text-center">Register</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset>
                                <label class="label">User name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">User Nnumber</label>
                                <input type="tel" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Email address</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Password</label>
                                <input type="Password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Confirm Password</label>
                                <input type="Password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="#" class="text_14 d-block">Forgot your password?</a>
                            <button type="submit" class="btn-primary d-block mt-4 btn-signin">CREATE AN ACCOUNT</button>
                            <a href="{{ route('login.page') }}" class="btn-secondary mt-2 btn-signin">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
