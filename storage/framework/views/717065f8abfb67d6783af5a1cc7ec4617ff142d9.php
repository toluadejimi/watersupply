<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Hi, <?php echo e($f_name); ?> <?php echo e($l_name); ?></h3>
                        <h6 class="font-weight-normal mb-0">Request for a new order<span class="text-primary"></span>
                        </h6>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

            </div>

            <div class="col-md-6 grid-margin stretch-card">

            </div>











            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">My Wallet</p>
                                <p class="fs-30 mb-4">NGN <?php echo e(number_format(Auth::user()->wallet)); ?></p>

                                <div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title btn-fw text-dark" id="staticBackdropLabel">Fund
                                                    your Wallet</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">


                                                <form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8">

                                                    <div class="form-group col-lg-8">
                                                        <h5 class="mb-2 text-dark">Enter Amount to Fund(NGN)</h5>
                                                        <input type="number" required
                                                            class="form-control form-control-lg mt-3" name="amount"
                                                            id="exampleInputPassword1" placeholder="200">
                                                    </div>




                                                    <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                    




                                                    <input type="hidden" name="currency" value="NGN">

                                                    


                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <button class="btn btn-primary btn-lg btn-block"
                                                                type="submit" value="Pay Now!">

                                                                <i class="fa fa-plus-circle fa-lg"></i> Pay
                                                                Now!</button>
                                                        </div>

                                                    </div>






                                                </form>

                                            </div>










                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-inverse-primary btn-fw text-white"
                                    data-bs-toggle="modal" data-bs-target="#pay">
                                    Fund Wallet
                                </button>

                            </div>
                        </div>
                    </div>








                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Successful Order</p>
                                <p class="fs-30 mb-4"><?php echo e($delivered_order); ?></p>
                                <p>Total Delivered Order</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Pending Order</p>
                                <p class="fs-30 mb-4"><?php echo e($pending_order); ?></p>
                                <p>Total Order on the way</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Money Out</p>
                                <p class="fs-30 mb-4">NGN<?php echo e(number_format($money_out), 2); ?></p>
                                <p>Total Money Spent</p>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">


                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

                <div class="card">

                    <form class="pt-3" action="/new-order-now" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
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

                            <h4 class="card-title">Create New Order</h4>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Choose Delivery Date</label>
                                        <input type="date" required class="form-control form-control-lg"
                                            name="delivery_date" id="exampleInputPassword1" placeholder="Select Date">
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Select Tank Size</label>
                                        <select class="form-control" name="tank_id" id="tanl_size">
                                            class="form-control" required>
                                            <option value="">Choose Tank Size</option>
                                            <?php $__currentLoopData = $tank_size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Will you like this order to reoccur?</label>
                                        <select class="form-control " name="reoccur" required>
                                            <option value="">Choose one</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="col-lg-6">



                                    <div class="form-group">
                                        <label>Occurrence Range</label>
                                        <select class="form-control " name="reoccur_range">
                                            <option value="">Choose one</option>
                                            <option value="7">1 Week</option>
                                            <option value="14">2 Weeks</option>
                                            <option value="21">3 Weeks</option>
                                            <option value="28">4 Weeks</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>Select Payment Mode</label>
                                        <select class="form-control" name="payment_mode" required>
                                            <option value="">Choose one</option>
                                            <option value="wallet">Wallet</option>
                                            <option value="bank_transfer">Bank Transfer</option>


                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">


                                    <div class="mt-3">
                                        <button a
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Continue</a></button>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>



            <div class="col-md-6 grid-margin">

                <div class="card">


                        <div class="card-body">

                            <h4 class="card-title">Delivery Infomation</h4>

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="<?php echo e($f_name); ?> <?php echo e($l_name); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>Apt | Suit | Room</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="<?php echo e($user_apt); ?>" readonly>
                                    </div>

                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="<?php echo e($user_street); ?>" readonly>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Local Govt</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="<?php echo e($user_lga); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="<?php echo e($user_state); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-2">


                                    <a button href="my-account"
                                    class="btn btn-secondary btn-lg btn-primary mt-2">Update address info</button></a>

                                </div>

                            </div>

                        </div>
                </div>
            </div>


        </div>






















        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Recent Order</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Amount</th>
                                                <th>Tank Size</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Time</th>


                                            </tr>


                                        </thead>

                                        <tbody class="table-border-bottom-0">



                                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($data->order_id); ?></td>
                                                <td><?php echo e(number_format($data->amount)); ?></td>
                                                <td><?php echo e($data->tank_size); ?> Liters</td>
                                                <?php if($data->status == 0): ?>
                                                <td><span
                                                        class="badge rounded-pill bg-warning text-white">Pending</span>
                                                </td>
                                                <?php elseif($data->status == 1): ?>
                                                <td><span
                                                        class="badge rounded-pill bg-success text-white">Delivered</span>
                                                </td>
                                                <?php elseif($data->status == 3): ?>
                                                <td><span
                                                        class="badge rounded-pill bg-danger text-white">Returned</span>
                                                </td>
                                                <?php endif; ?>
                                                <td><?php echo e(date('F d, Y', strtotime($data->created_at))); ?></td>
                                                <td><?php echo e(date('h:i:s A', strtotime($data->created_at))); ?></td>


                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr colspan="20" class="text-center">No History Found</tr>
                                            <?php endif; ?>







                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newordernav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/watersupply/resources/views/new-order.blade.php ENDPATH**/ ?>