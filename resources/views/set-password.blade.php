<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lekki Waters | Forgot Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('') }}/public/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ url('') }}/public/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/public/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('') }}/public/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('') }}}/public/assets/img/dinersclub.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                        @endif

                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ url('') }}/public/assets/img/products/product-2-50.png" alt="logo">
                            </div>
                            <h4>Reset Password</h4>
                            <h6 class="font-weight-light">Choose a new password</h6>
                            <form class="pt-3" action="/set-password-now" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="password"  name="password" required class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Enter your password">
                                </div>

                                <input name="email" value="{{$email}}" hidden>


                                <div class="form-group">
                                    <input type="password"  name="password_confirmation" required class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Confirm your password">
                                </div>

                                <div class="mt-3">
                                    <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    name="submit" type="submit" >Continue</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('') }}/public/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('') }}/public/js/off-canvas.js"></script>
    <script src="{{ url('') }}/public/js/hoverable-collapse.js"></script>
    <script src="{{ url('') }}/public/js/template.js"></script>
    <script src="{{ url('') }}/public/js/settings.js"></script>
    <script src="{{ url('') }}/public/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
