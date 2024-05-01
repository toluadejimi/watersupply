<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('') }}/public/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Verify Account</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('') }}/public/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=..+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/card.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ url('') }}/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ url('') }}/public/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('') }}/public/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('') }}/public/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href=" user-dashboard" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <div class="app-brand justify-content-center">
                                <a href=" user-dashboard" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">
                                        <img src="{{ url('') }}/public/assets/img/illustrations/logo.png"
                                            height="50" alt="View Badge User"
                                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png" /> </span>
                                    <span class="app-brand-text demo text-body fw-bolder"></span>
                                </a>
                            </div>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/user-dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Bills Payment</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                            <div data-i18n="Account Settings">Transfer</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/bank-transfer" class="menu-link">
                                    <div data-i18n="Account">Bank Transfer</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/in-transfer" class="menu-link">
                                    <div data-i18n="Notifications">In - Transfer</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Account Settings">Airtime & Data</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/buy-airtime" class="menu-link">
                                    <div data-i18n="Account">Airtime</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/buy-data" class="menu-link">
                                    <div data-i18n="Notifications">Data</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-barcode"></i>
                            <div data-i18n="Account Settings">Others</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/buy-airtime" class="menu-link">
                                    <div data-i18n="Account">Cable Tv</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/buy-data" class="menu-link">
                                    <div data-i18n="Notifications">Exams Strach Card</div>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Cards</span></li>

                    <!-- User interface -->
                    <li class="menu-item ">
                        <a href="/my-cards" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="User interface">My Virtual Cards</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/my-card" class="menu-link">
                                    <div data-i18n="Accordion">All Cards / Create Card</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/usd-card" class="menu-link">
                                    <div data-i18n="Accordion">USD Card</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/ngn-card" class="menu-link">
                                    <div data-i18n="Alerts">NGN Card</div>
                                </a>
                            </li>


                        </ul>
                    </li>




                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
                    <!-- Forms -->
                    <li class="menu-item active">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Form Elements">Profile</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="forms-basic-inputs.html" class="menu-link">
                                    <div data-i18n="Basic Inputs">Security</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-basic-inputs.html" class="menu-link">
                                    <div data-i18n="Basic Inputs">Change Bank Account</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-input-groups.html" class="menu-link">
                                    <div data-i18n="Input groups">Edit Info</div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Support</span></li>
                    <li class="menu-item">
                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-support"></i>
                            <div data-i18n="Support">Chat With us</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Documentation">Terms and Condition</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>


                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <h4 class="mb-0">NGN {{ number_format($user_wallet), 2 }}</h4>


                    </div>
                    <!-- /Search -->

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">

                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ url('') }}/public/assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ url('') }}/public/assets/img/avatars/1.png"
                                                            alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->f_name }}
                                                        {{ Auth::user()->l_name }}</span>

                                                    @if (Auth::user()->type == '2')
                                                        <small class="text-muted">Customer</small>
                                                    @elseif(Auth::user()->type == '1')
                                                        <small class="text-muted">Admin</small>
                                                    @else
                                                        <small class="text-muted">Agent</small>
                                                    @endif

                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->




                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">

                                                <h5 class="card-title text-primary">Account Verification</h5>
                                                <p class="mb-4">
                                                    Please verify your account to have full access to Card features.

                                                </p>




                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if (Auth::user()->mono_customer_id == null)
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-lg-12 mb-4 order-0">
                                    <div class="card">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-sm-7">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card mb-4">
                                                                    <div
                                                                        class="card-header d-flex justify-content-between align-items-center">

                                                                    </div>
                                                                    <div class="card-body">

                                                                        <form action="/verify-account-now"
                                                                            class="mb-3" method="POST">
                                                                            @csrf
                                                                            @if ($errors->any())
                                                                                <div class="alert alert-danger">
                                                                                    <ul>
                                                                                        @foreach ($errors->all() as $error)
                                                                                            <li>{{ $error }}
                                                                                            </li>
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
                                                                            <div class="mb-3">

                                                                                <div class="mb-3">
                                                                                    <label class="form-label"
                                                                                        for="">Surname</label>
                                                                                    <input type="text"
                                                                                        name="l_name"
                                                                                        class="form-control"
                                                                                        id=""
                                                                                        value={{ Auth::user()->l_name }} />
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">First Name</label>
                                                                                <input type="text" name="f_name"
                                                                                    class="form-control"
                                                                                    id=""
                                                                                    value={{ Auth::user()->f_name }} />
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">Middle Name</label>
                                                                                <input type="text" name="m_name"
                                                                                    class="form-control"
                                                                                    id=""
                                                                                    value={{ Auth::user()->m_name }} />
                                                                            </div>


                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="basic-default-fullname">Phone</label>
                                                                                <input type="text" disabled
                                                                                    class="form-control"
                                                                                    id="basic-default-fullname"
                                                                                    value={{ Auth::user()->phone }} />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">Address</label>
                                                                                <input type="text"
                                                                                    name="address_line1"
                                                                                    class="form-control"
                                                                                    id="address_line1"
                                                                                    placeholder='Enter Address' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">City</label>
                                                                                <input type="text" name="city"
                                                                                    class="form-control"
                                                                                    id="city"
                                                                                    placeholder='Enter City' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">State</label>
                                                                                <input type="text" name="state"
                                                                                    class="form-control"
                                                                                    id="state"
                                                                                    placeholder='Enter State' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="lga">LGA</label>
                                                                                <input type="text" name="lga"
                                                                                    class="form-control"
                                                                                    id="lga"
                                                                                    placeholder="Enter Lga." />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="lga">BVN</label>
                                                                                <input type="text" name="bvn"
                                                                                    class="form-control"
                                                                                    id="lga"
                                                                                    placeholder="Enter BVN." />
                                                                                </small>Dial *585*0# to check your
                                                                                BVN</small>
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-primary">Verify</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card mb-4">
                                                                    <div
                                                                        class="card-header d-flex justify-content-between align-items-center">

                                                                    </div>
                                                                    <div class="card-body">

                                                                        <form action="/verify-account-now"
                                                                            class="mb-3" method="POST">
                                                                            @csrf
                                                                            @if ($errors->any())
                                                                                <div class="alert alert-danger">
                                                                                    <ul>
                                                                                        @foreach ($errors->all() as $error)
                                                                                            <li>{{ $error }}
                                                                                            </li>
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
                                                                            <div class="mb-3">

                                                                                <div class="mb-3">
                                                                                    <label class="form-label"
                                                                                        for="">Surname</label>
                                                                                    <input type="text"
                                                                                        name="l_name" readonly
                                                                                        class="form-control"
                                                                                        id=""
                                                                                        value={{ Auth::user()->l_name }} />
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">First Name</label>
                                                                                <input type="text"  readonly name="f_name"
                                                                                    class="form-control"
                                                                                    id=""
                                                                                    value={{ Auth::user()->f_name }} />
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">Middle Name</label>
                                                                                <input type="text" readonly name="m_name"
                                                                                    class="form-control"
                                                                                    id=""
                                                                                    value={{ Auth::user()->m_name }} />
                                                                            </div>


                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="basic-default-fullname">Phone</label>
                                                                                <input type="text" disabled
                                                                                    class="form-control"
                                                                                    id="basic-default-fullname"
                                                                                    value={{ Auth::user()->phone }} />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">Address</label>
                                                                                <input type="text"
                                                                                    name="address_line1"
                                                                                    class="form-control"
                                                                                    id="address_line1"
                                                                                    placeholder='Enter Address' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">City</label>
                                                                                <input type="text" name="city"
                                                                                    class="form-control"
                                                                                    id="city"
                                                                                    placeholder='Enter City' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="">State</label>
                                                                                <input type="text" name="state"
                                                                                    class="form-control"
                                                                                    id="state"
                                                                                    placeholder='Enter State' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="lga">LGA</label>
                                                                                <input type="text" name="lga"
                                                                                    class="form-control"
                                                                                    id="lga"
                                                                                    placeholder="Enter Lga." />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="lga">BVN</label>
                                                                                <input type="text" name="bvn"
                                                                                    class="form-control"
                                                                                    id="lga"
                                                                                    placeholder="Enter BVN." />
                                                                                </small>Dial *585*0# to check your
                                                                                BVN</small>
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-primary">Verify</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @else
                                    <div class="container-xxl flex-grow-1 container-p-y">
                                        <div class="row">
                                            <div class="col-lg-10 mb-4 order-0">
                                                <div class="card">
                                                    <div class="d-flex align-items-end row">
                                                        <div class="col-sm-9">
                                                            <div class="card-body">

                                                                <h5 class="card-title text-success">Verification
                                                                    Completed</h5>
                                                                <p class="mb-4">
                                                                    Congratulations your account has been verified
                                                                    successfully
                                                                <p> Logout and Login again to start enjoing cardy </p>
                                                                </p>




                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 text-center text-sm-left">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    @endif































                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            ,
                            <a href="https://themeselection.com" target="_blank"
                                class="footer-link fw-bolder">Cardy</a>
                        </div>
                        <div>
                            <a href="https://cardy.enkwave.com/tos/" class="footer-link me-4" target="_blank">Tos</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                Themes</a>

                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank" class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ url('') }}/public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('') }}/public/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('') }}/public/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ url('') }}/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ url('') }}/public/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('') }}/public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ url('') }}/public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ url('') }}/public/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
