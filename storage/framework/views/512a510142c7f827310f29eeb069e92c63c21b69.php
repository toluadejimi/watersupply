<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lekki Waters</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo e(url('')); ?>}/public/assets/img/dinersclub.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">


                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?php echo e(url('')); ?>/public/assets/img/products/product-2-50.png" alt="logo">
                            </div>

                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('error')); ?>

                        </div>
                    <?php endif; ?>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="/signin" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" name="email" required class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password"  name="password" required class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    name="submit" type="submit" >Continue</a></button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">

                                    <a href="/forgot-password" class="auth-link text-black">Forgot password?</a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="/register" class="text-primary">Create</a>
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
    <script src="<?php echo e(url('')); ?>/public/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(url('')); ?>/public/js/off-canvas.js"></script>
    <script src="<?php echo e(url('')); ?>/public/js/hoverable-collapse.js"></script>
    <script src="<?php echo e(url('')); ?>/public/js/template.js"></script>
    <script src="<?php echo e(url('')); ?>/public/js/settings.js"></script>
    <script src="<?php echo e(url('')); ?>/public/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/watersupply/resources/views/login.blade.php ENDPATH**/ ?>