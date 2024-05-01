    
    <?php $__env->startSection('content'); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Hi, <?php echo e($f_name); ?> <?php echo e($l_name); ?></h3>
                                <h6 class="font-weight-normal mb-0">My Account<span class="text-primary"></span>
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 grid-margin">

                        <div class="card">
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

                            <form class="pt-3" action="/update-account" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="card-body col-md-8">


                                    <p class="card-title">Account Information</p>

                                    <div class="form-group">
                                        <label>FIRST NAME</label>
                                        <input type="text" required class="form-control form-control-lg" name="f_name"
                                            id="f_name" placeholder="Enter First Name" value="<?php echo e($f_name); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>LAST NAME</label>
                                        <input type="text" required class="form-control form-control-lg" name="l_name"
                                            id="l_name" placeholder="Enter First Name" value="<?php echo e($l_name); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>GENDER</label>
                                        <select class="form-control form-control-lg" required name="gender" id="gender">
                                            <option value="<?php echo e($gender); ?>"><?php echo e($gender); ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="prefer">Prefer not to say</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>PHONE NUMBER</label>
                                        <input type="text" required class="form-control form-control-lg" name="phone"
                                            id="phone" placeholder="Enter Phone" value="<?php echo e($phone); ?>">
                                    </div>

                                    <div class="mt-8">
                                        <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Update Account</a></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-md-6 grid-margin ">
                        <div class="card">

                            <form class="pt-3" action="/update-info" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="card-body col-md-8">


                                    <p class="card-title">Location Information</p>

                                    <div class="form-group">
                                        <label>APT | SUIT | HOUSE | FLAT</label>
                                        <input type="text" required class="form-control form-control-lg" name="apt"
                                            id="apt" placeholder="Enter First Name" value="<?php echo e($apt); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>STREET</label>
                                        <input type="text" required class="form-control form-control-lg" name="street"
                                            id="l_name" placeholder="Enter First Name" value="<?php echo e($street); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>LGA</label>
                                        <input type="text" required class="form-control form-control-lg" name="lga"
                                            id="lga" placeholder="Enter LGA" value="<?php echo e($lga); ?>">
                                    </div>


                                    <div class="form-group">
                                        <label>STATE</label>
                                        <input type="text"  class="form-control form-control-lg" name=""
                                            id="state" placeholder="Enter State" value="<?php echo e($state); ?>">
                                    </div>

                                    <div class="mt-8">
                                        <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Update Information</a></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>


























            </div>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.myaccount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/watersupply/resources/views/my-account.blade.php ENDPATH**/ ?>