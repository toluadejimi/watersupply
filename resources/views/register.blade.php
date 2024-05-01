<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
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
    <link rel="shortcut icon" href="{{ url('') }}/public/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ url('') }}/public/assets/img/dinersclub.png" alt="logo">
                            </div>

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


                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" action="/register-now"   method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" required name="f_name"
                                        id="f_name" placeholder="Enter your first Name">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" required name="l_name"
                                        id="l_name" placeholder="Enter your Last Name">
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" required name="phone"
                                        id="phone" placeholder="Enter your Phone Number">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" required name="email"
                                        id="exampleInputEmail1" placeholder="Enter your valid Email">
                                </div>




                                <div class="form-group">
                                    <select class="form-control form-control-lg" required name="gender"
                                        id="exampleFormControlSelect2">
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefer">Prefer not to say</option>

                                    </select>
                                </div>




                                <div class="form-group">
                                    <input type="password" required class="form-control form-control-lg" name="password"
                                        id="exampleInputPassword1" placeholder="Enter your Password">
                                </div>

                                <div class="form-group">
                                    <input type="password" required class="form-control form-control-lg"
                                        name="password_confirmation" id="exampleInputPassword1"
                                        placeholder="Confirm Password">
                                </div>



                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox"  class="form-check-input">
                                            By clicking Sign up mean you agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>



                                <div class="mt-3">
                                    <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">SIGN UP</a></button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="/welcome" class="text-primary">Login</a>
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
