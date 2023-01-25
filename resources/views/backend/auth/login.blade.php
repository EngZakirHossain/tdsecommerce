<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>TDS | Admin Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    @include('backend.layouts.inc.style')

</head>

<body class="account-pages">
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-success">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to Tds Ecommerce .</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{ asset('assets/backend') }}/images/logo-sm.png" height="24"
                                        alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">User Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Enter password">
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="remember"
                                                    id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-success w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="#"><i class="mdi mdi-lock"></i> Forgot your
                                            password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> TDS. Developed by Trimatric IT
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @include('backend.layouts.inc.script')

</body>

</html>
