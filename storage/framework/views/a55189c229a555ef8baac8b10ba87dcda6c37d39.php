<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Hi, <?php echo e($f_name); ?> <?php echo e($l_name); ?></h3>
                            <h6 class="font-weight-normal mb-0">Order History<span class="text-primary"></span>
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

                </div>
            </div>




        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All Orders</p>
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
                                        <?php echo $orders->appends(Request::all())->links(); ?>


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

<?php echo $__env->make('layouts.orderhistory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/watersupply/resources/views/order-history.blade.php ENDPATH**/ ?>